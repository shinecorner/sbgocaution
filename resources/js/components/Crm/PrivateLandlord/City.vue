<template>
    <v-select :items="privatelandlordcities"
              outline
              hide-details
              v-model="city"
              :label="$t('privatelandlord.CITY')">
    </v-select>
</template>

<script>
    export default{
        computed:{
            privatelandlordcities: function(){
                let city = [];
                let that = this;
                if(this.$store.getters.serverHelpers.privatelandlord_cities){
                    _.forOwn(this.$store.getters.serverHelpers.privatelandlord_cities, function(title, key) {
                        city.push({'value': title, 'text': that.$i18n.t(title)})
                    });
                }
                return city;
            },
            city: {
                get () {
                    if(this.$store.getters.inputItems.hasOwnProperty('city')){
                        return this.$store.getters.inputItems.city;
                    }
                    else{
                        return '';
                    }
                },
                set (value) {
                    this.$store.dispatch("addInputItem", {fieldname: 'city', fieldvalue: value});
                }
            }
        }
    }
</script>
