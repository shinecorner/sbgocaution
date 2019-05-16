// Sidebar Routers
export const menus = {
	'crm.business': [
		{
			action: 'zmdi-view-dashboard',
			title: 'message.crm.CRM',
			active: true,
			label: 'crm',
			items: [
				{ title: 'message.crm.CONTACTS', path: '/contacts', exact: true, label: 'contact' }
			]
		},
		{
			action: 'zmdi-wrench',
			title: 'message.crm.OPTIONS',
			active: false,
			label: 'options',
			items: [
				{ title: 'message.crm.OPTIONS', path: '/settings', exact: true, label: 'option_item' }
			]
		}		
	],	
}
