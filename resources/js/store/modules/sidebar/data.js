// Sidebar Routers
export const menus = {
    'message.crm.CRM': [	
		{
			action: 'zmdi-accounts',
			title: 'message.crm.CONTACTS',
			active: true,
			label: 'contact',
                        path: '/contacts',
			items: null,
                        exact: true
		}			
    ],
    'message.crm.OPTIONS':[
        {
            action: 'zmdi-wrench',
            title: 'message.crm.OPTIONS',
            active: false,
            label: 'option_item',
            path: '/settings',
            items: null,
            exact: true
        }
    ]
}
