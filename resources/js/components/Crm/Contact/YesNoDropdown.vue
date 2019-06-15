<template>
    <v-select 
        :items="options"
        :label="label"
        :name="name"
        v-model="selected_option"
    >
    </v-select>
</template>

<script>
export default{
    props: ['label','name'],
    data() {
        return {
            options:[
                {text: this.$t('general.YES'), value: '1'},
                {text: this.$t('general.NO'), value: '0'},
            ]  
        }
    },
    computed:{        
        selected_option: {
            get () {
                if(this.$store.getters.inputItems.hasOwnProperty(this.name)){
                    return this.$store.getters.inputItems[this.name];
                }
                else{
                    return '';
                }
            },
            set (value) {
              this.$store.dispatch("addInputItem", {fieldname: this.name, fieldvalue: value});
            }
        }
    },
};
</script>
