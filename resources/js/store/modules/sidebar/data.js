// Sidebar Routers
export const menus = {
    'message.contact.CRM': [	
		{
			action: 'zmdi-accounts',
			title: 'message.contact.CONTACTS',
			active: true,
			label: 'contact',
                        path: '/contacts',
			items: null,
                        exact: true
		}			
    ],
    'message.general.OPTIONS':[
        {
            action: 'zmdi-wrench',
            title: 'message.general.OPTIONS',
            active: false,
            label: 'option_item',
            path: '/settings',
            items: null,
            exact: true
        }
    ]
}
