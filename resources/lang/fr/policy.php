<?php
return [
	'status' => [
		'WAITING' => "En validation",
		'PREDECLARED' => "Pre-police",
		'ACCEPTED' => "Actif",
		'CANCELLATION_WITH_CLAIM_PENDING' => "Réclamation en cours",
		'CANCELLATION_WITHOUT_CLAIM_PENDING' => "Résiliation en cours",		
		'DISSOLVED_WITH_CLAIMS' => "Dissous avec sinistre",
		'DISSOLVED_WITHOUT_CLAIMS' => "Dissous sans sinistre",
		'DISSOLVED_IMMEDIATELY' => "Dissous après l'achèvement",
		'JOINT_GUARANTEE' => "Attente cautionnement solidaire",
		'REJECTED_CLIENT' => "Annulées par les clients",
		'PENDING_CANCEL' => "Résolution/Mouvement rapportée"
	],
    'STATUS_CHANGE_SUCCESS' => 'L\'état de la police a été modifié avec succès.',
    'STATUS_CHANGE_FAIL' => 'Malheureusement, l\'état de la politique n\'a pas été modifié, réessayez.',
];