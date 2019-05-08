// Sidebar Routers
export const menus = {
	'crm.business': [
		{
			action: 'zmdi-view-dashboard',
			title: 'message.crm.CRM',
			active: true,
			label: 'Old',
			items: [
				{ title: 'message.crm.CONTACTS', path: '/contacts', exact: true, label: 'Old' }
			]
		},
		{
			action: 'zmdi-wrench',
			title: 'message.crm.OPTIONS',
			active: false,
			label: 'Old',
			items: [
				{ title: 'message.crm.OPTIONS', path: '/settings', exact: true, label: 'Old' }
			]
		}		
	],	
}
