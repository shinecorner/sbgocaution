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
            	'option' => 'crm.display_date_format',
            	'value' => 'd.m.Y H:i:s'
            ],
            [
            	'option' => 'crm.items_per_page',
            	'value' => 20
            ],
            [
            	'option' => 'crm.invoice_num_format',
            	'value' => 'RE-[yyyy]150[num]'
            ],
            [
            	'option' => 'crm.quote_num_format',
            	'value' => 'MK-[yyyy]950[num]'
            ],
            [
            	'option' => 'crm.contact_num_format',
            	'value' => 'KD-[yyyy][mm]150[num]'
            ],
            [
            	'option' => 'crm.invoice_number_digits',
            	'value' => 0
            ],
            [
            	'option' => 'crm.decpoint',
            	'value' => '.'
            ],
            [
            	'option' => 'crm.thousands',
            	'value' => ','
            ],
            [
            	'option' => 'crm.decimals',
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
                'value' => 'ssl'
            ],
            [
                'option' => 'mail.authentication',
                'value' => 'Yes'
            ],
            [
                'option' => 'mail.username',
                'value' => 'info@gocaution.ch'
            ],
            [
                'option' => 'mail.password',
                'value' => '%h+DpP<WtkLcq'
            ],
            [
                'option' => 'crm.robots',
                'value' => 'noindex, nofollow'
            ],
            
        ]);
        Artisan::call('config:cache');
    }
}
