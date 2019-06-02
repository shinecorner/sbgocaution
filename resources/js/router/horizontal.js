import HorizontalLayout from 'Container/HorizontalLayout'
import AppConfig from "Constants/AppConfig";

const ContactList = () => import('Views/contacts/ContactList');
const SettingPage = () => import('Views/settings/SettingPage');
const DemoPage = () => import('Views/demo/DemoPage');

export default {
   path: '/horizontal',
   component: HorizontalLayout,
   redirect: '/horizontal/contacts',
      children: [
      {
        path: '/horizontal/contacts',
        component: ContactList,
        meta: {
            requiresAuth: true,
            title: 'message.contact.CONTACTS',
             breadcrumb: [
              {
                breadcrumbInactive: 'message.general.CRM'
              },
              {
                breadcrumbActive: 'message.contact.CONTACTS'
              }
            ]
        }
      },
      {
        path: '/horizontal/settings',
        component: SettingPage,
        meta: {
            requiresAuth: true,
            title: 'message.setting.OPTIONS',
            breadcrumb: [
              {
                breadcrumbInactive: 'message.general.CRM'
              },
              {
                breadcrumbActive: 'message.setting.OPTIONS'
              }
            ]
        }
      },
      {
        path: '/horizontal/demo',
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
