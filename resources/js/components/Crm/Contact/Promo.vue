<template>
    <v-select 
        :items="promo_option"
        :label="label"
        v-model="promo_success"
    >
    </v-select>
</template>

<script>
export default{
    props: ['label'],
    data() {
        return {
            promo_option:[
                {text: this.$t('general.YES'), value: '1'},
                {text: this.$t('general.NO'), value: '0'},
            ]  
        }
    },
    computed:{        
        promo_success: {
            get () {
                if(this.$store.getters.inputItems.hasOwnProperty('promo_success')){
                    return this.$store.getters.inputItems.promo_success;
                }
                else{
                    return '';
                }
            },
            set (value) {
              this.$store.dispatch("addInputItem", {fieldname: 'promo_success', fieldvalue: value});
            }
        }
    },
};
</script>
