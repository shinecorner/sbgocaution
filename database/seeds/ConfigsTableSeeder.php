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
            	'key' => 'date_format.display_date_format',
            	'value' => 'd.m.Y H:i:s'
            ],
            [
            	'key' => 'pagination.items_per_page',
            	'value' => 20
            ],
            [
            	'key' => 'invoices.invoice_num_format',
            	'value' => '[yyyy]-[num]'
            ],
            [
            	'key' => 'invoices.quote_num_format',
            	'value' => '[yyyy]-[num]'
            ],
            [
            	'key' => 'invoices.contact_num_format',
            	'value' => 'KD-[yyyy][mm]150[num]'
            ],
            [
            	'key' => 'invoices.invoice_number_digits',
            	'value' => 0
            ],
            [
            	'key' => 'invoices.decpoint',
            	'value' => '.'
            ],
            [
            	'key' => 'invoices.thousands',
            	'value' => ','
            ],
            [
            	'key' => 'invoices.decimals',
            	'value' => 2
            ],
            
        ]);
        Artisan::call('config:cache');
    }
}
