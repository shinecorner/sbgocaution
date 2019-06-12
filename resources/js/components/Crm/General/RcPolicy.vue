<template>
    <v-select :items="rc_policy_filter_option"
        :label="$t('contact.filter.RC_POLICY')">
    </v-select>
</template>

<script>
export default{
    data() {
        return {
            rc_policy_filter_option:[
                {text: this.$t('general.YES'), value: '1'},
                {text: this.$t('general.NO'), value: '0'},
                {text: this.$t('general.filter.NOT_SELECTED_OPTION'), value: 'not_selected'}
            ],
        }
    }
};
</script>
