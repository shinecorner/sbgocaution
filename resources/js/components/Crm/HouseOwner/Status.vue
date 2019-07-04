<template>
    <v-autocomplete :items="statuses"
                    outline
                    hide-details
                    v-model="status"
                    :label="$t('general.STATUS')">
    </v-autocomplete>
</template>
<script>
    export default{
     computed:{
            statuses: function() {
                let status = [];
                let that = this;
                if (this.$store.getters.serverHelpers.statuses.houseowner) {
                    _.forOwn(this.$store.getters.serverHelpers.statuses.houseowner, function (title, key) {
                        status.push({'value': key, 'text': that.$i18n.t(title)})
                    });
                }
                return status;
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
        },
    }
</script>
