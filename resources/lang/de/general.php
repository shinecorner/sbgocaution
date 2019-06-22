<?php
return [
    'CRM' => 'CRM',
    'NAME' => 'Name',
    'ADDRESS' => 'Adresse',
    'STATUS' => 'Status',    
    'MR' => 'Herr',
    'MRS' => 'Frau',
    'COMPANY' => 'Firma',
    'FAMILY' => 'Familie',
    'EMAIL' => 'E-mail',
    'CRM_TITLE' => 'goCaution AG',
    'SUBMIT' => 'Absenden',
    'CLEAR' => 'Löschen',
    'RESET' => 'zurücksetzen',
    'EDIT' => 'Öffnen',
    'POLICIES' => 'Policen',
    'SUCCESS' => 'Erfolg',
    'ERROR' => 'Fehler',
    'SAVE_SUCCESSFULLY' => 'Daten erfolgreich gespeichert',
    'INVOICES' => 'Rechnungen',
    'language' => [
        'DE' => 'Deutsch',
        'FR' => 'Französisch',
        'IT' => 'Italienisch',
        'EN' => 'English',
    ],
    'CONTACT_CW' => 'CW',
    'ANDERE' => "Andere",
    'CHF' => 'CHF',
    'DATA_LOADING' => 'Bitte warten Sie, während wir Daten laden...',
    'YES' => "Ja",
    'NO' => "Nein",
    'AUTH_LOGIN_SUCCESS' => 'Erfolgreich angemeldet.',
    'AUTH_LOGIN_FAIL' => 'Die Anmeldung ist fehlgeschlagen.',
    'CONFIG_SUCCESS' => 'Konfiguration erfolgreich aktualisiert!',
    'filter' => [
        'TYPE_TO_SEARCH' => 'Tippe um zu suchen...',
        'SELECT_STATUS' => 'Status wählen',
        'SELECT_PRODUCTTYPE' => 'Kundentyp wählen',
        'CREATE_FROM' => 'Erstellt vom',
        'CREATE_TO' => 'Erstellt bis',
        'LANGUAGE' => 'Sprache',
        'SEARCH' => 'Suchen',
        'RESET' => 'Leeren',        
        'NOT_SELECTED_OPTION' => 'Nicht ausgewählt'
    ],
    'ROWS' => 'Einträge',
    'PDF_MR' => 'Sehr geehrter Herr {nachname}',
    'PDF_MRS' => 'Sehr geehrte Frau {nachname}',
    'PDF_COMPANY' => 'Sehr geehrte Damen und Herren',
    'UNAUTHORIZED' => 'Der Benutzer hat nicht die richtigen Berechtigungen.',
    'NO_MORE_ENTRIES' => 'Keine weiteren Einträge vorhanden...',
    'role' => [
        'CREATE_SUCCESS' => 'Die Rolle wurde erstellt!',
        'CREATE_FAILURE' => 'Es ist nicht möglich, eine Rolle zu erstellen!',
        'UPDATE_SUCCESS' => 'Die Rolle wurde aktualisiert!',
        'UPDATE_FAILURE' => 'Die Rolle kann nicht aktualisiert werden!',
        'DELETE_SUCCESS' => 'Die Rolle wurde gelöscht!',
        'DELETE_FAILURE' => 'Die Rolle kann nicht gelöscht werden!',
        'ASSIGNMENT_SUCCESS' => 'Die Rolle wurde zugewiesen!',
        'ASSIGNMENT_FAILURE' => 'Es ist nicht möglich, eine Rolle zuzuweisen!',
    ],
    'permission' => [
        'CREATE_SUCCESS' => 'Die Berechtigung wurde erstellt!',
        'CREATE_FAILURE' => 'Berechtigung kann nicht erstellt werden!',
        'UPDATE_SUCCESS' => 'Die Berechtigung wurde aktualisiert!',
        'UPDATE_FAILURE' => 'Die Berechtigung kann nicht aktualisiert werden!',
        'DELETE_SUCCESS' => 'Die Berechtigung wurde gelöscht!',
        'DELETE_FAILURE' => 'Die Berechtigung zum Löschen kann nicht gelöscht werden!',
        'ASSIGNMENT_SUCCESS' => 'Die Berechtigung wurde erteilt!',
        'ASSIGNMENT_FAILURE' => 'Berechtigung kann nicht vergeben werden!',
    ],
    'user' => [
        'CREATE_SUCCESS' => 'Benutzer wurde angelegt!',
        'CREATE_FAILURE' => 'Benutzer kann nicht angelegt werden!',
        'UPDATE_SUCCESS' => 'Der Benutzer wurde aktualisiert!',
        'UPDATE_FAILURE' => 'Es ist nicht möglich, den Benutzer zu aktualisieren!',
    ],
    'template' => [
        'CREATE_SUCCESS' => 'Die Vorlage wurde erstellt!',
        'CREATE_FAILURE' => 'Vorlage kann nicht erstellt werden!',
        'UPDATE_SUCCESS' => 'Die Vorlage wurde aktualisiert!',
        'UPDATE_FAILURE' => 'Die Vorlage kann nicht aktualisiert werden!',
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
        'SUBJECT' => "Offerte für eine goCaution-Mietkautionsbürgschaft",
        'INTRO' => "Vielen Dank für Ihr Interesse an unserer Dienstleistung.<br /><br />Wir haben Ihren Jahresbeitrag anhand des angegebenen Kautionsbetrages berechnet und senden Ihnen eine Offerte für die goCaution® Mietkaution für Privaträume zu.<br /><br />{offer_table}<br /><br />Um Ihre Mietkautionsbürgschaft zu eröffnen stehen Ihnen zwei Möglichkeiten zur Verfügung:<ul><li>Papierlos mittels Online-Formular abschliessen</li><li>Handantrag ausfüllen und per E-Mail oder Post einsenden</li></ul>",
        'VAR_ONLINE' => "Um die Mietkautionsbürgschaft bequem online abzuschliessen, können Sie mit Klick auf den unten stehenden Button zum Online-Registrierungsformular gelangen. Die Registrierung nimmt nur wenige Minuten in Anspruch und es müssen keine Dokumente eingereicht werden. Gehen Sie das Formular Schritt für Schritt durch und stellen Sie sicher, dass die Angaben zum Mietverhältnis korrekt erfasst sind.",
        'ONLINE_LINK' => '<p class="text-center" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; text-align: left;"><a style="color:#8DBF43; text-size-adjust: 100%; font-weight: normal; text-decoration: none; border: 2px solid #8DBF43; border-radius: 30px; cursor: pointer; display: inline-block; font-size: 13px; padding: 10px 10px; text-align: center; moz-border-radius: 30px;   khtml-border-radius: 30px;  o-border-radius: 30px;   webkit-border-radius: 30px; ms-border-radius: 30px;" href="https://www.gocaution.ch/de/privatkunden/online-abschliessen">Zum Online-Formular gehen</a></p>',
        'VAR_EMAILPOST' => "Um die Mietkautionsbürgschaft auf herkömmlichen Weg abzuschliessen, können Sie uns das angefügte Antragsformular vollständig ausgefüllt und unterschrieben per E-Mail an info@gocaution.ch oder per Post an goCaution AG, Freiburgstrasse 574, 3172 Niederwangen einsenden.<br /><br />Im Anhang finden Sie folgende Unterlagen im PDF-Format:<ul><li>unsere Offerte</li><li>das Antragsformular</li><li>unseren Produktflyer</li></ul>",
        'PAYMENT_INFO' => "Nach erfolgter Anmeldung und Annahme Ihres Antrages senden wir Ihnen die Rechnung zur Zahlung der erste Jahresprämie zu, welche notwendig ist, um Ihre Police zu aktivieren. Nach Zahlungseingang der Prämie senden wir die originale Bürgschaftsurkunde auf dem Postweg an Ihren Vermieter. Mit dieser Urkunde garantieren wir Ihrem Vermieter die geforderte Mietkaution. Sie erhalten ebenfalls eine Kopie der Bürgschaftsurkunde im PDF-Format per E-Mail für Ihre Unterlagen.",
        'HELP' => "Wir hoffen, wir konnten Ihnen mit diesen Informationen vorerst weiterhelfen und stehen Ihnen gerne via E-Mail oder Telefon für weitere Beratung zur Verfügung."
    ],
    'REGARDS' => "Freundliche Grüsse<br />Ihr goCaution-Team",
    'NEW' => 'Neu',
    'MERGE' => 'Zusammenführen',
    'DELETE' => 'Löschen',
    
];
