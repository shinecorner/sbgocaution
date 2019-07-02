<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App;
use App\Http\Controllers\Controller;
use App\Contact;
use App\ContactOffer;
use App\Template;
use App\Mail\BaseEmail;
use App\Http\Resources\OfferResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use PDF;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'contact_id' => 'required'
        ]);
        $offers = ContactOffer::where('contact_id', $request->contact_id)->get();
        return OfferResource::collection($offers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'contact_id' => 'required|integer',
            'deposit_amount' => 'required|numeric'
        ]);

        $contact = Contact::find($request->contact_id);

        // set document information

        $language = $contact->language;

        PDF::setHeaderCallback(function($pdf) use($language) {
            // get the current page break margin
            $bMargin = $pdf->getBreakMargin();
            // get current auto-page-break mode
            $auto_page_break = $pdf->getAutoPageBreak();
            // disable auto-page-break
            $pdf->SetAutoPageBreak(false, 0);
            // set bacground image
            $img_file = Storage::disk('public')->path('offer_' . $language . '.png');
            $pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
            // restore auto-page-break status
            $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
            // set the starting point for the page content
            $pdf->setPageMark();
        });

        PDF::SetTitle('Offerte');
        PDF::SetAuthor('goCaution');
        PDF::SetCreator(PDF_CREATOR);
        PDF::SetSubject('Offerte');

        // set header and footer fonts
        PDF::setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

        // set default monospaced font
        PDF::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        PDF::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        PDF::SetHeaderMargin(0);
        PDF::SetFooterMargin(0);

        // remove default footer
        PDF::setPrintFooter(false);

        // set auto page breaks
        PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        PDF::setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set font
        PDF::SetFont('times', '', 9);

        PDF::SetTextColor(0, 0, 0, 100);

        // add a page
        PDF::AddPage();

        $this->writePDF($contact);

        $directory_kundendatenbank = config('app.customer_data');
        if(!Storage::disk('public')->exists($directory_kundendatenbank . DS . 'offer' . DS . $contact->id)){
            Storage::disk('public')->makeDirectory($directory_kundendatenbank . DS . 'offer' . DS . $contact->id);
        }

        $file_name = __("contact.offer.FILE_NAME") . '_' . $contact->contact_num . '_' . time() . '.pdf';

        PDF::Output(Storage::disk('public')->path($directory_kundendatenbank . DS . 'offer' . DS . $contact->id. DS . $file_name), 'F');

        $contact->deposit_amount = $request->deposit_amount;

        $offer = new ContactOffer();
        $offer->file_name = $file_name;
        $offer->sent_by = 0;
        $offer->created_by = auth()->user()->id;
        $offer->created_at = now();

        if($contact->offers()->save($offer)) {
            $message = __('contact.offer.CREATE_SUCCESS');
        } else {
            $message = __('contact.offer.CREATE_FAILURE');
        }

        return response()->json([
            'message' => $message
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $contactOffer = ContactOffer::find($id);
        $contact = $contactOffer->contact;
        $directory_kundendatenbank = config('app.customer_data');
        $file = Storage::disk('public')->path($directory_kundendatenbank . DS . 'offer' . DS . $contact->id. DS . $contactOffer->file_name);
        $template = Template::where([
                                'section' => 'contacts',
                                'template_key' => 'offer_email' 
                            ])->first();
        $emailBody = $template->template_desc;
        
        $locale = App::getLocale();
        App::setLocale($contact->language);
        
        $pattern = '/\[\[(.*?)\]\]/' ;
        $matches = array();
        preg_match_all($pattern, $emailBody, $matches);
        foreach($matches[1] as $value) {
            $emailBody = str_replace("[[".$value."]]", __($value), $emailBody);
        }
        $greetings = getPDFSalutation($contact->salutation);
        $greetings = str_replace('{nachname}', $contact->last_name, $greetings);
        $emailBody = str_replace("{mr/mrs}", $greetings, $emailBody);
        $emailBody = str_replace("{deposit_amount}", format($contact->deposit_amount), $emailBody);
        //Offer table starts
        $deposit_amount_formatted = format($contact->deposit_amount);
        $subtotal = getPremiumAmount($contact->deposit_amount, 1);
        $premium_tax = (($subtotal * 0.050));
        $premium_tax_formatted = format($premium_tax);
        $premium_total_formatted = format($subtotal+$premium_tax);
        $premium_formatted = format($premium_total_formatted-$premium_tax_formatted, false);
        $offer_table = view('api.emails.offer_table', compact('deposit_amount_formatted', 'premium_formatted', 'premium_tax_formatted', 'premium_total_formatted'))->render();
        $emailBody = str_replace('{offer_table}', $offer_table, $emailBody);
        switch ($contact->language) {
            case 'fr':
                $attachments = [
                    Storage::disk('public')->path('download'.DS.'fr'.DS."conditions-generales-CGA.pdf"),
                    Storage::disk('public')->path('download'.DS.'fr'.DS."gocaution-formulaire.pdf"),
                    Storage::disk('public')->path('download'.DS.'fr'.DS."flyer_locataire.pdf")
                ];
                break;

            case 'de':
                $attachments = [
                    Storage::disk('public')->path('download'.DS.'de'.DS."allgemeine-versicherungsbedingungen-avb.pdf"),
                    Storage::disk('public')->path('download'.DS.'de'.DS."gocaution-antrag.pdf"),
                    Storage::disk('public')->path('download'.DS.'de'.DS."flyer_mieter.pdf")
                ];
                break;

            case 'it':
                $attachments = [
                    Storage::disk('public')->path('download'.DS.'it'.DS."condizioni-generali-assicurazione-cga.pdf"),
                    Storage::disk('public')->path('download'.DS.'it'.DS."modulo.pdf"),
                    Storage::disk('public')->path('download'.DS.'it'.DS."volantino.pdf")
                ];
                break;    

            default:
                $attachments = [
                    Storage::disk('public')->path('download'.DS.'de'.DS."allgemeine-versicherungsbedingungen-avb.pdf"),
                    Storage::disk('public')->path('download'.DS.'de'.DS."gocaution-antrag.pdf"),
                    Storage::disk('public')->path('download'.DS.'de'.DS."flyer_mieter.pdf")
                ];
                break;
        }
        Mail::to($contact->email)->send(new BaseEmail($contact, $emailBody, $attachments, __('general.offer_email.SUBJECT')));
        $contactOffer->sent = 1;
        $contactOffer->sent_by = auth()->user()->id;
        $contactOffer->save();
        App::setLocale($locale);

        if($contact->offers()->save($contactOffer)) {
            $message = __('contact.offer.SEND_SUCCESS');
        } else {
            $message = __('contact.offer.SEND_FAILURE');
        }

        return response()->json([
            'message' => $message
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function writePDF($contact) {
        $locale = App::getLocale();
        App::setLocale($contact->language);

        $salutation = getPDFSalutation($contact->salutation);
        $salutation = str_replace("{nachname}", $contact->last_name, $salutation);

        $subtotal = getPremiumAmount(request()->deposit_amount, 1);
        $subtotal = format($subtotal);

        $data = [
            [   
                'contact_name' => $contact->last_name." ".$contact->first_name, 
                'x' => 25.5, 
                'y' => 55 
            ],
            [ 
                'address' => $contact->addresses()->where('is_primary', 1)->first()->address, 
                'x' => 25.5, 
                'y' => 60 
            ],
            [ 
                'zip_city' => $contact->addresses()->where('is_primary', 1)->first()->zip." ".$contact->addresses()->where('is_primary',1)->first()->city, 
                'x' => 25.5, 
                'y' => 65 
            ],
            [ 
                'salutation' => $salutation, 
                'x' => 25.5, 
                'y' => 118 
            ],
            [ 
                'deposit_amount' => format(request()->deposit_amount), 
                'x' => 32, 
                'y' => 155.5 
            ],
            [ 
                'subtotal' => $subtotal, 
                'x' => 67, 
                'y' => 155.5 
            ]
        ];

        writePDFContent($data);

        App::setLocale($locale);
    }
}
