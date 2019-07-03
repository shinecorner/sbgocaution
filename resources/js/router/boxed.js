import BoxedLayout from 'Container/Boxed';
import AppConfig from "Constants/AppConfig";

const ContactList = () => import('Views/contacts/List');
const BrokerList = () => import('Views/brokers/List');
const SettingPage = () => import('Views/settings/SettingPage');
const PrivateLandLordList = () => import('Views/privatelandlords/List');
const TemplatePage = () => import('Views/templates/List')
const RoleList = () => import('Views/roles/List');
const RoleAddEdit = () => import('Views/roles/AddEdit');
const UserAddEdit = () => import('Views/users/AddEdit');
const UserList = () => import('Views/users/List');

export default {
   path: '/boxed',
   component: BoxedLayout,
   redirect: '/boxed/contacts',
   children: [
      {
        path: '/boxed/contacts',
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
           path: '/boxed/brokers',
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
           path: '/boxed/privatelandlords',
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
        path: '/boxed/settings',
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
        path: '/boxed/roles',
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
        path: '/boxed/roles/:id/edit',
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
        path: '/boxed/users',
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
        path: '/boxed/users/:id/edit',
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
           path: '/boxed/templates',
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
