import Full from 'Container/Full'
import AppConfig from "Constants/AppConfig";

const ContactList = () => import('Views/contacts/List');
const SettingPage = () => import('Views/settings/SettingPage');
const DemoPage = () => import('Views/demo/DemoPage');

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
        path: '/demo',
        component: DemoPage,
        meta: {
            requiresAuth: true,
            title: 'Demo',
            breadcrumb: [
              {
                breadcrumbInactive: 'CRM'
              },
              {
                breadcrumbActive: 'Demo'
              }
            ]
        }
      }
   ]
}
