import BoxedLayout from 'Container/BoxedV2';
import AppConfig from "Constants/AppConfig";

const ContactList = () => import('Views/contacts/List');
const BrokerList = () => import('Views/brokers/List');
const SettingPage = () => import('Views/settings/SettingPage');
const PrivateLandLordList = () => import('Views/privatelandlords/List');
const TemplatePage = () => import('Views/templates/List')
const RoleList = () => import('Views/roles/List');

export default {
   path: '/boxed-v2',
   component: BoxedLayout,
   redirect: '/boxed-v2/contacts',
   children: [
      {
        path: '/boxed-v2/contacts',
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
           path: '/boxed-v2/brokers',
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
           path: '/boxed-v2/privatelandlords',
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
        path: '/boxed-v2/settings',
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
        path: '/boxed-v2/roles',
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
           path: '/boxed-v2/templates',
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
