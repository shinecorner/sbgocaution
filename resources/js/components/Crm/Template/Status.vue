<template>
    <v-autocomplete :items="statuses"
                    outline
                    hide-details
                    v-model="status"
                    :label="$t('general.STATUS')"
                    :no-data-text="$t('general.NO_RESULTS_TEXT_DROPDOWN')">
    </v-autocomplete>
</template>
<script>
    export default{
        data(){
            return {
                statuses:[
                    {text: this.$t('general.PUBLISHED'), value: '1'},
                    {text: this.$t('general.UNPUBLISHED'), value: '0'},
                ]
            }
        },
        computed:{
            status: {
                get () {
                    if(this.$store.getters.inputItems.hasOwnProperty('status')){
                        return this.$store.getters.inputItems.status;
                    }
                    else{
                        return '';
                    }
                },
                set (value) {
                    this.$store.dispatch("addInputItem", {fieldname: 'status', fieldvalue: value});
                }
            }
        },
    }
</script>
