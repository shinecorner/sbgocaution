<?php

namespace App\Extended;

use Illuminate\Translation\Translator;

class ExtendedTranslator extends Translator
{

	/**
	 * get lowercase key and convert it uppercase key.
	 * 
	 * @param string $key
	 * @param array $replace
	 * @param string $locale
	 * @param boolean $fallback
	 * @return string $key
	 */
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