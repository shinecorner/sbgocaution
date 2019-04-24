<?php

return [
	'invoice_num_format' => env('INVOICE_NUM_FORMAT', '[yyyy]-[num]'),
	'quote_num_format' => env('QUOTE_NUM_FORMAT', '[yyyy]-[num]'),
	'contact_num_format' => env('CONTACT_NUM_FORMAT', 'KD-[yyyy][mm]150[num]'),
	'invoice_number_digits' => env('INVOICE_NUMBER_DIGITS', 0),
	'decpoint' => env('DECPOINT','.'),
	'thousands' => env('THOUSANDS', ','),
	'decimals' => env('DECIMALS', 2),
];