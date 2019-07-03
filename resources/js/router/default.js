import Full from 'Container/Full'
import AppConfig from "Constants/AppConfig";

const ContactList = () => import('Views/contacts/List');
const BrokerList = () => import('Views/brokers/List');
const SocketDemo = () => import('Views/contacts/ListSocket');
const SettingPage = () => import('Views/settings/SettingPage');
const PrivateLandLordList = () => import('Views/privatelandlords/List');
const TemplatePage = () => import('Views/templates/List')
const RoleList = () => import('Views/roles/List');
const RoleAddEdit = () => import('Views/roles/AddEdit');
const UserAddEdit = () => import('Views/users/AddEdit');
const UserList = () => import('Views/users/List');
const TemplateAddEditPage = () => import('Views/templates/AddEdit')
const HouseOwnerList = () => import('Views/HouseOwner/List');

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
        name: 'role_list',
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
        path: '/roles/:id/edit',
        name: 'role_edit',
        component: RoleAddEdit,
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
        path: '/roles/create',
        name: 'role_create',
        component: RoleAddEdit,
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
        name: 'user_list',
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
        path: '/users/:id/edit',
        name: 'user_edit',
        component: UserAddEdit,
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
           name: 'templates',
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
       },
       {
           path: '/templates/:template_id/edit',
           name:'template_edit',
           component: TemplateAddEditPage,
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
       },
       {
           path: '/templates/create',
           name:'template_create',
           component: TemplateAddEditPage,
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
       },
       {
           path: '/houseowners',
           component: HouseOwnerList,
           meta: {
               requiresAuth: true,
               title: 'houseowner.HOUSEOWNERS',
               breadcrumb: [
                   {
                       breadcrumbInactive: 'general.CRM'
                   },
                   {
                       breadcrumbActive: 'houseowner.HOUSEOWNERS'
                   }
               ]
           }
       }
   ]
}
