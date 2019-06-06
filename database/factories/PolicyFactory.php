<?php

use Faker\Generator as Faker;

$factory->define(App\Policy::class, function (Faker $faker) {
	static $number = 1;
	$real_policy_num = $number++;
    return [
        'real_policy_num' => $real_policy_num,
        'policy_num' => getUniqueNum($real_policy_num, 2),
        'computed_total' => $faker->randomFloat(2, 95, 4000),
        'status' => $faker->randomElement(array_keys(getPolicyStatus())),
        'date' => $faker->dateTime(),
        'startdate' => date('Y-m-d', strtotime( '+'.mt_rand(1,5).' days')),
        'contact_id' => 0,
        'auth_code' => 0,
        'last_sent' => date('Y-m-d h:i:s'),
        'certificate_send_details' => '',
        'last_sent_date_certificate' => date('Y-m-d h:i:s'),
        'realestate_agency_id' => 0,
        'employee_id'=> 0,
        'privatelandlord_id'=> 0,
        'houseowner_id'=> 0,
        'broker_id' => 0,
        'notes'=> '',
        'policy_type'=> '',
        'talked_to_landlord' =>'',
        'we_talk_to_landlord'=> '',
        'admin_notes'=> '',
        'external_ref'=> 0,
        'refund_doc'=> '',
        'from_num'=> 0,
        'organization_message'=> '',
        'external_type'=> '',
        'cn_in_year' => $faker->boolean(),
        'md_invoiceid'=> 0,
        'sub_rent'=> '',
        'bank_name'=> '',
        'existing_customer_quotestion1_sub'=> '',
        'existing_customer_quotestion1'=> '',
        'policy_at_other_provider'=> ''
    ];
});
