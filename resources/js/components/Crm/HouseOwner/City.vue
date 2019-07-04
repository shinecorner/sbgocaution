<template>
    <v-autocomplete :items="cities"
              outline
              hide-details
              v-model="city"
              :label="$t('privatelandlord.filter.CITY')"
    >
    </v-autocomplete>
</template>

<script>
    export default{
        computed:{
            cities: function(){
                let city = [];
                let that = this;
                if(this.$store.getters.serverHelpers.houseowner_cities){
                    _.forOwn(this.$store.getters.serverHelpers.houseowner_cities, function(title, key) {
                        city.push({'value': title, 'text': title})
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
