<?php
 
if (!function_exists('getUniqueNum')) {
    /**
     * Returns a Unique Number
     *
     * @param integer $real_invoice_num
     *
     * @param integer $type
     *
     * @return string unique number
     *
     * */
    function getUniqueNum($real_invoice_num, $type = 1){
        if($type == 1) $format = config('crm.invoice_num_format');
        elseif($type == 2) $format = config('crm.quote_num_format');
        elseif($type == 3) $format = config('crm.contact_num_format');

        $real_invoice_num = str_pad($real_invoice_num, config('crm.invoice_number_digits'), '0', STR_PAD_LEFT);

        $string = str_replace("[num]", $real_invoice_num, $format);
        $string = str_replace("[yyyy]", date("Y"), $string);
        $string = str_replace("[mm]", date("m"), $string);
        $string = str_replace("[dd]", date("d"), $string);

        return $string;
    }
}

if (!function_exists('render_status_class')) {

    function render_status_class($status){
        switch($status){
            case "paid": case "payed": case "accepted": case "accepted_client":case "contacted":
            $status = "success" ;
            break;
            case "pending":case "partial_paid":case "waiting_for_payment":case "predeclared": case "invoice_status_nopayment":case 'status_quote_waiting': case 'claim_pending': case "quote_status_joint_guarantee": case 'pending_cancel': case 'online_payment_waiting': case 'online_payment_invalid': case "pre_confirmation_pending":
            $status = "warning" ;
            break;
            case "pastdue": case "rejected": case "dissolved_with_claims":case "not_contacted": case "dissolved_without_claims": case "rejected_client":case "dissolved_immediately": case "refunded": case "partial_refunded":case 'reminder':case 'warning1':case 'warning2': case 'collection':case 'status_resolved':case 'debt_enforcement':case 'command':case 'follow':case 'loss':case 'seizure': case 'invoice_status_collection':
            $status = "danger" ;
            break;
            case "cancelled": case "expired":
            $status = "inverse" ;
            break;
            case "corrected":
            $status = "info" ;
            break;
            case "offer": case "offer_pending": case "offer_sent":
            $status = "offer" ;
            break;
            case "in_clarification":
            $status = "in_clarification" ;
            break;
            case "pre_confirmation_sent": case "client_won":  case "receive_registration": case "registration_completed":
            $status = "pre_confirmation" ;
            break;
            default:
            $status = "default" ;
            break;
        }

        return $status;
    }
}

if (!function_exists('get_language_flag')) {

    function get_language_flag($language){
        if($language == "it-IT")
            $language_flag = asset('/static/flag-icons/it.png');
        elseif($language == "fr-FR")
            $language_flag = asset('/static/flag-icons/fr.png');
        elseif($language == "de-DE")
            $language_flag = asset('/static/flag-icons/de.png');
        return $language_flag;
    }

}

if (!function_exists('getContactStatus')) {

    function getContactStatus(){
        $status = array();

        $status[] = "new";
        $status[] = "offer";
        $status[] = "in_clarification";
        $status[] = "pending";
        $status[] = "accepted";
        $status[] = "pre_confirmation_pending";
        $status[] = "pre_confirmation_sent";
        $status[] = "cancelled";
        $status[] = "rejected";
//      $status[] = "waiting_for_payment";
        $status[] = "dissolved_immediately";
        $status[] = "status_resolved";
        $status[] = "status_quote_waiting";
        return $status;
    }

}

if(!function_exists('roundTo5')){

    function roundTo5($number){
        $number = round($number * 2, 1) / 2;
        return $number;
    }

}

if(!function_exists('format')){

    function format($number, $before = "", $after = ""){
        $decpoint = config('crm.decpoint');
        $thousands = config('crm.thousands');
        $decimals = config('crm.decimals');
        $number = roundTo5($number);
        return $before  . number_format($number, $decimals, $decpoint, $thousands)  . $after ;
    }

}

if(!function_exists('getContactPDF')){

    function getContactPDF(){
        $status = array();

       // $status['content_pdf']  = "CONTACT_PDF_PRECONFIRMATION";
        $status['content_pdf_img']  = "CONTACT_PDF_PRECONFIRMATION_IMG";
        $status['content_pdf1'] = "CONTACT_PDF_REJECTED";
       // $status['refund']       = "CONTACT_PDF_OFFER";
        $status['offer_print']       = "CONTACT_PDF_OFFER_PRINT_LETTER";
        return $status;
    }

}

if(!function_exists('get_salutation')){

    function get_salutation($salutation){
        switch($salutation) {
            case 'mr': 
                return __('crm.PDF_IL_MAN'); 
                break;
            case 'mrs': 
                return __('crm.PDF_IL_WOMEN'); 
                break;
            case 'company': 
                return __('crm.PDF_IL_COMPANY'); 
                break;
        }
    }

}

