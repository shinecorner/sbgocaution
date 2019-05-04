<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('configs')->truncate();
        DB::table('configs')->insert([
            [
            	'option' => 'date_format.display_date_format',
            	'value' => 'd.m.Y H:i:s'
            ],
            [
            	'option' => 'pagination.items_per_page',
            	'value' => 20
            ],
            [
            	'option' => 'invoices.invoice_num_format',
            	'value' => '[yyyy]-[num]'
            ],
            [
            	'option' => 'invoices.quote_num_format',
            	'value' => '[yyyy]-[num]'
            ],
            [
            	'option' => 'invoices.contact_num_format',
            	'value' => 'KD-[yyyy][mm]150[num]'
            ],
            [
            	'option' => 'invoices.invoice_number_digits',
            	'value' => 0
            ],
            [
            	'option' => 'invoices.decpoint',
            	'value' => '.'
            ],
            [
            	'option' => 'invoices.thousands',
            	'value' => ','
            ],
            [
            	'option' => 'invoices.decimals',
            	'value' => 2
            ],
            
        ]);
        Artisan::call('config:cache');
    }
}
