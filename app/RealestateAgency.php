<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealestateAgency extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'realestate_agencies';

    protected $fillable = [
        'id', 'real_realestate_agency_num', 'user_id', 'created_by', 'is_duplicate', 'realestate_agency_num', 'number', 'status', 'name', 'address', 'zip', 'city', 'lattitude', 'longitude', 'state', 'country', 'phone', 'phone2', 'fax', 'email', 'website', 'language', 'region', 'inter1', 'inter2', 'inter3', 'contact_person_1', 'contact_person_2', 'contact_person_3', 'crediweb_username_old', 'crediweb_password_old', 'status_contract', 'notes', 'partner_username', 'partner_password', 'contact_person_1_anrede', 'contact_person_1_nachname', 'contact_person_1_vorname', 'contact_person_2_nachname', 'contact_person_2_vorname', 'contact_person_3_nachname', 'contact_person_3_vorname', 'contact_person_2_anrede', 'contact_person_3_anrede', 'contact_person_1_position', 'contact_person_2_position', 'contact_person_3_position', 'key_account_manager', 'quote_comment_notification', 'damage_comment_notification', 'certificate_email', 'payment_recipient_bank', 'payment_recipient_iban', 'payment_recipient_post_account', 'child_realestate_agencies', 'scan_file_name', 'mass_email_sent', 'mass_email_sent_time', 'newpolicy_email_notification', 'hoacception'
    ];

    public $timestamps = false;

}
