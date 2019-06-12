<template>
    <v-select :items="contactstatus"  
        item-text="text"
        item-value="title"
        :label="$t('general.filter.SELECT_STATUS')">
    </v-select>
</template>

<script>
export default{
    computed:{
         contactstatus: function(){
            let c_status = [];
            let that = this;        
            if(this.$store.getters.serverHelpers.statuses.hasOwnProperty('contact')){            
                _.forOwn(this.$store.getters.serverHelpers.statuses.contact, function(title, key) { 
                    c_status.push({'title': key, 'text': that.$i18n.t(title)})
                });            
            }        
            return c_status;
        }
    }
}
</script>