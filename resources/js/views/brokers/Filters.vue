<template>
    <v-container search-content>
        <v-form ref="filterForm" @keyup.native.enter="$emit('filterData')" @submit.prevent="$emit('filterData')">
            <v-layout row wrap>            
                <v-flex xs12 sm6 md6 lg2 xl2>
                    <keyword-search></keyword-search>
                </v-flex>                                    
            </v-layout>
        </v-form>
        <v-layout row wrap>
            <v-flex shrink d-inline-block> 
                <v-btn type="submit" color="success left" @click.prevent="$emit('filterData')"><v-icon>search</v-icon>{{$t('general.filter.SEARCH')}}</v-btn>
                <v-btn color="success left" @click="resetData">{{$t('general.filter.RESET')}}</v-btn>
            </v-flex>
            <v-flex shrink d-inline-block>
                <v-select class="perpage_selectbox left" v-bind:items="perPageItems"  v-model.number="perPage" menu-props="bottom" ></v-select>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
import globalFunction from "Helpers/helpers";
import KeywordSearch from "Components/Crm/General/KeywordSearch";

export default{
    mixins: [globalFunction],
    components: {
        KeywordSearch
    },
    data() {
        return {   
            isResetForm: false,
            perPageItems: process.env.MIX_PER_PAGE_OPTIONS.split(',').map(Number),
            perPage: ((this.$store.getters.serverHelpers.hasOwnProperty('configs') && this.$store.getters.serverHelpers.configs['crm.items_per_page'])? parseInt(this.$store.getters.serverHelpers.configs['crm.items_per_page']) : 20),            
        }
    },
    watch:{        
        perPage: function(newVal, oldVal){
            this.changePerPageOption(newVal);
        }
    },
    methods: {
        changePerPageOption: function(val){
            this.$emit('changePage', val);
        },
        resetData: function(event){  
            this.$store.dispatch("clearInputItems");
            this.$refs.filterForm.reset();
            this.isResetForm = true;
            //this.perPage = ((this.$store.getters.serverHelpers.hasOwnProperty('configs') && this.$store.getters.serverHelpers.configs['crm.items_per_page'])? parseInt(this.$store.getters.serverHelpers.configs['crm.items_per_page']) : 20);
            this.$emit('resetData');
        }
    }
}
</script>
