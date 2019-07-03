<template>
    <v-autocomplete :items="selecttypes"
              outline
              hide-details
              v-model="selecttype"
              :label="$t('template.filter.SELECT_TYPE')"
              :no-data-text="$t('general.NO_RESULTS_TEXT_DROPDOWN')">
    </v-autocomplete>
</template>
<script>
    export default{
        data(){
            return {
                selecttypes:[
                    {text: this.$t('template.filter.PDF'), value: 'pdf'},
                    {text: this.$t('template.filter.EMAIL'), value: 'email'},
                ]
            }
        },
        computed:{
            selecttype: {
                get () {
                    if(this.$store.getters.inputItems.hasOwnProperty('type')){
                        return this.$store.getters.inputItems.type;
                    }
                    else{
                        return '';
                    }
                },
                set (value) {
                    this.$store.dispatch("addInputItem", {fieldname: 'type', fieldvalue: value});
                }
            }
        },
    }
</script>
