<template>
    <v-select :items="salutation_filter_option"
        :label="$t('contact.filter.SALUTATION')">
    </v-select>
</template>
<script>
export default{
    data(){
        return {
            salutation_filter_option:[
                {text: this.$t('general.MR'), value: 'mr'},
                {text: this.$t('general.MRS'), value: 'mrs'},
                {text: this.$t('general.COMPANY'), value: 'company'},
                {text: this.$t('general.filter.NOT_SELECTED_OPTION'), value: 'not_selected'}
            ]
        }
    }
}
</script>