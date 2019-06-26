<template>
    <v-container search-content>
        <v-form ref="filterForm" @keyup.native.enter="$emit('filterData')" @submit.prevent="$emit('filterData')">
            <v-layout row wrap>            
                <v-flex xs12 sm6 md6 lg2 xl2>
                    <keyword-search></keyword-search>
                </v-flex>                                    
                <v-flex xs12 sm6 md6 lg2 xl2>
                    <status></status>
                </v-flex>
                <v-flex xs12 sm6 md6 lg2 xl2>                    
                        <v-select :items="miscellaneous_filter_option"
                            v-model="diverse"                                                        
                            outline
                            hide-details
                            :label="$t('contact.filter.MORE_THAN_ONE_POLICY')">
                        </v-select>                    
                </v-flex>
                <v-flex xs12 sm6 md6 lg2 xl2>
                    <salutation></salutation>
                </v-flex>
                <v-flex xs12 sm6 md6 lg2 xl2>
                    <language></language>
                </v-flex>
                <v-flex xs12 sm6 md6 lg2 xl2>
                    <created-from :is_reset_form="isResetForm"></created-from>
                </v-flex>
                <v-flex xs12 sm6 md6 lg2 xl2>
                    <created-to :is_reset_form="isResetForm"></created-to>
                </v-flex>
                <v-flex xs12 sm6 md6 lg2 xl2>
                    <birth-date :is_reset_form="isResetForm"></birth-date>
                </v-flex>                
                <v-flex xs12 sm6 md6 lg2 xl2>
                    <lead-source></lead-source>
                </v-flex>
                <v-flex xs12 sm6 md6 lg2 xl2>                    
                    <yes-no-dropdown name="rc_policy" :label="$t('contact.filter.RC_POLICY')"></yes-no-dropdown>
                </v-flex>
                <v-flex xs12 sm6 md6 lg2 xl2>
                    <yes-no-dropdown name="promo_success" :label="$t('contact.filter.PROMO')"></yes-no-dropdown>                    
                </v-flex>
                <v-flex xs12 sm6 md6 lg2 xl2>
                    <v-checkbox 
                        color="success"
                        v-model="duplicate"
                        input-value="duplicate"
                        class="filter_chkbox"
                        true-value="1"
                        false-value="0"
                        :label="$t('contact.filter.DUPLICATE_CONTACT')">
                    </v-checkbox>    
                </v-flex>
                <transition name="slide">
                    <v-flex v-show="showMoreFilter" class="more-filter">
                        <v-layout row wrap>                                                        
                            <v-flex shrink d-inline-block>
                                <v-checkbox  
                                    color="success"
                                    v-model="duplicate_email" 
                                    class="filter_chkbox"
                                    true-value="1"
                                    false-value="0"
                                    :label="$t('contact.filter.DUPLICATE_CONTACT_EMAIL')">
                                </v-checkbox>    
                            </v-flex>                                    
                            <v-flex shrink d-inline-block>
                                <v-checkbox  
                                    color="success"
                                    v-model="incorrect_address" 
                                    class="filter_chkbox"
                                    true-value="1"
                                    false-value="0"
                                    :label="$t('contact.filter.NOT_CORRECT_ADDRESS')">
                                </v-checkbox>    
                            </v-flex> 
                        </v-layout> 
                    </v-flex>
                </transition>
            </v-layout>   
        </v-form>
        <v-layout row wrap>
            <v-flex shrink d-inline-block>                                                 
                <v-btn type="submit" color="success left" @click.prevent="$emit('filterData')"><v-icon>search</v-icon>{{$t('general.filter.SEARCH')}}</v-btn>
                <v-btn color="success left" @click="resetData">{{$t('general.filter.RESET')}}</v-btn>
                <v-btn color="success left" @click.stop.prevent="showMoreFilter = !showMoreFilter">{{$t('general.MORE_FILTER')}}</v-btn>
                <v-btn color="success left" @click.stop.prevent>{{recordCount}}&nbsp;{{$t('general.ROWS')}}</v-btn>
                <v-btn color="download success left"><v-icon>mdi-download</v-icon></v-btn>
            </v-flex>                        
            <v-flex shrink d-inline-block>
                <v-select class="perpage_selectbox left" v-bind:items="perPageItems"  v-model.number="perPage" menu-props="bottom" ></v-select>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
import globalFunction from "Helpers/helpers";
import {TableFilter} from "Helpers/TableFilter"

import Language from "Components/Crm/General/Language";
import CreatedFrom from "Components/Crm/General/CreatedFrom";
import CreatedTo from "Components/Crm/General/CreatedTo";

import Status from "Components/Crm/Contact/Status";
import Salutation from "Components/Crm/Contact/Salutation";
import LeadSource from "Components/Crm/Contact/LeadSource";
import BirthDate from "Components/Crm/Contact/BirthDate";
import YesNoDropdown from "Components/Crm/General/YesNoDropdown";

export default{
    mixins: [globalFunction, TableFilter],    
    components: {        
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
            showMoreFilter: false,            
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
    computed:{        
        contactofferactions: function(){
            if(this.$store.getters.serverHelpers.hasOwnProperty('contactPDF_statuslist')){
                return this.$store.getters.serverHelpers.contactPDF_statuslist;        
            }
            else{
                return {};
            }        
        },
        diverse: {
            get () {
                if(this.$store.getters.inputItems.hasOwnProperty('diverse')){
                    return this.$store.getters.inputItems.diverse;
                }
                else{
                    return '';
                }
            },
            set (value) {
              this.$store.dispatch("addInputItem", {fieldname: 'diverse', fieldvalue: value});
            }
        },
        duplicate: {
            get () {
                if(this.$store.getters.inputItems.hasOwnProperty('duplicate')){
                    return this.$store.getters.inputItems.duplicate;
                }
                else{
                    return '0';
                }
            },
            set (value) {                
                if(value === '0'){                    
                    this.$store.dispatch("deleteInputItem", {fieldname: 'duplicate'});
                }
                else{
                    this.$store.dispatch("addInputItem", {fieldname: 'duplicate', fieldvalue: value});
                }
            }
        },
        duplicate_email: {
            get () {
                if(this.$store.getters.inputItems.hasOwnProperty('duplicate_email')){
                    return this.$store.getters.inputItems.duplicate_email;
                }
                else{
                    return '0';
                }
            },
            set (value) {
              if(value === '0'){
                    this.$store.dispatch("deleteInputItem", {fieldname: 'duplicate_email'});                    
                }
                else{
                    this.$store.dispatch("addInputItem", {fieldname: 'duplicate_email', fieldvalue: value});
                }
            }
        },
        incorrect_address: {
            get () {                
                if(this.$store.getters.inputItems.hasOwnProperty('incorrect_address')){
                    return this.$store.getters.inputItems.incorrect_address;
                }
                else{
                    return '0';
                }
            },
            set (value) {
              if(value === '0'){
                    this.$store.dispatch("deleteInputItem", {fieldname: 'incorrect_address'});                    
                }
                else{
                    this.$store.dispatch("addInputItem", {fieldname: 'incorrect_address', fieldvalue: value});
                }
            }
        },
    }   
}
</script>