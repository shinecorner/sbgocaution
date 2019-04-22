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
        if($type == 1) $format = config('invoices.invoice_num_format');
        elseif($type == 2) $format = config('invoices.quote_num_format');
        elseif($type == 3) $format = config('invoices.contact_num_format');

        $real_invoice_num = str_pad($real_invoice_num, config('invoices.invoice_number_digits'), '0', STR_PAD_LEFT);

        $string = str_replace("[num]", $real_invoice_num, $format);
        $string = str_replace("[yyyy]", date("Y"), $string);
        $string = str_replace("[mm]", date("m"), $string);
        $string = str_replace("[dd]", date("d"), $string);

        return $string;
    }
}