<template>
    <v-select :items="p_salutation"
              outline
              hide-details
              v-model="salutation"
              :label="$t('contact.filter.SALUTATION')">
    </v-select>
</template>

<script>
    export default{
        computed:{
            p_salutation: function(){
                let salutation = [];
                let that = this;
                if(this.$store.getters.serverHelpers.privatelandlord_salutation){
                    _.forOwn(this.$store.getters.serverHelpers.privatelandlord_salutation, function(title, key) {
                        salutation.push({'value': key, 'text': that.$i18n.t(title)})
                    });
                }
                return salutation;
            },
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
        }
    }
</script>
