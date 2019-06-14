<template>
    <v-select :items="contactstatus"  
        v-model="status"
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
                    c_status.push({'value': key, 'text': that.$i18n.t(title)})
                });            
            }        
            return c_status;
        },
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
    }
}
</script>