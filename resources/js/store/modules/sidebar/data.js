// Sidebar Routers
export const menus = {
	'crm.business': [
		{
			action: 'zmdi-view-dashboard',
			title: 'message.crm.CRM',
			active: true,
			label: '',
			items: [
				{ title: 'message.crm.CONTACTS', path: '/contacts', exact: true, label: 'New' },
				{ title: 'message.crm.SETTINGS', path: '/settings', exact: true, label: '' }
			]
		}				
	],	
}
