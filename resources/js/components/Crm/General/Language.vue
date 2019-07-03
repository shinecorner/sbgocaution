<template>
    <v-autocomplete :items="languages"
        outline
        hide-details
        :label="$t('general.filter.LANGUAGE')"
        v-model="language"
        :no-data-text="$t('general.NO_RESULTS_TEXT_DROPDOWN')"
    >
    </v-autocomplete>
</template>

<script>
import globalFunction from "Helpers/helpers";
export default{
    mixins: [globalFunction],
    data() {
        return {}
    },
    computed: {
        languages:function(){
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
