<template>
    <div v-if="route.path == '/contacts'">        
        <contact-list-action></contact-list-action>
    </div>
</template>
<script>
    import { mapState  } from "vuex";
    const ContactListAction = () => import('Views/contacts/ListAction');

    export default {
        props: {},
        data() { 
            return {}
        },
        computed: mapState([
            // map this.count to store.state.route
            'route'
        ]),
        methods: {},
        components: {
            ContactListAction
        }
    }
</script>