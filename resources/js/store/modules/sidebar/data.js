// Sidebar Routers
export const menus = {
    'general.CRM': [
		{
			action: 'zmdi-accounts',
			title: 'contact.CONTACTS',
			active: true,
			label: 'contact',
            path: '/contacts',
			items: null,
            exact: true
		},
        {
            action: 'zmdi-accounts',
            title: 'broker.BROKERS',
            active: false,
            label: 'broker',
            path: '/brokers',
            items: null,
            exact: true
        },
        {
            action: 'zmdi-accounts',
            title: 'privatelandlord.PRIVATE_LANDLORDS',
            active: false,
            label: 'privatelandlord',
            path: '/privatelandlords',
            items: null,
            exact: true
        },
    ],
    'setting.OPTIONS':[
        {
            action: 'zmdi-wrench',
            title: 'setting.OPTIONS',
            active: false,
            label: 'option_item',
            path: '/settings',
            items: null,
            exact: true
        },
        {
            action: 'zmdi-group',
            title: 'role.ROLES',
            active: false,
            label: 'roles',
            path: '/roles',
            items: null,
            exact: true
        },
        {
            action: 'zmdi-accounts',
            title: 'user.USERS',
            active: false,
            label: 'users',
            path: '/users',
            items: null,
            exact: true
        }
    ]
}
