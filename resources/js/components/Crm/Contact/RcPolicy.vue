<template>
    <v-select 
        :items="rc_policy_option"
        :label="label"
        v-model="rc_policy"
    >
    </v-select>
</template>

<script>
export default{
    props: ['label'],
    data() {
        return {
            rc_policy_option:[
                {text: this.$t('general.YES'), value: '1'},
                {text: this.$t('general.NO'), value: '0'},
            ]  
        }
    },
    computed:{        
        rc_policy: {
            get () {
                if(this.$store.getters.inputItems.hasOwnProperty('rc_policy')){
                    return this.$store.getters.inputItems.rc_policy;
                }
                else{
                    return '';
                }
            },
            set (value) {
              this.$store.dispatch("addInputItem", {fieldname: 'rc_policy', fieldvalue: value});
            }
        }
    },
};
</script>
