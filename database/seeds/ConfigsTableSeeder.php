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
            [
                'option' => 'mail.from.name',
                'value' => 'goCaution®'
            ],
            [
                'option' => 'mail.from.address',
                'value' => 'info@gocaution.ch'
            ],
            [
                'option' => 'mail.driver',
                'value' => 'log'
            ],
            [
                'option' => 'mail.reply_to.name',
                'value' => 'goCaution®'
            ],
            [
                'option' => 'mail.reply_to.address',
                'value' => 'info@gocaution.ch'
            ],
            [
                'option' => 'mail.port',
                'value' => '465'
            ],
            [
                'option' => 'mail.encryption',
                'value' => 'tls'
            ],
            [
                'option' => 'mail.authentication',
                'value' => 'Yes'
            ],
            [
                'option' => 'mail.username',
                'value' => 'null'
            ],
            [
                'option' => 'mail.password',
                'value' => 'null'
            ],
            [
                'option' => 'general.robots',
                'value' => 'No index, No follow'
            ],
            
        ]);
        Artisan::call('config:cache');
    }
}
