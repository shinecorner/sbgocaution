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

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact, $offerEmailContent)
    {
        $this->contact = $contact;
        $offerEmailContent = str_replace('{customer_email_message}', $offerEmailContent, $this->getBaseEmailBody());
        //Offer table starts
        $deposit_amount_formatted = format($contact->deposit_amount);
        $subtotal = getPremiumAmount($contact->deposit_amount, 1);
        $premium_tax = (($subtotal * 0.050));
        $premium_tax_formatted = format($premium_tax);
        $premium_total_formatted = format($subtotal+$premium_tax);
        $premium_formatted = format($premium_total_formatted-$premium_tax_formatted, false);
        $offer_table = view('api.emails.offer_table')->render();
        $offerEmailContent = str_replace('{offer_table}', $offer_table, $offerEmailContent);
        $this->offerEmailContent = $offerEmailContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->html($this->offerEmailContent);
        switch ($this->contact->language) {
            case 'fr':
                $attachments = [
                    Storage::disk('public')->path('download'.DS.'fr'.DS."conditions-generales-CGA.pdf"),
                    Storage::disk('public')->path('download'.DS.'fr'.DS."gocaution-formulaire.pdf"),
                    Storage::disk('public')->path('download'.DS.'fr'.DS."flyer_locataire.pdf")
                ];
                break;

            case 'de':
                $attachments = [
                    Storage::disk('public')->path('download'.DS.'de'.DS."allgemeine-versicherungsbedingungen-avb.pdf"),
                    Storage::disk('public')->path('download'.DS.'de'.DS."gocaution-antrag.pdf"),
                    Storage::disk('public')->path('download'.DS.'de'.DS."flyer_mieter.pdf")
                ];
                break;

            case 'it':
                $attachments = [
                    Storage::disk('public')->path('download'.DS.'it'.DS."condizioni-generali-assicurazione-cga.pdf"),
                    Storage::disk('public')->path('download'.DS.'it'.DS."modulo.pdf"),
                    Storage::disk('public')->path('download'.DS.'it'.DS."volantino.pdf")
                ];
                break;    

            default:
                $attachments = [
                    Storage::disk('public')->path('download'.DS.'de'.DS."allgemeine-versicherungsbedingungen-avb.pdf"),
                    Storage::disk('public')->path('download'.DS.'de'.DS."gocaution-antrag.pdf"),
                    Storage::disk('public')->path('download'.DS.'de'.DS."flyer_mieter.pdf")
                ];
                break;
        }
        foreach($attachments as $filePath) {
            $email->attach($filePath);
        }
        $email->subject(__('general.offer_email.SUBJECT'));
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
