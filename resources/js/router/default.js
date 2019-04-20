import Full from 'Container/Full'

const ContactList = () => import('Views/contacts/ContactList');


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
            title: 'message.crm.CONTACTS'            
         }
      },
   ]
}
