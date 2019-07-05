<template>        
    <div v-if="/^\/contacts/.test(route.path)">
        <contact-top-action></contact-top-action>
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
    <div v-else-if="/^\/templates/.test(route.path)">
        <template-list-action></template-list-action>
    </div>
    <div v-else-if="/^\/roles/.test(route.path)">
        <role-top-action></role-top-action>
    </div>
    <div v-else-if="/^\/users/.test(route.path)">
        <user-top-action></user-top-action>
    </div>
</template>
<script>
    import { mapState  } from "vuex";
    const ContactTopAction = () => import('Views/contacts/TopActions');
    const BrokerListAction = () => import('Views/brokers/ListAction');
    const PrivatelandlordListAction = () => import('Views/privatelandlords/ListAction');
    const SettingAction = () => import('Views/settings/Action');
    const RoleTopAction = () => import('Views/roles/TopActions');
    const UserTopAction = () => import('Views/users/TopActions');
    const TemplateListAction = () => import('Views/templates/Action');
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
            ContactTopAction,
            BrokerListAction,
            PrivatelandlordListAction,
            SettingAction,
            TemplateListAction,
            RoleTopAction,
            UserTopAction
        }
    }
</script>
