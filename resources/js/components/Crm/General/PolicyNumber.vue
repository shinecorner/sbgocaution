<template>
    <v-autocomplete :items="policy_number"
              outline
              hide-details
              v-model="policynumber"
              :label="$t('privatelandlord.filter.POLICY_NUMBER')"
              :no-data-text="$t('general.NORESULTS_TEXT')">
    </v-autocomplete>
</template>
<script>
    export default{
        data(){
            return {
                policy_number:[
                    {text: '0', value: 1},
                    {text: '1', value: 2},
                    {text: '1+', value: 10},
                    {text: '2', value: 3},
                    {text: '2+', value: 11},
                    {text: '3', value: 4},
                    {text: '3+', value: 12},
                    {text: '4', value: 5},
                    {text: '4+', value: 13},
                    {text: '5', value: 6},
                    {text: '5+', value: 14},
                    {text: '6+', value: 15},
                    {text: '7+', value: 16},
                    {text: '8+', value: 17},
                    {text: '9+', value: 18},
                    {text: '6-10', value: 7},
                    {text: '10+', value: 19},
                    {text: '11-20', value: 8},
                    {text: '20+', value: 9},
                ]
            }
        },
        computed:{
            policynumber: {
                get () {
                    if(this.$store.getters.inputItems.hasOwnProperty('policy_count')){
                        return this.$store.getters.inputItems.policy_count;
                    }
                    else{
                        return '';
                    }
                },
                set (value) {
                    this.$store.dispatch("addInputItem", {fieldname: 'policy_count', fieldvalue: value});
                }
            }
        },
    }
</script>
