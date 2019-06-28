import Full from 'Container/Full'
import AppConfig from "Constants/AppConfig";

const ContactList = () => import('Views/contacts/List');
const BrokerList = () => import('Views/brokers/List');
const SocketDemo = () => import('Views/contacts/ListSocket');
const SettingPage = () => import('Views/settings/SettingPage');
const PrivateLandLordList = () => import('Views/privatelandlords/List');
const TemplatePage = () => import('Views/templates/List')
const RoleList = () => import('Views/roles/List');
const UserList = () => import('Views/users/List');

export default {
   path: '/',
   component: Full,
   redirect: '/contacts',
   children: [
      {
        path: '/contacts',
        component: ContactList,
        meta: {
            requiresAuth: true,
            title: 'contact.CONTACTS',
             breadcrumb: [
              {
                breadcrumbInactive: 'general.CRM'
              },
              {
                breadcrumbActive: 'contact.CONTACTS'
              }
            ]
        }
      },
       {
           path: '/brokers',
           component: BrokerList,
           meta: {
               requiresAuth: true,
               title: 'broker.BROKERS',
               breadcrumb: [
                   {
                       breadcrumbInactive: 'general.CRM'
                   },
                   {
                       breadcrumbActive: 'broker.BROKERS'
                   }
               ]
           }
       },
       {
           path: '/privatelandlords',
           component: PrivateLandLordList,
           meta: {
               requiresAuth: true,
               title: 'privatelandlord.PRIVATE_LANDLORDS',
               breadcrumb: [
                   {
                       breadcrumbInactive: 'general.CRM'
                   },
                   {
                       breadcrumbActive: 'privatelandlord.PRIVATE_LANDLORDS'
                   }
               ]
           }
       },
      {
        path: '/socket-demo',
        component: SocketDemo,
        meta: {
            requiresAuth: true,
            title: 'contact.CONTACTS',
             breadcrumb: [
              {
                breadcrumbInactive: 'general.CRM'
              },
              {
                breadcrumbActive: 'contact.CONTACTS'
              }
            ]
        }
      },
      {
        path: '/settings',
        component: SettingPage,
        meta: {
            requiresAuth: true,
            title: 'setting.OPTIONS',
            breadcrumb: [
              {
                breadcrumbInactive: 'general.CRM'
              },
              {
                breadcrumbActive: 'setting.OPTIONS'
              }
            ]
        }
      },
      {
        path: '/roles',
        component: RoleList,
        meta: {
            requiresAuth: true,
            title: 'role.ROLES',
            breadcrumb: [
              {
                breadcrumbInactive: 'general.CRM'
              },
              {
                breadcrumbActive: 'role.ROLES'
              }
            ]
        }
      },
      {
        path: '/users',
        component: UserList,
        meta: {
            requiresAuth: true,
            title: 'user.USERS',
            breadcrumb: [
              {
                breadcrumbInactive: 'general.CRM'
              },
              {
                breadcrumbActive: 'user.USERS'
              }
            ]
        }
      },
       {
           path: '/templates',
           component: TemplatePage,
           meta: {
               requiresAuth: true,
               title: 'template.TEMPLATES',
               breadcrumb: [
                   {
                       breadcrumbInactive: 'general.CRM'
                   },
                   {
                       breadcrumbActive: 'template.TEMPLATES'
                   }
               ]
           }
       }
   ]
}
