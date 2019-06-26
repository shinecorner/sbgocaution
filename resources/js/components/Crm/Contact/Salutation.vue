<template>
    <v-select :items="salutations"        
        outline                                                
        hide-details
        v-model="salutation"
        :label="$t('contact.filter.SALUTATION')">
    </v-select>
</template>
<script>
export default{
    data(){
        return {
            salutations:[
                {text: this.$t('general.MR'), value: 'mr'},
                {text: this.$t('general.MRS'), value: 'mrs'},
                {text: this.$t('general.COMPANY'), value: 'company'},
                {text: this.$t('general.filter.NOT_SELECTED_OPTION'), value: 'not_selected'}
            ]
        }
    },
    computed:{        
        salutation: {
            get () {
                if(this.$store.getters.inputItems.hasOwnProperty('salutation')){
                    return this.$store.getters.inputItems.salutation;
                }
                else{
                    return '';
                }
            },
            set (value) {
              this.$store.dispatch("addInputItem", {fieldname: 'salutation', fieldvalue: value});
            }
        }
    },
}
</script>