<template>
    <v-autocomplete :items="lead_sources"        
        outline                                                
        hide-details
        :label="$t('contact.filter.LEAD_SOURCES')"
        v-model="lead_source"
    >
    </v-autocomplete>
</template>
<script>
export default{
    data(){
        return {}
    },
    computed: {
        lead_sources: function(){
            let ls_option = [];
            let that = this;
            if(this.$store.getters.serverHelpers.hasOwnProperty('lead_sources')){            
                _.forOwn(this.$store.getters.serverHelpers.lead_sources, function(title, key) { 
                    ls_option.push({'value': key, 'text': that.$i18n.t(title)})
                });            
            }        
            return ls_option;
        },
        lead_source: {
            get () {
                if(this.$store.getters.inputItems.hasOwnProperty('lead_source')){
                    return this.$store.getters.inputItems.lead_source;
                }
                else{
                    return '';
                }
            },
            set (value) {
              this.$store.dispatch("addInputItem", {fieldname: 'lead_source', fieldvalue: value});
            }
        }
    }
}
</script>