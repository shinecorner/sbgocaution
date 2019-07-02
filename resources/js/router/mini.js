import MiniSidebarLayout from 'Container/MiniSidebarLayout'
import AppConfig from "Constants/AppConfig";

const ContactList = () => import('Views/contacts/List');
const BrokerList = () => import('Views/brokers/List');
const SettingPage = () => import('Views/settings/SettingPage');
const PrivateLandLordList = () => import('Views/privatelandlords/List');
const TemplatePage = () => import('Views/templates/List')
const RoleList = () => import('Views/roles/List');
const UserList = () => import('Views/users/List');
const HouseOwnerList = () => import('Views/HouseOwner/List');

export default {
   path: '/mini',
   component: MiniSidebarLayout,
   redirect: '/mini/contacts',
   children: [
      {
        path: '/mini/contacts',
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
           path: '/mini/brokers',
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
           path: '/mini/privatelandlords',
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
        path: '/mini/settings',
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
        path: '/mini/roles',
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
        path: '/mini/users',
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
           path: '/mini/templates',
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
           path: '/mini/houseowners',
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
