<?php
return [
    'CRM' => 'CRM',
    'NAME' => 'Nom',
    'ADDRESS' => 'Adresse',
    'STATUS' => 'Statut',
    'MR' => 'Monsieur',
    'MRS' => 'Madame',
    'COMPANY' => 'Société',
    'FAMILY' => 'Famille',
    'EMAIL' => 'E-mail',
    'CRM_TITLE' => 'goCaution AG',
    'SUBMIT' => 'Soumettre',
    'CLEAR' => 'Clair',
    'RESET' => 'réinitialiser',
    'EDIT' => 'Éditer',
    'POLICIES' => 'Polices',
    'SUCCESS' => 'Succès',
    'ERROR' => 'Erreur',
    'SAVE_SUCCESSFULLY' => 'Données sauvegardées avec succès',
    'INVOICES' => 'Factures',
    'PUBLISHED' => 'Publié',
    'UNPUBLISHED' => 'Non publié',
    'language' => [
        'DE' => 'Deutsch',
        'FR' => 'Französisch',
        'IT' => 'Italienisch',
        'EN' => 'English'
    ],
    'CONTACT_CW' => 'CW',
    'ANDERE' => "Andere",
    'CHF' => 'CHF',
    'DATA_LOADING' => 'Veuillez patienter, nous chargeons les données...',
    'YES' => "Oui",
    'NO' => "Non",
    'AUTH_LOGIN_SUCCESS' => 'Connecté avec succès.',
    'AUTH_LOGIN_FAIL' => 'La connexion a échoué.',
    'CONFIG_SUCCESS' => 'Config mis à jour avec succès !',
    'filter' => [
        'TYPE_TO_SEARCH' => 'type de recherche...',
        'SELECT_STATUS' => 'Choisir le statut',
        'SELECT_PRODUCTTYPE' => 'Choisir le type de client',
        'CREATE_FROM' => 'Créer de',
        'CREATE_TO' => 'Créer jusqu\'à',
        'LANGUAGE' => 'Langue',
        'SEARCH' => 'Chercher',
        'RESET' => 'Vider',
        'NOT_SELECTED_OPTION' => 'Non sélectionné',
        'CURRENT_POLICIES' => 'Politiques actuelles'
    ],
    'ROWS' => 'Rangs',
    'PDF_MR' => 'Cher Monsieur {nachname}',
    'PDF_MRS' => 'Chère femme {nachname}',
    'PDF_COMPANY' => 'Mesdames et Messieurs, Mesdames et Messieurs',
    'UNAUTHORIZED' => 'L\'utilisateur n\'a pas les bonnes permissions.',
    'NO_MORE_ENTRIES' => "Plus d'entrées à afficher",
    'role' => [
        'CREATE_SUCCESS' => 'Le rôle a été créé !',
        'CREATE_FAILURE' => 'Incapable de créer un rôle !',
        'UPDATE_SUCCESS' => 'Le rôle a été mis à jour !',
        'UPDATE_FAILURE' => 'Impossible de mettre à jour le rôle !',
        'DELETE_SUCCESS' => 'Le rôle a été supprimé !',
        'DELETE_FAILURE' => 'Impossible de supprimer le rôle !',
        'ASSIGNMENT_SUCCESS' => 'Le rôle a été assigné !',
        'ASSIGNMENT_FAILURE' => 'Impossible d\'assigner un rôle !',
    ],
    'permission' => [
        'CREATE_SUCCESS' => 'La permission a été créée !',
        'CREATE_FAILURE' => 'Impossible de créer une permission !',
        'UPDATE_SUCCESS' => 'La permission a été mise à jour !',
        'UPDATE_FAILURE' => 'Impossible de mettre à jour la permission !',
        'DELETE_SUCCESS' => 'L\'autorisation a été supprimée !',
        'DELETE_FAILURE' => 'Impossible de supprimer la permission !',
        'ASSIGNMENT_SUCCESS' => 'L\'autorisation a été accordée !',
        'ASSIGNMENT_FAILURE' => 'Impossible d\'assigner une permission !',
    ],
    'user' => [
        'CREATE_SUCCESS' => 'L\'utilisateur a été créé !',
        'CREATE_FAILURE' => 'incapable de créer un utilisateur !',
        'UPDATE_SUCCESS' => 'L\'utilisateur a été mis à jour !',
        'UPDATE_FAILURE' => 'Impossible de mettre à jour l\'utilisateur !',
    ],
    'template' => [
        'CREATE_SUCCESS' => 'Le modèle a été créé !',
        'CREATE_FAILURE' => 'incapable de créer un modèle !',
        'UPDATE_SUCCESS' => 'Le modèle a été mis à jour !',
        'UPDATE_FAILURE' => 'Impossible de mettre à jour le modèle !',
    ],
    'base_email' => [
        'LOGO' => '<a href="https://login.gocaution.ch/de"><img src="https://www.gocaution.ch/images/email/logo_de.png" alt="logo gocaution" width="170" height="53" border="0"></a>',
        'COPYRIGHT' => "Copyright © 2019 goCaution AG. Alle Rechte vorbehalten.",
        'COMPANY' => "<b>goCaution AG</b>",
        'COMPANY_ADDRESS' => "Freiburgstrasse 574",
        'COMPANY_ZIP_CITY' => "3172 Niederwangen",
        'HOTLINE' => "Kostenlose Hotline: 0800 461 461",
        'MAIL' => 'E-Mail: <a href="mailto:info@gocaution.ch" style="color:#ffffff; text-decoration:none;">info@gocaution.ch</a>',
        'MAILTEXT5' => "Mo. bis Fr. von 08:30 bis 17:30 Uhr",
        'OFFER_EMAIL_PREVIEW_TEXT' => "<span style='display:none;visibility:hidden;mso-hide:all;font-size:1px;color:#ffffff;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;'>Anbei erhalten Sie die angeforderte Offerte für eine Mietkautionsbürgschaft von goCaution.</span>",
    ],
    'offer_email' => [
        'SUBJECT' => "Offre pour une caution de loyer",
        'INTRO' => "Nous vous remercions de l'intérêt que vous portez à notre service.<br /><br />Nous avons calculé votre prime annuelle sur la base du montant de cautionnement indiqué et vous soumettons une offre pour une caution de loyer à usage privé (bail d’habitation).<br /><br />{offer_table}<br /><br />Vous avez deux options pour conclure votre caution de loyer: <br /><br /><ul><li>Conclusion sans documents en utilisant le formulaire en ligne</li><li>Remplir le formulaire de demande et l'envoyer par courriel ou par la poste</li></ul>",
        'VAR_ONLINE' => "Pour conclure la caution de loyer en ligne, vous pouvez cliquer sur le bouton ci-dessous pour accéder au formulaire d'inscription. L'inscription ne prend que quelques minutes et aucun document ne doit être fourni. Remplissez le formulaire étape par étape et assurez-vous que les détails de la location sont entrés correctement.",
        'ONLINE_LINK' => '<p class="text-center" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; text-align: left;"><a style="color:#8DBF43;text-size-adjust: 100%; font-weight: normal; text-decoration: none; border: 3px solid #8DBF43; border-radius: 30px; cursor: pointer; display: inline-block; font-size: 15px; padding: 10px 30px; text-align: center; moz-border-radius: 30px;   khtml-border-radius: 30px;  o-border-radius: 30px;   webkit-border-radius: 30px; ms-border-radius: 30px;" href="http://www.gocaution.ch/fr/particuliers/caution-de-loyer/inscription-immediate">Inscription en ligne</a></p>',
        'VAR_EMAILPOST' => "Afin de conclure la caution de loyer par des moyens conventionnels, vous pouvez nous envoyer le formulaire de demande ci-joint dûment rempli et signé par e-mail à info@gocaution.ch ou par courrier à goCaution AG, Freiburgstrasse 574, 3172 Niederwangen.<br /><br />Vous trouverez en annexe les documents suivants au format PDF : <br /><br /></ul><li>notre offre</li><li>le formulaire de proposition pour effectuer la demande</li><li>notre brochure de produit</li>",
        'PAYMENT_INFO' => "Une fois votre inscription terminée, nous vous ferons parvenir une facture pour le paiement de la première prime annuelle, qui est nécessaire pour activer votre police. Après réception du paiement de la prime, nous enverrons l'original du certificat à votre bailleur par la poste. Avec ce certificat, nous garantissons à votre bailleur la garantie de loyer requis. Vous recevrez également une copie du certificat de garantie en format PDF par e-mail pour vos dossiers.",
        'HELP' => "Nous espérons avoir été en mesure de vous aider avec cette information et sommes à votre disposition pour de plus amples conseils par e-mail ou par téléphone.",
        'PRODUCT' => "Produit",
        'PRODUCT_NAME' => "goCaution® Bail d'habitation",
        'DEPOSIT' => "Montant du dépôt",
        'PREMIUM_PERCENT' => "Taux de prime",
        'TOTAL' => "Total",
        'TAX' => "Droit de timbre de 5%"
    ],
    'REGARDS' => "Nos salutations les meilleures,<br />Votre équipe goCaution",
    'NEW' => 'Nouveau',
    'MERGE' => 'Fusion de clients',
    'DELETE' => 'Supprimer',
    'LANGUAGE_CHANGE_SUCCESS' => 'La langue a changé avec succès.',
    'ROWS' => 'Rangées',
    'MORE_FILTER' => 'Plus de filtre',
    'ENABLED' => 'Actif',
    'ACTIVATED' => 'Activé',
    'SELECT_STATUS' => 'Choisir le statut',
    'NO_RESULTS_TEXT_DROPDOWN' => 'Aucun résultat trouvé !',
    'SAVE_AND_CLOSE' => 'Enregistrer & Fermer',
    'NO_SELECT_ITEM' => 'Veuillez d\'abord effectuer une sélection dans la liste'
];
