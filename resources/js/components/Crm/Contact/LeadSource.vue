<template>
    <v-select :items="lead_source_option"
        :label="$t('contact.filter.LEAD_SOURCES')">
    </v-select>
</template>
<script>
export default{
    data(){
        return {}
    },
    computed: {
        lead_source_option: function(){
            let ls_option = [];
            let that = this;
            if(this.$store.getters.serverHelpers.hasOwnProperty('lead_sources')){            
                _.forOwn(this.$store.getters.serverHelpers.lead_sources, function(title, key) { 
                    ls_option.push({'title': key, 'text': that.$i18n.t(title)})
                });            
            }        
            return ls_option;
        },
    }
}
</script>