// Sidebar Routers
export const menus = {
	'crm.business': [
		{
			action: 'zmdi-view-dashboard',
			title: 'message.crm.CRM',
			active: true,
			label: 'Old',
			items: [
				{ title: 'message.crm.CONTACTS', path: '/contacts', exact: true, label: 'Old' },
				{ title: 'message.crm.SETTINGS', path: '/settings', exact: true, label: 'Old' }
			]
		}				
	],	
}
