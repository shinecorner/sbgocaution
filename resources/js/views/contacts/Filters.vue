<template>
    <v-container search-content>
        <v-layout row wrap>
            <v-flex xs12 sm6 md4 lg2 xl2>
                <keyword-search></keyword-search>
            </v-flex>                                    
            <v-flex xs12 sm6 md4 lg2 xl2>
                <status></status>
            </v-flex>
            <v-flex xs12 sm6 md4 lg2 xl2>
                <v-select :items="miscellaneous_filter_option"                                              
                    :label="$t('contact.filter.MORE_THAN_ONE_POLICY')">
                </v-select>
            </v-flex>            
            <v-flex xs12 sm6 md4 lg2 xl2>
                <salutation></salutation>
            </v-flex>
            <v-flex xs12 sm6 md4 lg2 xl2>
                <created-from></created-from>
            </v-flex>
            <v-flex xs12 sm6 md4 lg2 xl2>
                <created-to></created-to>
            </v-flex>
            <v-flex xs12 sm6 md4 lg2 xl2>
                <birth-date></birth-date>
            </v-flex>
            <v-flex xs12 sm6 md4 lg2 xl2>
                <language></language>
            </v-flex>
            <v-flex xs12 sm6 md4 lg2 xl2>
                <lead-source></lead-source>
            </v-flex>
            <v-flex xs12 sm6 md4 lg2 xl2>
                <yes-no-dropdown :label="$t('contact.filter.PROMO')"></yes-no-dropdown>
            </v-flex>
            <v-flex xs12 sm6 md4 lg2 xl2>
                <yes-no-dropdown :label="$t('contact.filter.RC_POLICY')"></yes-no-dropdown>
            </v-flex>
            <v-flex xs12 sm6 md4 lg2 xl2>
                <v-checkbox  indigo 
                    v-model="filters.duplicate" 
                    class="filter_chkbox"
                    :label="$t('contact.filter.DUPLICATE_CONTACT')">
                </v-checkbox>    
            </v-flex>
            <v-flex xs12 sm6 md4 lg2 xl2>
                <v-checkbox  indigo 
                    v-model="filters.duplicate_email" 
                    class="filter_chkbox"
                    :label="$t('contact.filter.DUPLICATE_CONTACT_EMAIL')">
                </v-checkbox>    
            </v-flex>                                    
            <v-flex xs12 sm6 md4 lg3 xl3>
                <v-checkbox indigo 
                    v-model="filters.incorrect_address" 
                    class="filter_chkbox"
                    :label="$t('contact.filter.NOT_CORRECT_ADDRESS')">
                </v-checkbox>    
            </v-flex>
            <v-flex xs12 sm12 md3 lg1 xl1>
                <v-select class="perpage_selectbox left" v-bind:items="perPageItems"  v-model.number="perPage" menu-props="bottom" ></v-select>
            </v-flex>
            <v-flex xs12 sm12 md12 lg9 xl9 style="display: block;"> 
                <v-btn color="success left"><v-icon>search</v-icon>{{$t('general.filter.SEARCH')}}</v-btn>                                    
                <v-btn color="success left">{{$t('general.filter.RESET')}}</v-btn>                                    
                <v-btn color="download success left"><v-icon>mdi-download</v-icon></v-btn>                                        
            </v-flex>            
        </v-layout>                            
    </v-container>
</template>

<script>
import globalFunction from "Helpers/helpers";

import KeywordSearch from "Components/Crm/General/KeywordSearch";

import YesNoDropdown from "Components/Crm/General/YesNoDropdown";
import Language from "Components/Crm/General/Language";
import CreatedFrom from "Components/Crm/General/CreatedFrom";
import CreatedTo from "Components/Crm/General/CreatedTo";

import Status from "Components/Crm/Contact/Status";
import Salutation from "Components/Crm/Contact/Salutation";
import LeadSource from "Components/Crm/Contact/LeadSource";
import BirthDate from "Components/Crm/Contact/BirthDate";

export default{
    mixins: [globalFunction],
    components: {
        KeywordSearch,
        Status,
        Salutation,
        YesNoDropdown,        
        LeadSource,
        Language,
        CreatedFrom,
        CreatedTo,
        BirthDate
    },
    data() {
        return {            
            perPageItems: process.env.MIX_PER_PAGE_OPTIONS.split(',').map(Number),
            perPage: ((this.$store.getters.serverHelpers.hasOwnProperty('configs') && this.$store.getters.serverHelpers.configs['crm.items_per_page'])? parseInt(this.$store.getters.serverHelpers.configs['crm.items_per_page']) : 20),
            filters:{
                duplicate: false,
                duplicate_email: false,
                incorrect_address: false,
            },
            miscellaneous_filter_option: [
                {text: this.$t('contact.filter.CONTACT_POLICY_1'), value: 1},
                {text: this.$t('contact.filter.CONTACT_POLICY_2'), value: 2},
                {text: this.$t('contact.filter.CONTACT_POLICY_3'), value: 3},
                {text: this.$t('contact.filter.CONTACT_POLICY_4_PLUS'), value: 4},
                {text: this.$t('contact.filter.ACCEPTED_CONTACTS_WITH_NO_POLICY'), value: 0},
                {text: this.$t('contact.filter.ACCEPTED_CONTACTS_WITH_NO_LINKED_USER'), value: 5}
            ],            
        }
    },
    watch:{        
        perPage: function(newVal, oldVal){
            this.changePerPageOption(newVal);
        }
    },
    computed:{        
        contactofferactions: function(){
            if(this.$store.getters.serverHelpers.hasOwnProperty('contactPDF_statuslist')){
                return this.$store.getters.serverHelpers.contactPDF_statuslist;        
            }
            else{
                return {};
            }        
        }   
    },
    methods: {
        changePerPageOption: function(val){
            this.$emit('changePage', val);
        }        
    }
}
</script>