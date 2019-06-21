<?php
  return [
      'TITLE'=>'Request your access and manage your tenant policies online.',
      'HEADLINE'=>'We will be happy to arrange an appointment with you by telephone and guide you through the application via screen transmission, regardless of whether or not tenants of yours have already concluded a deposit policy with us.',
      'FORM_FIELDS' => [
          'COMPANY'=>'Company\'s name',
          'LAST_NAME'=>'Name',
          'FIRST_NAME'=>'First Name',
          'ZIP'=>'Zip',
          'CITY'=>'City',
          'TELEPHONE'=>'Phone/Mobile',
          'ADDRESS'=>'Address',
          'EMAIL'=>'Email',
          'TO_SEND'=>'Send',
      ],
      'VALIDATION' => [
          'LAST_NAME'=>'Please fill in.',
          'ZIP'=>'Please fill in.',
          'CITY'=>'Please fill in.',
          'FIRST_NAME'=>'Please let us know your first name.',
          'ADDRESS'=>'Please enter your address',
          'TELEPHONE'=>'Please fill in',
          'EMAIL'=>'Please let us know your email address.',
          'EMAIL_VALID' => 'Please enter a valid e-mail address.',
      ],
      'THANK_YOU'=>'Thank you very much for your inquiry.',
      'ADMIN_EMAIL_SUBJECT'=>'Landlord login | Access data requested',
      'REG_REQUEST_HEADLINE'=>'A customer has requested a landlord to have access to the landlord-login.',
      'routes' => [
          'REGISTER_REQUEST' => 'register-request',
      ],
  ];