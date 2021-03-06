<?php
return [
    'CONTACTS' => 'Clientozoooo',
    'CONTACT' => 'Kunde',    
    'ID'=> 'Numero cliente',
    'TOTAL_INVOICES' => 'Rechnung(en)',
    'TOTAL_POLICIES' => 'Politiche',
    'LINKED_TO_USER' => 'User',
    'RC_POLICY_TOOLTIP' => 'È interessato a un\'offerta PH.',
    'CALL_LEAD_SOURCE_TOOLTIP' => 'Call center',
    'SEND_OFFER_BY_POST_TOOLTIP' => 'Offerte per Post', 
    'ADD_NEW_POLICY' => 'Police(n)', 
    'leadsource' => [
        'ONLINE_REGISTRATION' => "Online Registrierung",
        'AFFILIATE_MARKETNG' => "Affiliate Marketing",
        'PARTNER_MANAGEMENT' => "Gestione dei partner",
        'PARTNERLOGIN' => "Partner-Login",
        'OTHER' => 'Altro',
        'CALLCENTRE' => "Callcenter VG",
        'PDF_CLS' => "CLS PDF Antrag",
        'PDF_MKS'=> "MKS PDF Antrag",
        'PDF_GO'=> "GO PDF Antrag ",
        'PDF_OFFER'=> "GO Online-Offerte",
        'PDF_PRECONFIRMATION' => "GO Online-Vorabbestätigung",
        'MKS_GOCAUTION' => "MKS GO Online-Offere",
        'MKS' => "Mietkautionschweiz.ch",
        'CLS'=> "CautionLoyerSuisse.ch",
        'CA' => "Cauzione-Affitto.ch"
    ],
    'pdf' => [
        'PRECONFIRMATION_IMG' => "Vorabbestätigung Online",
        'REJECTED' => "Ablehnungsschreiben",
        'OFFER_PRINT_LETTER' => "Offerte Begleitschreiben"
    ],
    'status' => [
        'NEW' => 'Neu',
        'OFFER' => 'Offerte gesendet',
        'IN_CLARIFICATION' => 'In Abklärung',
        'PENDING' => 'Pendent',
        'ACCEPTED' => 'Laufend',
        'PRE_CONFIRMATION_PENDING' => 'In attesa di conferma',
        'PRE_CONFIRMATION_SENT' => 'Pre-conferma inviata',
        'CANCELLED' => 'Annulliert',
        'REJECTED' => 'Abgelehnt',
        'DISSOLVED_IMMEDIATELY' => 'Aufgelöst nach Abschluss',
        'RESOLVED' => 'Gekündigt',
        'POLICY_WAITING' => 'Warten auf Prüfung'
    ],
    'INSURE_POLICY_BELONGS_LICHTENSTEIN_CONTACTSLIST' => ":POLICY_NUMS gehören zu Lichtenstein",
    'company_type' => [
        'PUBLIC_LIMITED_COMPANY' => "SOCIETÀ PER AZIONI",
        'LIMITED_LIABILITY_COMPANY' => "società a responsabilità limitata",
        'SIMPLE_PARTNERSHIP' => "Partenariato semplice",
        'SOLE_PROPRIETORSHIP' => "ditta individuale",
        'COOPERATIVE' => "collaborativo",
        'COLLECTIVE_SOCIETY' => "società collettiva",
        'LIMITED_PARTNERSHIP' => "società in accomandita",
        'STOCK_COMPANY' => "Società in accomandita",
        'INSTITUTE_OF_PUBLIC_LAW' => "Istituto di diritto pubblico",
        'CLUB' => "locale notturno",
        'ENDOWMENT' => "dote"
    ],
    'company_branch' => [
        'CAR_TRAFFIC' => "Auto & Traffico",
        'BUILD_RENOVATE' => "Costruire & Ristrutturare",
        'AUTHORITIES_ASSOCIATIONS' => "Autorità e associazioni",
        'EDUCATION_SCIENCE' => "Educazione e scienza",
        'COMPUTERS_ELECTRONICS' => "Computer & Elettronica",
        'SERVICE' => "prestazione",
        'LEISURE_TRAVEL' => "Tempo libero e viaggi",
        'FINANCIAL_SERVICE' => "servizio finanziario",
        'HEALTH_WELLNESS' => "Salute e benessere",
        'WHOLESALE_RETAIL' => "Commercio all'ingrosso e al dettaglio",
        'REAL_ESTATE' => "beni immobili",
        'HOTEL_GASTRONOMY' => "Hotel & Gastronomia",
        'LIVING_FURNISHING' => "Abitare & Arredamento",
        'OTHER' => "Altro"
    ],
    'filter' => [
        'MORE_THAN_ONE_POLICY' => 'Filtri vari',
        'SALUTATION' => 'Titolo',
        'BIRTH_DATE' => 'Data di nascita',
        'LEAD_SOURCES' => 'Fonte di piombo',
        'RC_POLICY' => 'Zusatzgeschäfte',
        'PROMO' => 'Promozione effettuata',
        'DUPLICATE_CONTACT' => 'Duplicati',
        'DUPLICATE_CONTACT_EMAIL' => 'Doppio via e-mail',
        'NOT_CORRECT_ADDRESS' => 'Indirizzo non corretto',
        'CONTACT_POLICY_1' => 'Con 1 polizza',
        'CONTACT_POLICY_2' => 'Con 2 polizze',
        'CONTACT_POLICY_3' => 'Con 3 polizze',
        'CONTACT_POLICY_4_PLUS' => 'Con 4+ polizze',
        'ACCEPTED_CONTACTS_WITH_NO_POLICY' => 'contatto con la polizza 0',
        'ACCEPTED_CONTACTS_WITH_NO_LINKED_USER' => 'controlla i dati di accesso',
    ],
    'STATUS_CHANGE_SUCCESS' => 'Lo stato dei contatti è stato modificato con successo.',
    'STATUS_CHANGE_FAIL' => 'Purtroppo, lo stato dei contatti non è stato modificato, riprovare.',
    'DELETE_SUCCESS' => 'Cliente(i) cancellato(i)!',
    'ERROR_DELETE_SELECTED_CONTACT' => "Questo contatto ha pagato il pagamento(i) in modo da non poterlo cancellare",
    'ERROR_DELETE_SELECTED_CONTACTS' => "I contatti :info_1 e :info_2 non possono essere cancellati perché esistono pagamenti pagati",
    'ERROR_DELETE_SELECTED_CONTACTS_ONE' => "Il contatto :info_1 non può essere cancellato perché ha effettuato il pagamento(i)",
    'offer' => [
        'FILE_NAME' => 'offerta',
        'CREATE_SUCCESS' => 'Offerta creata con successo!',
        'CREATE_FAILURE' => 'La creazione dell\'offerta non è riuscita!',
        'SEND_SUCCESS' => 'Offerte erfolgreich per E-Mail gesendet',
        'SEND_FAILURE' => 'Offerte konnte nicht gesendet werden, da keine E-Mail Adresse erfasst wurde'
    ]
];