import Full from 'Container/Full'
import AppConfig from "Constants/AppConfig";

const ContactList = () => import('Views/contacts/ContactList');
const SettingPage = () => import('Views/settings/SettingPage');

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
            title: 'message.crm.CONTACTS',
             breadcrumb: [
              {
                breadcrumbInactive: 'message.crm.CRM'
              },
              {
                breadcrumbActive: 'message.crm.CONTACTS'
              }
            ]
        }
      },
      {
        path: '/settings',
        component: SettingPage,
        meta: {
            requiresAuth: true,
            title: 'message.crm.OPTIONS',
            breadcrumb: [
              {
                breadcrumbInactive: 'message.crm.CRM'
              },
              {
                breadcrumbActive: 'message.crm.OPTIONS'
              }
            ]
        }
      }
   ]
}
