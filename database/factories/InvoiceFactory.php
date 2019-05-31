<?php

use Faker\Generator as Faker;

$factory->define(App\Invoice::class, function (Faker $faker) {
   static $number = 1;
   $real_invoice_num = $number++;
   return [
         'policy_id' => 0,
         'invoice_num' => getUniqueNum($real_invoice_num, 1),
         'real_invoice_num' => 0,
         'added' => $faker->dateTime(),
         'computed_total' => $faker->randomFloat(),
         'status' => $faker->randomElement(array_keys(getInvoiceStatus())),
         'date' => $faker->dateTime(),
         'startdate' => date('Y-m-d', strtotime( '+'.mt_rand(1,5).' days')),
         'enddate' => date('Y-m-d', strtotime( '+'.mt_rand(6,10).' days')),
         'is_recurrent' => 0,
         'reminder_status' => 0,
         'sent_reminder' => 0,
         'sent_reminder_date' => '0000-00-00',
         'sent_warning1' => 0,
         'sent_warning1_date' => '0000-00-00',
         'sent_warning2' => 0,
         'sent_warning2_date' => '0000-00-00',
         'sent_collection' => 0,
         'sent_collection_date' => '0000-00-00',
         'sent_command' => 0,
         'sent_command_date' => '0000-00-00',
         'special_time_allowance' => 0,
         'discount' => $faker->randomFloat(2, 1, 20000),
         'auth_code' => '',
         'last_sent' => '0000-00-00 00:00:00',
         'send_details' => '',
         'payment_type' => '',
         'created_by' => 0,
         'notes' => '',
         'admin_notes' => '',
         'external_ref' => 0,
         'from_num' => 0,
         'external_type' => '',
         'finalinvoice' => 0,
         'nextdiscount_item_id' => 0,
         'debt_collection' => 0,
         'generali_paid_date' => '0000-00-00',
         'generali_billing_from_date' => '0000-00-00',
         'generali_billing_to_date' => '0000-00-00',
         'paid_from_generali_date' => '0000-00-00',
    ];
});
