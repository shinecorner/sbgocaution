<template>
    <v-select 
        :items="promo_filter_option"
        :label="label"
    >
    </v-select>
</template>

<script>
export default{
    props: ['label'],
    data() {
        return {
            promo_filter_option:[
                {text: this.$t('general.YES'), value: '1'},
                {text: this.$t('general.NO'), value: '0'},
            ]  
        }
    }
};
</script>
