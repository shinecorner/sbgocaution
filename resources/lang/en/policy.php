<?php
return [
	'status' => [
		'WAITING' => "Waiting for processing",
		'PREDECLARED' => "Predeclared",
		'ACCEPTED' => "Accepted",
		'CANCELLATION_WITH_CLAIM_PENDING' => "Claim in progress",
		'CANCELLATION_WITHOUT_CLAIM_PENDING' => "Notice in process",
		'DISSOLVED_WITH_CLAIMS' => "Dissolved with claim",
		'DISSOLVED_WITHOUT_CLAIMS' => "Dissolved without claims",
		'DISSOLVED_IMMEDIATELY' => "Dissolved after Inscription",
		'JOINT_GUARANTEE' => "Joint surety pending",
		'REJECTED_CLIENT' => "Rejected by client",
		'PENDING_CANCEL' => "Resolution reported"
	],
        'filter' => [
            'SELECT_INVOICE_COUNT' => 'Filter by number of invoices',
            'SELECT_LANGUAGE' => '',
            'ORGANIZATION' => '',
            'SELECT_INVOICE_STATUS' => '',
            'SELECT_CONTACT_STATUS' => '',
            'QUOTE_STARTDATE_FROM' => '',
            'QUOTE_STARTDATE_TO' => '',            
            'FILTER_INSURE_ADDRESS' => '',
            'FILTER_INSURE_PLZ' => '',
            'FILTER_INSURE_ORT' => '',
            'QUOTES_WITH_ORG' => '',
            'QUOTES_FILTER_NO_EMP' => '',
            'QUOTES_FILTER_EMP_WITH_NO_MAIL' => '',
            'SHOW_QUOTES_HAVING_FINAL_INVOICE_OR_CANCEL_IN_YEAR' => '',
            'SHOW_QUOTES_WITH_DAMAGE' => '',
        ]
];