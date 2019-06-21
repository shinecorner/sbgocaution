<?php
  return [
      'TITLE'=>'Demandez votre accès et gérez vos cautions de location en ligne',
      'HEADLINE'=>'L\'accès est disponible pour toutes les gérances, même si vous n\'avez pas d\'activité pour l\'instant chez nous. Nous vous offrons également la possibilité de vous aider à la manipulation de celui-ci par téléphone ou lors d\'un entretien.',
      'FORM_FIELDS' => [
          'COMPANY'=>'Nome dell\'azienda',
          'LAST_NAME'=>'Cognome',
          'FIRST_NAME'=>'Nome',
          'ZIP'=>'Codice postale',
          'CITY'=>'Collocazione',
          'TELEPHONE'=>'Telefono/Cellulare',
          'ADDRESS'=>'Indirizzo',
          'EMAIL'=>'E-Mail',
          'TO_SEND'=>'Inviare',
      ],
      'VALIDATION' => [
          'LAST_NAME'=>'Si prega di compilare.',
          'ZIP'=>'Si prega di compilare.',
          'CITY'=>'Si prega di compilare.',
          'FIRST_NAME'=>'Veuillez nous communiquer votre prénom.',
          'ADDRESS'=>'Inserisci il tuo indirizzo',
          'TELEPHONE'=>'Si prega di compilare',
          'EMAIL'=>'Comunicaci il tuo indirizzo e-mail.',
          'EMAIL_UNIQUE'=>'Questa e-mail è già in uso.',
          'EMAIL_VALID'=>'L\'e-mail deve essere un indirizzo e-mail valido.',
      ],
      'THANK_YOU'=>'La ringrazio molto per la sua richiesta.',
      'ADMIN_EMAIL_SUBJECT'=>'Login del proprietario | Dati di accesso richiesti',
      'REG_REQUEST_HEADLINE'=>'Un cliente ha chiesto al locatore di avere accesso al logo del proprietario.',
      'routes' => [
          'REGISTER_REQUEST' => 'registrazione-richiesta',
      ],
  ];