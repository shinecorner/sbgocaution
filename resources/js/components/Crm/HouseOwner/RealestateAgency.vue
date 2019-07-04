<template>
    <v-autocomplete :items="realestate_agencies"
                    outline
                    hide-details
                    v-model="realestate_agency"
                    :label="$t('houseowner.filter.REALESTATE_COMPANY')"
    >
    </v-autocomplete>
</template>

<script>
    export default{
        computed:{
            realestate_agencies: function(){
                let realestate_agency = [];
                let that = this;
                if(this.$store.getters.serverHelpers.houseowner_realestate_agencies){
                    _.forOwn(this.$store.getters.serverHelpers.houseowner_realestate_agencies, function(title, key) {
                        realestate_agency.push({'value': key, 'text': title})
                    });
                }
                return realestate_agency;
            },
            realestate_agency: {
                get () {
                    if(this.$store.getters.inputItems.hasOwnProperty('realestate_agency')){
                        return this.$store.getters.inputItems.realestate_agency;
                    }
                    else{
                        return '';
                    }
                },
                set (value) {
                    this.$store.dispatch("addInputItem", {fieldname: 'realestate_agency', fieldvalue: value});
                }
            }
        }
    }
</script>
