<?php
  return [
      'TITLE'=>'Demandez votre accès et gérez vos cautions de location en ligne',
      'HEADLINE'=>'L\'accès est disponible pour toutes les gérances, même si vous n\'avez pas d\'activité pour l\'instant chez nous. Nous vous offrons également la possibilité de vous aider à la manipulation de celui-ci par téléphone ou lors d\'un entretien.',
      'FORM_FIELDS' => [
          'COMPANY'=>'Société',
          'LAST_NAME'=>'Nom',
          'FIRST_NAME'=>'Prénom',
          'ZIP'=>'NPA',
          'CITY'=>'Lieu',
          'TELEPHONE'=>'Téléphone / Mobile',
          'ADDRESS'=>'Adresse',
          'EMAIL'=>'E-Mail',
          'TO_SEND'=>'Envoyer',
        ],
      'VALIDATION' => [
          'LAST_NAME'=>'Please let us know your name.',
          'ZIP'=>'Veuillez nous communiquer votre code postal.',
          'CITY'=>'Veuillez nous indiquer le nom de votre ville.',
          'FIRST_NAME'=>'Invalid Input',
          'ADDRESS'=>'Bitten geben Sie Ihre Adresse ein',
          'TELEPHONE'=>'Invalid Input',
          'EMAIL'=>'Please let us know your email address.',
          'EMAIL_UNIQUE'=>'Cet e-mail est déjà utilisé.',
          'EMAIL_VALID' => 'L\'adresse électronique doit être une adresse électronique valide.',
      ],
      'THANK_YOU'=>'Vielen Dank für Ihre Anfrage.',
      'THANK_YOU_TEXT'=>'Merci à vous',
      'ADMIN_EMAIL_SUBJECT'=>'Connexion propriétaire | Données d\'accès demandées',
      'REG_REQUEST_HEADLINE'=>'Un client a demandé à un propriétaire d\'avoir accès à son identifiant propriétaire.',
      'routes' => [
          'REGISTER_REQUEST' => 'registre-demande',
      ],
  ];