<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use App\ContactOffer;
use App\Contact;
use App;

class BaseEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    public $emailBody;
    public $file_attachments;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact, $emailBody, $attachments = [], $subject)
    {
        $this->contact = $contact;
        $this->emailBody = str_replace('{customer_email_message}', $emailBody, $this->getBaseEmailBody());
        $this->file_attachments = $attachments;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->html($this->emailBody);
        foreach($this->file_attachments as $filePath) {
            $email->attach($filePath);
        }
        $email->subject($this->subject);
        return $email;
    }

    private function getBaseEmailBody($templatetype = 'base')
    {
        $email_template = view('api.emails.base', [ 'type' => $templatetype ])->render();

        $customer_email_body_from = [
            '{customer_data_saved}',
            '{logo}',
            '{copyright}',
            '{office_working_time}',
            '{company_name}',
            '{company_address}',
            '{company_zip_city}',
            '{company_hotline}',
            '{company_email}',
            '{preheader_text}',
            '{policy_damage_partner_login_button}'
        ];

        $customer_email_body_to = [
            __('general.base_email.PARTNER_DATA_SAVED_SUCCESSFULLY', [], null, false),
            __('general.base_email.LOGO', [], null, false),
            __('general.base_email.COPYRIGHT', [], null, false),
            __('general.base_email.MAILTEXT5', [], null, false),
            __('general.base_email.COMPANY', [], null, false),
            __('general.base_email.COMPANY_ADDRESS', [], null, false),
            __('general.base_email.COMPANY_ZIP_CITY', [], null, false),
            __('general.base_email.HOTLINE', [], null, false),
            __('general.base_email.MAIL', [], null, false), 
            __('general.base_email.OFFER_EMAIL_PREVIEW_TEXT', [], null, false),
            ''
        ];

        $baseEmailUpdatedBody = str_replace($customer_email_body_from, $customer_email_body_to, $email_template);

        return $baseEmailUpdatedBody;
    }

}
