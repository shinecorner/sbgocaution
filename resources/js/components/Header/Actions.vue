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
    <div v-else-if="route.path == '/settings'">
        <setting-action></setting-action>
    </div>
    <div v-else-if="route.path == '/templates'">
        <template-list-action></template-list-action>
    </div>
</template>
<script>
    import { mapState  } from "vuex";
    const ContactListAction = () => import('Views/contacts/ListAction');
    const BrokerListAction = () => import('Views/brokers/ListAction');
    const PrivatelandlordListAction = () => import('Views/privatelandlords/ListAction');
    const SettingAction = () => import('Views/settings/Action');
    const TemplateListAction = () => import('Views/templates/ListAction');
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
            PrivatelandlordListAction,
            SettingAction,
            TemplateListAction
        }
    }
</script>
