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
        'real_contact_num', 'user_id', 'is_duplicate', 'contact_num', 'number', 'status', 'name', 'address', 'zipcode', 'city', 'lattitude', 'longitude', 'state', 'stateold', 'country', 'phone', 'phone2', 'fax', 'email', 'website', 'language', 'region', 'inter1', 'inter2', 'inter3', 'contact_person_1', 'contact_person_2', 'contact_person_3', 'crediweb_username_old', 'crediweb_password_old', 'status_vertrag', 'notes', 'partner_username', 'partner_password', 'contact_person_1_anrede', 'contact_person_1_nachname', 'contact_person_1_vorname', 'contact_person_2_nachname', 'contact_person_2_vorname', 'contact_person_3_nachname', 'contact_person_3_vorname', 'contact_person_2_anrede', 'contact_person_3_anrede', 'contact_person_1_position', 'contact_person_2_position', 'contact_person_3_position', 'old_notes', 'key_account_manager', 'quote_comment_notification', 'damage_comment_notification', 'certificate_email', 'payment_recipient_bank', 'payment_recipient_iban', 'payment_recipient_post_account', 'child_organizations', 'scan_file_name', 'mass_email_sent', 'mass_email_sent_time', 'newquote_email_notification', 'hoacception'
    ];

    public $timestamps = false;
    
}
