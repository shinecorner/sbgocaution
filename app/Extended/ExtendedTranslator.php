<?php

namespace App\Extended;

use Illuminate\Translation\Translator;

class ExtendedTranslator extends Translator
{
    public function get($key, array $replace = [], $locale = null, $fallback = true)
    {
    	$values = explode('.', $key);
    	$last_value = array_pop($values);
        $upper_value = mb_strtoupper($last_value);
        array_push($values, $upper_value);
        $key = implode('.', $values);
        return parent::get($key, $replace, $locale, $fallback);
    }
}