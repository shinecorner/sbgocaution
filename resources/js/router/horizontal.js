import HorizontalLayout from 'Container/HorizontalLayout'
import AppConfig from "Constants/AppConfig";

const ContactList = () => import('Views/contacts/List');
const BrokerList = () => import('Views/brokers/List');
const SettingPage = () => import('Views/settings/SettingPage');
const PrivateLandLordList = () => import('Views/privatelandlords/List');
const RoleList = () => import('Views/roles/List');

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
          path: '/horizontal/privatelandlords',
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
      },
      {
        path: '/horizontal/roles',
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
   ]
}
