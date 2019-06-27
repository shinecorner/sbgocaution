<template>
    <v-select :items="policy_accepted_number"
              outline
              hide-details
              v-model="policyacceptednumber"
              :label="$i18n.t('privatelandlord.filter.POLICY_ACCEPTED_NUMBER')">
    </v-select>
</template>
<script>
    export default{
        data(){
            return {
                policy_accepted_number:[
                    {text: '0 '+ this.$i18n.t('general.filter.CURRENT_POLICIES'), value: 1},
                    {text: '1 '+ this.$i18n.t('general.filter.CURRENT_POLICIES'), value: 2},
                    {text: '1+ '+ this.$i18n.t('general.filter.CURRENT_POLICIES'), value: 10},
                    {text: '2 '+ this.$i18n.t('general.filter.CURRENT_POLICIES'), value: 3},
                    {text: '2+ '+ this.$i18n.t('general.filter.CURRENT_POLICIES'), value: 11},
                    {text: '3 '+ this.$i18n.t('general.filter.CURRENT_POLICIES'), value: 4},
                    {text: '3+ '+ this.$i18n.t('general.filter.CURRENT_POLICIES'), value: 12},
                    {text: '4 '+ this.$i18n.t('general.filter.CURRENT_POLICIES'), value: 5},
                    {text: '4+ '+ this.$i18n.t('general.filter.CURRENT_POLICIES'), value: 13},
                    {text: '5 '+ this.$i18n.t('general.filter.CURRENT_POLICIES'), value: 6},
                    {text: '5+ '+ this.$i18n.t('general.filter.CURRENT_POLICIES'), value: 14},
                    {text: '6+ '+ this.$i18n.t('general.filter.CURRENT_POLICIES'), value: 15},
                    {text: '7+ '+ this.$i18n.t('general.filter.CURRENT_POLICIES'), value: 16},
                    {text: '8+ '+ this.$i18n.t('general.filter.CURRENT_POLICIES'), value: 17},
                    {text: '9+ '+ this.$i18n.t('general.filter.CURRENT_POLICIES'), value: 18},
                    {text: '6-10 '+ this.$i18n.t('general.filter.CURRENT_POLICIES'), value: 7},
                    {text: '10+ '+ this.$i18n.t('general.filter.CURRENT_POLICIES'), value: 19},
                    {text: '11-20 '+ this.$i18n.t('general.filter.CURRENT_POLICIES'), value: 8},
                    {text: '20+ '+ this.$i18n.t('general.filter.CURRENT_POLICIES'), value: 9},
                ]
            }
        },
        computed:{
            policyacceptednumber: {
                get () {
                    if(this.$store.getters.inputItems.hasOwnProperty('accepted_policy_count')){
                        return this.$store.getters.inputItems.accepted_policy_count;
                    }
                    else{
                        return '';
                    }
                },
                set (value) {
                    this.$store.dispatch("addInputItem", {fieldname: 'accepted_policy_count', fieldvalue: value});
                }
            }
        },
    }
</script>
