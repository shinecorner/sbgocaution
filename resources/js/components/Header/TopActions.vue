<template>
    <div v-if="route.path == '/contacts'">
        <contact-list-action></contact-list-action>
    </div>
    <div v-else-if="route.path == '/brokers'">
        <broker-list-action></broker-list-action>
    </div>
    <div v-else-if="route.path == '/privatelandlords'">
        <privatelandlord-list-action></privatelandlord-list-action>
    </div>
</template>
<script>
    import { mapState  } from "vuex";
    const ContactListAction = () => import('Views/contacts/ListAction');
    const BrokerListAction = () => import('Views/brokers/ListAction');
    const PrivatelandlordListAction = () => import('Views/privatelandlords/ListAction');

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
            ContactListAction,
            BrokerListAction,
            PrivatelandlordListAction
        }
    }
</script>
