<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App;
use App\Http\Controllers\Controller;
use App\Contact;
use App\ContactOffer;
use App\Http\Resources\OfferResource;
use Illuminate\Support\Facades\Storage;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        if($contact->language == "de")
        {
            $this->writePDF($contact);
        } 
        elseif($contact->language == "fr") 
        {
            $this->writePDF($contact);
        } 
        elseif($contact->language == "it")
        {
            $this->writePDF($contact);
        }

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
