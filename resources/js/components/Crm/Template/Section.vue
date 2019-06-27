<template>
    <v-select :items="sections"
              outline
              hide-details
              v-model="section"
              :label="$t('template.SECTION')">
    </v-select>
</template>
<script>
    export default{
        data(){
            return {
                sections:[
                    {text: this.$t('template.filter.PDF'), value: 'Pdf'},
                    {text: this.$t('template.filter.EMAIL'), value: 'E-mail'},
                ]
            }
        },
        computed:{
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
