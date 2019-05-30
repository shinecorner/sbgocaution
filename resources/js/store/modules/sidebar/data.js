// Sidebar Routers
export const menus = {
    'message.general.CRM': [	
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
    'message.setting.OPTIONS':[
        {
            action: 'zmdi-wrench',
            title: 'message.setting.OPTIONS',
            active: false,
            label: 'option_item',
            path: '/settings',
            items: null,
            exact: true
        }
    ]
}
