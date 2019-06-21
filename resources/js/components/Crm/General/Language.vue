<template>
    <v-select :items="language_filter_option"        
        outline                                                
        hide-details
        :label="$t('general.filter.LANGUAGE')"
        v-model="language"
    >
    </v-select>
</template>

<script>
import globalFunction from "Helpers/helpers";
export default{
    mixins: [globalFunction],
    data() {
        return {}
    },
    computed: {
        language_filter_option:function(){
            let that = this;
            let language_option = [];
            let mix_lang = process.env.MIX_LANGUAGE_OPTIONS.split(',');
            _.forEach(mix_lang, function(title, key) { 
                language_option.push({'value': title, 'text': that.tConverted('general.language.'+title)})
            }); 
            return language_option;
        },
        language: {
            get () {
                if(this.$store.getters.inputItems.hasOwnProperty('language')){
                    return this.$store.getters.inputItems.language;
                }
                else{
                    return '';
                }
            },
            set (value) {
              this.$store.dispatch("addInputItem", {fieldname: 'language', fieldvalue: value});
            }
        }
    }
};
</script>