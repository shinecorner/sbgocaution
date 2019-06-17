import BoxedLayout from 'Container/BoxedV2';
import AppConfig from "Constants/AppConfig";

const ContactList = () => import('Views/contacts/List');
const SettingPage = () => import('Views/settings/SettingPage');

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
      }
   ]
}
