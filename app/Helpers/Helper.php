<?php
 
if (!function_exists('getUniqueNum')) {

    /**
     * Returns a Unique Number
     * 
     * @param integer $real_invoice_num
     * @param integer $type
     * @return string unique number
     * */
    function getUniqueNum($real_invoice_num, $type = 1) {
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

    /**
     * Returns an appropriate status class from status.
     * 
     * @param string $status
     * @return string $status_class
     */
    function render_status_class($status){
        switch($status){
            case "paid": case "payed": case "accepted": case "accepted_client":case "contacted":
            $status_class = "success" ;
            break;
            case "pending":case "partial_paid":case "waiting_for_payment":case "predeclared": case "invoice_status_nopayment":case 'status_quote_waiting': case 'claim_pending': case "quote_status_joint_guarantee": case 'pending_cancel': case 'online_payment_waiting': case 'online_payment_invalid': case "pre_confirmation_pending":
            $status_class = "warning" ;
            break;
            case "pastdue": case "rejected": case "dissolved_with_claims":case "not_contacted": case "dissolved_without_claims": case "rejected_client":case "dissolved_immediately": case "refunded": case "partial_refunded":case 'reminder':case 'warning1':case 'warning2': case 'collection':case 'status_resolved':case 'debt_enforcement':case 'command':case 'follow':case 'loss':case 'seizure': case 'invoice_status_collection':
            $status_class = "danger" ;
            break;
            case "cancelled": case "expired":
            $status_class = "inverse" ;
            break;
            case "corrected":
            $status_class = "info" ;
            break;
            case "offer": case "offer_pending": case "offer_sent":
            $status_class = "offer" ;
            break;
            case "in_clarification":
            $status_class = "in_clarification" ;
            break;
            case "pre_confirmation_sent": case "client_won":  case "receive_registration": case "registration_completed":
            $status_class = "pre_confirmation" ;
            break;
            default:
            $status_class = "default" ;
            break;
        }

        return $status_class;
    }
}

if (!function_exists('get_language_flag')) {

    /**
     * Returns a language flag image path based on language.
     * 
     * @param  string $language
     * @return string $language_flag
     */
    function get_language_flag($language){
        if($language == "it-IT")
            $language_flag = asset('/static/flag-icons/it.png');
        elseif($language == "fr-FR")
            $language_flag = asset('/static/flag-icons/fr.png');
        elseif($language == "de-DE")
            $language_flag = asset('/static/flag-icons/de.png');
        elseif($language == "en-EN")
            $language_flag = asset('/static/flag-icons/en.png');
        return $language_flag;
    }

}

if (!function_exists('getContactStatus')) {

    /**
     * Returns translated statuses.
     * 
     * @return array $status
     */
    function getContactStatus(){
        $status = array();

        $status["new"] = __('general.NEW');
        $status["offer"] = __('general.OFFER');
        $status["in_clarification"] = __('general.IN_CLARIFICATION');
        $status["pending"] = __('general.PENDING');
        $status["accepted"] = __('general.ACCEPTED');
        $status["pre_confirmation_pending"] = __('general.PRE_CONFIRMATION_PENDING');
        $status["pre_confirmation_sent"] = __('general.PRE_CONFIRMATION_SENT');
        $status["cancelled"] = __('general.CANCELLED');
        $status["rejected"] = __('general.REJECTED');
//      $status[] = "waiting_for_payment";
        $status["dissolved_immediately"] = __('general.DISSOLVED_IMMEDIATELY');
        $status["status_resolved"] = __('general.STATUS_RESOLVED');
        $status["status_quote_waiting"] = __('general.STATUS_QUOTE_WAITING');
        return $status;
    }

}

if(!function_exists('roundTo5')){

    /**
     * Returns decimal number which is round to 5.
     * 
     * @param  decimal $number
     * @return decimal $number
     */
    function roundTo5($number){
        $number = round($number * 2, 1) / 2;
        return $number;
    }

}

if(!function_exists('format')){

    /**
     * Returns formatted decimal number.
     * 
     * @param  decimal $number
     * @param  string $before
     * @param  string $after
     * @return string
     */
    function format($number, $before = "", $after = ""){
        $decpoint = config('crm.decpoint');
        $thousands = config('crm.thousands');
        $decimals = config('crm.decimals');
        $number = roundTo5($number);
        return $before  . number_format($number, $decimals, $decpoint, $thousands)  . $after ;
    }

}

if(!function_exists('getContactPDF')){
    
    /**
     * Returns Contact PDF related statues.
     * 
     * @return array $status
     */
    function getContactPDF(){
        $status = array();

       // $status['content_pdf']  = "CONTACT_PDF_PRECONFIRMATION";
        $status['content_pdf_img'] = __('general.PDF_PRECONFIRMATION_IMG');
        $status['content_pdf1'] = __('general.PDF_REJECTED');
       // $status['refund']       = "CONTACT_PDF_OFFER";
        $status['offer_print'] = __('general.PDF_OFFER_PRINT_LETTER');
        return $status;
    }

}

if(!function_exists('get_salutation')){

    /**
     * Returns translated salutation.
     * 
     * @param string $salutation
     * @return string translated salutation
     */
    function get_salutation($salutation){
        switch($salutation) {
            case 'mr': 
                return __('general.PDF_IL_MAN'); 
                break;
            case 'mrs': 
                return __('general.PDF_IL_WOMEN'); 
                break;
            case 'company': 
                return __('general.PDF_IL_COMPANY'); 
                break;
        }
    }

}

if(!function_exists('getLeadSource')){

    function getLeadSource(){
        $leadsource = array();

        $leadsource['online_registration'] = __('contact.ONLINE_REGISTRATION');
        $leadsource['affiliate_marketing'] = __('contact.AFFILIATE_MARKETNG');
        $leadsource['partner_management'] = __('contact.PARTNERVERWALTUNG');
        $leadsource['other'] = __('contact.ANDERE');
        $leadsource['partner_login'] = __('contact.LEAD_SOURCE_PARTNERLOGIN');
        $leadsource['call_centre'] = __('contact.LEAD_SOURCE_CALLCENTRE');

        $leadsource['pdf_cls'] = __('contact.COM_INVOICES_LEADSOURCE_PDF_CLS');
        $leadsource['pdf_mks'] = __('contact.COM_INVOICES_LEADSOURCE_PDF_MKS');
        $leadsource['pdf_go'] = __('contact.COM_INVOICES_LEADSOURCE_PDF_GO');
        $leadsource['form_offer'] = __('contact.COM_INVOICES_LEADSOURCE_PDF_OFFER');
        $leadsource['form_preconfirmation'] = __('contact.COM_INVOICES_LEADSOURCE_PDF_PRECONFIRMATION');
        $leadsource['mks_gocaution'] = __('contact.COM_INVOICES_LEADSOURCE_MKS_GOCAUTION');
        $leadsource['mks_offer'] = __('contact.COM_INVOICES_LEADSOURCE_MKS');
        $leadsource['cls_offer'] = __('contact.COM_INVOICES_LEADSOURCE_CLS');
        $leadsource['ca_offer'] = __('contact.COM_INVOICES_LEADSOURCE_CA');

        return $leadsource;
    }

}

