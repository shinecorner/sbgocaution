<?php
  return [
      'TITLE'=>'Fordern Sie Ihren Zugang an und verwalten Sie die Mieter-Policen online.',
      'HEADLINE'=>'Gerne vereinbaren wir mit Ihnen einen telefonischen Termin und führen Sie mittels Bildschirmübertragung durch die Applikation, unabhängig davon, ob bereits Mieterinnen von Ihnen eine Kautionspolice bei uns abgeschlossen haben oder nicht.',
      'FORM_FIELDS' => [
          'COMPANY'=>'Unternehmen',
          'LAST_NAME'=>'cognome',
          'FIRST_NAME'=>'Vorname',
          'ZIP'=>'Postleitzahl',
          'CITY'=>'Stadt',
          'TELEPHONE'=>'Telefon',
          'ADDRESS'=>'Adresse',
          'EMAIL'=>'E-Mail',
          'TO_SEND'=>'senden',
      ],
      'VALIDATION' => [
          'LAST_NAME'=>'Bitte ausfüllen',
          'ZIP'=>'Bitte ausfüllen',
          'CITY'=>'Bitte ausfüllen',
          'FIRST_NAME'=>'Bitte teilen Sie uns Ihren Vornamen mit.',
          'ADDRESS'=>'Bitten geben Sie Ihre Adresse ein',
          'TELEPHONE'=>'Bitte ausfüllen',
          'EMAIL'=>'Bitte geben Sie eine gültige E-Mail Adresse ein.',
          'EMAIL_UNIQUE'=>'Diese E-Mail wird bereits verwendet!',
          'EMAIL_VALID'=>'Bitte geben Sie eine gültige E-Mail-Adresse ein.',

      ],
      'THANK_YOU'=>'Vielen Dank für Ihre Anfrage',
      'ADMIN_EMAIL_SUBJECT'=>'Vermieter-Login | Zugangsdaten angefordert',
      'REG_REQUEST_HEADLINE'=>'Ein Kunde hat ein Vermieter einen Zugang zum Vermieter-Login angefordert.',
      'routes' => [
          'REGISTER_REQUEST' => 'registre-demande',
      ],
  ];