<template>
    <v-autocomplete :items="sections"
              outline
              hide-details
              v-model="section"
              :label="$t('template.SECTION')">
    </v-autocomplete>
</template>
<script>
    export default{
        data(){
            return {}
        },
        computed:{
            sections: function(){
                let section = [];
                if(this.$store.getters.serverHelpers.sections){
                    _.forOwn(this.$store.getters.serverHelpers.sections, function(title, key) {
                        section.push({'value': title, 'text': title})
                    });
                }
                return section;
            },
            section: {
                get () {
                    if(this.$store.getters.inputItems.hasOwnProperty('section')){
                        return this.$store.getters.inputItems.section;
                    }
                    else{
                        return '';
                    }
                },
                set (value) {
                    this.$store.dispatch("addInputItem", {fieldname: 'section', fieldvalue: value});
                }
            }
        },
    }
</script>
