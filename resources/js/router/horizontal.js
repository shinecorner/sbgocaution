import HorizontalLayout from 'Container/HorizontalLayout'
import AppConfig from "Constants/AppConfig";

const ContactList = () => import('Views/contacts/List');
const BrokerList = () => import('Views/brokers/List');
const SettingPage = () => import('Views/settings/SettingPage');

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
              path: '/horizontal/brokers',
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
        path: '/horizontal/settings',
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
