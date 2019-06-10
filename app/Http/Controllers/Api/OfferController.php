<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use App\ContactOffer;
use App\Http\Resources\OfferResource;
use Illuminate\Support\Facades\Storage;

class MYPDF extends \TCPDF {
    //Page header
    public function Header() {
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        $img_file = public_path('offer_it.png');
        $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }
}

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
            'deposite_amount' => 'required|numeric'
        ]);

        $contact = Contact::find($request->contact_id);

        // create new PDF document
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->mylang = 'de';

        if($contact->language) {
            $pdf->mylang = $contact->language; 
        }

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('goCaution');
        $pdf->SetTitle('Offerte');
        $pdf->SetSubject('Offerte');

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(0);
        $pdf->SetFooterMargin(0);

        // remove default footer
        $pdf->setPrintFooter(false);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set font
        $pdf->SetFont('times', '', 9);

        $pdf->SetTextColor(0, 0, 0, 100);

        // add a page
        $pdf->AddPage();

        // Print a text
        switch ($contact->salutation) {
            case 'mrs':
                $salutation = __('general.PDF_MRS');
                $salutation = str_replace("{nachname}", $contact->last_name, $salutation);
                break;
            case 'mr':
                $salutation = __('general.PDF_MR');
                $salutation = str_replace("{nachname}", $contact->last_name, $salutation);
                break;
            case 'company':
                $salutation = __('general.PDF_COMPANY');
                $salutation = str_replace("{nachname}", $contact->last_name, $salutation);
                break;
            default:
                $salutation = '';
                break;
        }

        if($pdf->mylang=="de")
        {
            $html = $contact->nachname." ".$contact->vorname;

            $pdf->SetXY(25.5,55,'');

            $pdf->writeHTML($html, true, false, true, false, '');

            
            $html = $contact->addresses()->where('is_primary', 1)->first()->address;

            $pdf->SetXY(25.5,60,'');

            $pdf->writeHTML($html, true, false, true, false, '');

            
            $html = $contact->addresses()->where('is_primary', 1)->first()->zip." ".$contact->addresses()->where('is_primary',1)->first()->city;

            $pdf->SetXY(25.5,65,'');

            $pdf->writeHTML($html, true, false, true, false, '');

            
            $html = $contact->addresses()->where('is_primary', 1)->first()->ort;

            $pdf->SetXY(33,65,'');

            $pdf->writeHTML($html, true, false, true, false, '');


            $html = $salutation;

            $pdf->SetXY(25.5,118,'');

            $pdf->writeHTML($html, true, false, true, false, '');


            $html = format($request->deposit_amount);

            $pdf->SetXY(32,155.5,'');

            $pdf->writeHTML($html, true, false, true, false, '');

            if($request->deposit_amount <= 2000) {
                $subtotal = ((2000 * 0.045) * (1+5/100));
            } else {
                $subtotal = (($request->deposit_amount * 0.045) * (1+5/100));
            }

            $html = format($subtotal);

            $pdf->SetXY(67,155.5,'');

            $pdf->writeHTML($html, true, false, true, false, '');   

        } elseif($pdf->mylang=="fr") {

            $html = $contact->nachname." ".$contact->vorname;

            $pdf->SetXY(26,55,'');

            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $contact->addresses()->where('is_primary',1)->first()->address;

            $pdf->SetXY(26,60,'');

            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $contact->addresses()->where('is_primary',1)->first()->zip." ".$contact->addresses()->where('is_primary',1)->first()->city;

            $pdf->SetXY(26,65,'');

            $pdf->writeHTML($html, true, false, true, false, '');
            

            $html = $salutation;

            $pdf->SetXY(26,117,'');

            $pdf->writeHTML($html, true, false, true, false, '');

            
            $html = format($request->deposit_amount);

            $pdf->SetXY(32,155.5,'');

            $pdf->writeHTML($html, true, false, true, false, '');

            if($request->deposit_amount <= 2000) {
                $subtotal = ((2000 * 0.045) * (1+5/100));
            } else {
                $subtotal = (($request->deposit_amount * 0.045) * (1+5/100));
            }

            $html = format($subtotal);

            $pdf->SetXY(71,155.5,'');

            $pdf->writeHTML($html, true, false, true, false, '');

        } elseif($pdf->mylang=="it") {

            $html = $contact->nachname . " " . $contact->vorname;

            $pdf->SetXY(26,55,'');

            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $contact->addresses()->where('is_primary',1)->first()->address;

            $pdf->SetXY(26,60,'');

            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $contact->addresses()->where('is_primary',1)->first()->zip." ".$contact->addresses()->where('is_primary',1)->first()->city;

            $pdf->SetXY(26,65,'');

            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $salutation;

            $pdf->SetXY(26,117,'');

            $pdf->writeHTML($html, true, false, true, false, '');

            $html = format($request->deposit_amount);

            $pdf->SetXY(33.5,155.5,'');

            $pdf->writeHTML($html, true, false, true, false, '');

            if($request->deposit_amount <= 2000){
                $subtotal = ((2000 * 0.045) * (1+5/100));
            } else {
                $subtotal = (($request->deposit_amount * 0.045) * (1+5/100));
            }

            $html = format($subtotal);

            $pdf->SetXY(66,155.5,'');

            $pdf->writeHTML($html, true, false, true, false, '');

        }
        $pdf->Output('offer.pdf', 'I');
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
}
