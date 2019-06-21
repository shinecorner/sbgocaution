<template>
    <v-text-field         
        outline                                                
        hide-details
        :label="$t('general.filter.TYPE_TO_SEARCH')"
        :height="20"
        v-model="keyword_search"
    ></v-text-field>
</template>

<script>
export default{
    data() {
        return {}
    },
    computed: {
        keyword_search: {
            get () {
                if(this.$store.getters.inputItems.hasOwnProperty('keyword_search')){
                    return this.$store.getters.inputItems.keyword_search;
                }
                else{
                    return '';
                }
            },
            set (value) {
              this.$store.dispatch("addInputItem", {fieldname: 'keyword_search', fieldvalue: value});
            }
        }
    }
};
</script>