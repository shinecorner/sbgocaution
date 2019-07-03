<template>
    <v-autocomplete :items="kantons"
              outline
              hide-details
              v-model="kanton"
              :label="$t('privatelandlord.filter.KANTON')"
              :no-data-text="$t('general.NO_RESULTS_TEXT_DROPDOWN')"
    >
    </v-autocomplete>
</template>

<script>
    export default{
        computed:{
            kantons: function(){
                let kanton = [];
                let that = this;
                if(this.$store.getters.serverHelpers.privatelandlord_kantons){
                    _.forOwn(this.$store.getters.serverHelpers.privatelandlord_kantons, function(title, key) {
                        kanton.push({'value': title, 'text': title})
                    });
                }
                return kanton;
            },
            kanton: {
                get () {
                    if(this.$store.getters.inputItems.hasOwnProperty('state')){
                        return this.$store.getters.inputItems.state;
                    }
                    else{
                        return '';
                    }
                },
                set (value) {
                    this.$store.dispatch("addInputItem", {fieldname: 'state', fieldvalue: value});
                }
            }
        }
    }
</script>
