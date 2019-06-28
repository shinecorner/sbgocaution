<template>
    <v-select :items="selecttypes"
              outline
              hide-details
              v-model="selecttype"
              :label="$t('template.filter.SELECT_TYPE')">
    </v-select>
</template>
<script>
    export default{
        data(){
            return {
                selecttypes:[
                    {text: this.$t('template.filter.PDF'), value: 'Pdf'},
                    {text: this.$t('template.filter.EMAIL'), value: 'E-mail'},
                ]
            }
        },
        computed:{
            selecttype: {
                get () {
                    if(this.$store.getters.inputItems.hasOwnProperty('selecttype')){
                        return this.$store.getters.inputItems.selecttype;
                    }
                    else{
                        return '';
                    }
                },
                set (value) {
                    this.$store.dispatch("addInputItem", {fieldname: 'selecttype', fieldvalue: value});
                }
            }
        },
    }
</script>
