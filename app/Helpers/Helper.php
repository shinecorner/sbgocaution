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
        elseif($type == 2) $format = config('crm.policy_num_format');
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
    function render_status_class($status) {
        switch($status){
            case "paid": case "payed": case "accepted": case "accepted_client":case "contacted":
            $status_class = "success" ;
            break;
            case "pending":case "partial_paid":case "waiting_for_payment":case "predeclared": case "invoice_status_nopayment":case 'policy_waiting':case 'waiting': case 'claim_pending': case "joint_guarantee": case 'pending_cancel': case 'online_payment_waiting': case 'online_payment_invalid': case "pre_confirmation_pending": case "cancellation_with_claim_pending": case "cancellation_without_claim_pending":
            $status_class = "warning" ;
            break;
            case "pastdue": case "rejected": case "dissolved_with_claims":case "not_contacted": case "dissolved_without_claims": case "rejected_client":case "dissolved_immediately": case "refunded": case "partial_refunded":case 'reminder':case 'warning1':case 'warning2': case 'collection':case 'resolved':case 'debt_enforcement':case 'command':case 'follow':case 'loss':case 'seizure': case 'collection':
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
    function get_language_flag($language) {
        if($language == "it")
            $language_flag = asset('/static/flag-icons/it.png');
        elseif($language == "fr")
            $language_flag = asset('/static/flag-icons/fr.png');
        elseif($language == "de")
            $language_flag = asset('/static/flag-icons/de.png');
        elseif($language == "en")
            $language_flag = asset('/static/flag-icons/en.png');
        return $language_flag;
    }

}

if (!function_exists('getContactStatus')) {

    /**
     * Returns translated contact statuses.
     * 
     * @return array $status
     */
    function getContactStatus($plain = 0) {

        $statuses = [
            "new" => 'contact.status.NEW',
            "offer" => 'contact.status.OFFER',
            "in_clarification" => 'contact.status.IN_CLARIFICATION',
            "pending" => 'contact.status.PENDING',
            "accepted" => 'contact.status.ACCEPTED',
            "pre_confirmation_pending" => 'contact.status.PRE_CONFIRMATION_PENDING',
            "pre_confirmation_sent" => 'contact.status.PRE_CONFIRMATION_SENT',
            "cancelled" => 'contact.status.CANCELLED',
            "rejected" => 'contact.status.REJECTED',
            "dissolved_immediately" => 'contact.status.DISSOLVED_IMMEDIATELY',
            "resolved" => 'contact.status.RESOLVED',
            "policy_waiting" => 'contact.status.POLICY_WAITING'
        ];

        if(!$plain) {
            foreach($statuses as $key => $value) {
                $statuses[$key] = __($value);
            }
        }

        return $statuses;
    }

}

if (!function_exists('getContactStatusPlain')) {

    function getContactStatusPlain() {
        return getContactStatus(1);
    }

}

if(!function_exists('getPolicyStatus')) {
    /**
     * Returns translated policy statuses.
     * 
     * @return array $status
     */
    function getPolicyStatus($plain = 0) {

        $statuses = [
            "waiting" => 'policy.status.WAITING',
            "predeclared" => 'policy.status.PREDECLARED',
            "accepted" => 'policy.status.ACCEPTED',
            "cancellation_with_claim_pending" => 'policy.status.CANCELLATION_WITH_CLIAM_PENDING',
            "cancellation_without_claim_pending" => 'policy.status.CANCELLATION_WITHOUT_CLIAM_PENDING',
            "dissolved_with_claims" => 'policy.status.DISSOLVED_WITH_CLAIMS',
            "dissolved_without_claims" => 'policy.status.DISSOLVED_WITHOUT_CLAIMS',
            "dissolved_immediately" => 'policy.status.DISSOLVED_IMMEDIATELY',
            "joint_guarantee" => 'policy.status.JOINT_GUARANTEE',
            "rejected_client" => 'policy.status.REJECTED_CLIENT',
            "pending_cancel" => 'policy.status.PENDING_CANCEL'
        ];

        if(!$plain) {
            foreach($statuses as $key => $value) {
                $statuses[$key] = __($value);
            }
        }

        return $statuses;
    }
}

if(!function_exists('getPolicyStatusPlain')) {

    function getPolicyStatusPlain() {
        return getPolicyStatus(1);
    }

}

if(!function_exists('getInvoiceStatus')) {
    /**
     * Returns translated invoice statuses.
     * 
     * @return array $status
     */
    function getInvoiceStatus($plain = 0){
        $statuses = [
            'waiting_for_payment' => 'invoice.status.WAITING_FOR_PAYMENT',
            'partial_paid' => 'invoice.status.PARTIAL_PAID',
            'paid' => 'invoice.status.PAID',
            'pastdue' => 'invoice.status.PASTDUE',
            'refunded' => 'invoice.status.REFUNDED',
            'partial_refunded' => 'invoice.status.PARTIAL_REFUNDED',
            'reminder' => 'invoice.status.REMINDER',
            'warning1' => 'invoice.status.WARNING1',
            'warning2' => 'invoice.status.WARNING2',
            'collection' => 'invoice.status.COLLECTION',
            'online_payment_waiting' => 'invoice.status.ONLINE_PAYMENT_WAITING',
            'online_payment_invalid' => 'invoice.status.ONLINE_PAYMENT_INVALID',
            'debt_enforcement' => 'invoice.status.DEBT_ENFORCEMENT'
        ];

        if(!$plain) {
            foreach($statuses as $key => $value) {
                $statuses[$key] = __($value);
            }
        }

        return $statuses;
    }
}

if(!function_exists('getInvoiceStatusPlain')) {

    function getInvoiceStatusPlain() {
        return getInvoiceStatus(1);
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
    function format($number, $override_config = false, $elements = []){
        if($override_config) {
            $decpoint = $elements['decpoint'];
            $thousands = $elements['thousands'];
            $decimals = $elements['decimals'];    
        } else {
            $decpoint = config('crm.decpoint');
            $thousands = config('crm.thousands');
            $decimals = config('crm.decimals');
        }
        $number = roundTo5($number);
        return  number_format($number, $decimals, $decpoint, $thousands);
    }

}

if(!function_exists('getContactPDF')) {
    /**
     * Returns Contact PDF related statues.
     * 
     * @return array $status
     */
    function getContactPDF($plain = 0) {
        $statuses = [
            'content_pdf_img' => 'contact.pdf.PRECONFIRMATION_IMG',
            'content_pdf1' => 'contact.pdf.REJECTED',
            'offer_print' => 'contact.pdf.OFFER_PRINT_LETTER'
        ];

        if(!$plain) {
            foreach($statuses as $key => $value) {
                $statuses[$key] = __($value);
            }
        }

        return $statuses;
    }

}

if(!function_exists('getContactPDFPlain')) {

    function getContactPDFPlain() {
        return getContactPDF(1);
    }

}

if(!function_exists('get_salutation')) {

    /**
     * Returns translated salutation.
     * 
     * @param string $salutation
     * @return string translated salutation
     */
    function get_salutation($salutation) {
        switch($salutation) {
            case 'mr': 
                return __('general.MR'); 
                break;
            case 'mrs': 
                return __('general.MRS'); 
                break;
            case 'company': 
                return __('general.COMPANY'); 
                break;
        }
    }

}

if(!function_exists('getPDFSalutation')) {

    function getPDFSalutation($salutation) {
        switch ($salutation) {
            case 'mrs':
                $salutation = __('general.PDF_MRS');
                break;
            case 'mr':
                $salutation = __('general.PDF_MR');
                break;
            case 'company':
                $salutation = __('general.PDF_COMPANY');
                break;
            default:
                $salutation = '';
                break;
        }
        return $salutation;
    }

}

if(!function_exists('writePDFContent')) {

    function writePDFContent($data, $ln = true, $fill = 0, $reseth = false, $cell = false, $align = '') {
        foreach($data as $element){
            $content = array_shift($element);
            PDF::SetXY($element['x'], $element['y'], '');
            PDF::writeHTML($content, $ln, $fill, $reseth, $cell, $align);
        }
    }
    
}

if(!function_exists('getLeadSource')) {

    function getLeadSource($plain = 0) {
        $leadsource = array();

        $leadsource['online_registration'] = 'contact.leadsource.ONLINE_REGISTRATION';
        $leadsource['affiliate_marketing'] = 'contact.leadsource.AFFILIATE_MARKETNG';
        $leadsource['partner_management'] = 'contact.leadsource.PARTNER_MANAGEMENT';
        $leadsource['other'] = 'contact.leadsource.OTHER';
        $leadsource['partner_login'] = 'contact.leadsource.PARTNERLOGIN';
        $leadsource['call_centre'] = 'contact.leadsource.CALLCENTRE';
        $leadsource['pdf_cls'] = 'contact.leadsource.PDF_CLS';
        $leadsource['pdf_mks'] = 'contact.leadsource.PDF_MKS';
        $leadsource['pdf_go'] = 'contact.leadsource.PDF_GO';
        $leadsource['form_offer'] = 'contact.leadsource.PDF_OFFER';
        $leadsource['form_preconfirmation'] = 'contact.leadsource.PDF_PRECONFIRMATION';
        $leadsource['mks_gocaution'] = 'contact.leadsource.MKS_GOCAUTION';
        $leadsource['mks_offer'] = 'contact.leadsource.MKS';
        $leadsource['cls_offer'] = 'contact.leadsource.CLS';
        $leadsource['ca_offer'] = 'contact.leadsource.CA';

        if(!$plain) {
            foreach($leadsource as $key => $value) {
                $leadsource[$key] = __($value);
            }
        }

        return $leadsource;
    }

}

if(!function_exists('getLeadSourcePlain')) {

    function getLeadSourcePlain() {
        return getLeadSource(1);
    }
    
}

if(!function_exists('getLichtensteinZipCodes')) {
    /**
     * returns all Lichtenstein Zip codes.
     * @return array
     */
    function getLichtensteinZipCodes(){
        return config('app.lichtenstein_zip_codes');
    }
}

if(!function_exists('getCompanyTypes')) {
    /**
     * returns all company types.
     * @return array
     */
    function getCompanyTypes() {
        $company_type = [];

        $company_type["public_limited_company"] = __('contact.company_type.PUBLIC_LIMITED_COMPANY');
        $company_type["limited_liability_company"] = __('contact.company_type.LIMITED_LIABILITY_COMPANY');
        $company_type["simple_partnership"] = __('contact.company_type.SIMPLE_PARTNERSHIP');
        $company_type["sole_proprietorship"] = __('contact.company_type.SOLE_PROPRIETORSHIP');
        $company_type["cooperative"] = __('contact.company_type.COOPERATIVE');
        $company_type["collective_society"] = __('contact.company_type.COLLECTIVE_SOCIETY');
        $company_type["limited_partnership"] = __('contact.company_type.LIMITED_PARTNERSHIP');
        $company_type["stock_company"] = __('contact.company_type.STOCK_COMPANY');
        $company_type["institute_of_public_law"] = __('contact.company_type.INSTITUTE_OF_PUBLIC_LAW');
        $company_type["club"] = __('contact.company_type.CLUB');
        $company_type["endowment"] = __('contact.company_type.ENDOWMENT');

        return $company_type;
    }
}

if(!function_exists('getCompanyBranches')) {
    /**
     * returns all company branches.
     * @return array
     */
    function getCompanyBranches() {
        $company_branch = [];

        $company_branch["car_traffic"] = __('contact.company_branch.CAR_TRAFFIC');
        $company_branch["bauen_renovieren"] = __('contact.company_branch.BAUEN_RENOVIEREN');
        $company_branch["authorities_associations"] = __('contact.company_branch.AUTHORITIES_ASSOCIATIONS');
        $company_branch["education_science"] = __('contact.company_branch.EDUCATION_SCIENCE');
        $company_branch["computers_electronics"] = __('contact.company_branch.COMPUTERS_ELECTRONICS');
        $company_branch["service"] = __('contact.company_branch.SERVICE');
        $company_branch["leisure_travel"] = __('contact.company_branch.LEISURE_TRAVEL');
        $company_branch["financial_service"] = __('contact.company_branch.FINANCIAL_SERVICE');
        $company_branch["health_wellness"] = __('contact.company_branch.HEALTH_WELLNESS');
        $company_branch["wholesale_retail"] = __('contact.company_branch.WHOLESALE_RETAIL');
        $company_branch["immobilien"] = __('contact.company_branch.IMMOBILIEN');
        $company_branch["hotel_gastronomie"] = __('contact.company_branch.HOTEL_GASTRONOMIE');
        $company_branch["living_furnishing"] = __('contact.company_branch.LIVING_FURNISHING');
        $company_branch["sonstige"] = __('contact.company_branch.SONSTIGE');

        return $company_branch;
    }
}

if(!function_exists('getPremiumAmount')) {

    function getPremiumAmount($deposit_amount, $private = 0) {
        if($private) {
            if($deposit_amount <= 2000) {
                $subtotal = ((2000 * 0.045) * (1+5/100));
            } else {
                $subtotal = (($deposit_amount * 0.045) * (1+5/100));
            }
        }
        else
        {
            //@TODO
        }
        return $subtotal;
    }

}

if(!function_exists('getKantons')) {

    function getKantons() {

        $lang = app()->getLocale();

        if($lang=='de'){
            $whichname = 'german';
        }
        if($lang=='fr'){
            $whichname = 'french';
        }
        if($lang=='it'){
            $whichname = 'italian';
        }
        if($lang=='en'){
            $whichname = 'german';
        }

        $kantons = App\Canton::all()->pluck($whichname, 'shortcode');

        return $kantons;
    }

}

if(!function_exists('getCities')) {

    function getCities() {

        $cities = App\PrivateLandlord::distinct('city')->pluck('city');

        return $cities;
    }
    
}

if(!function_exists('privatelandlord_salutation')) {

    function privatelandlord_satulation($plain = 0) {
        $salutation = [];
        $salutation['mr'] = __('general.MR'); 
        $salutation['mrs'] = __('general.MRS'); 
        $salutation['family'] = __('general.FAMILY');
        $salutation['company'] = __('general.COMPANY');
        if(!$plain) {
            foreach($salutation as $key => $value) {
                $salutation[$key] = __($value);
            }
        }
        return $salutation;
    }

}

if(!function_exists('privatelandlord_salutationPlain')) {

    function privatelandlord_salutationPlain() {
        return privatelandlord_salutation(1);
    }

}

if(!function_exists('brokers_cities')) {

    function brokers_cities() {
        $cities = App\Broker::distinct('city')->pluck('city');
        return $cities;
    }

}