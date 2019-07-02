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
            action: 'zmdi-account',
            title: 'privatelandlord.PRIVATE_LANDLORDS',
            active: false,
            label: 'privatelandlord',
            path: '/privatelandlords',
            items: null,
            exact: true
        },
        {
            action: 'zmdi-account',
            title: 'houseowner.HOUSEOWNERS',
            active: false,
            label: 'houseowners',
            path: '/houseowners',
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
        },
        {
            action: 'zmdi-format-list-bulleted',
            title: 'template.TEMPLATES',
            active: false,
            label: 'templates',
            path: '/templates',
            items: null,
            exact: true
        }
    ]
}
