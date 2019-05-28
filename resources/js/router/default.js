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
            title: 'message.contact.CONTACTS',
             breadcrumb: [
              {
                breadcrumbInactive: 'message.contact.CRM'
              },
              {
                breadcrumbActive: 'message.contact.CONTACTS'
              }
            ]
        }
      },
      {
        path: '/settings',
        component: SettingPage,
        meta: {
            requiresAuth: true,
            title: 'message.setting.OPTIONS',
            breadcrumb: [
              {
                breadcrumbInactive: 'message.contact.CRM'
              },
              {
                breadcrumbActive: 'message.setting.OPTIONS'
              }
            ]
        }
      }
   ]
}
