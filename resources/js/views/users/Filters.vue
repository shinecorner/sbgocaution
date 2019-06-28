<template>
    <v-container search-content>
        <v-form ref="filterForm" @keyup.native.enter="$emit('filterData')" @submit.prevent="$emit('filterData')">
            <v-layout row wrap>            
                <v-flex xs12 sm6 md6 lg3 xl3>
                    <keyword-search></keyword-search>
                </v-flex>                
                <v-flex xs12 sm6 md6 lg3 xl3>
                    <v-select :items="statuses"        
                        outline                                                
                        hide-details
                        v-model="status"
                        :label="$t('general.SELECT_STATUS')">
                    </v-select>
                </v-flex>
                <v-flex xs12 sm6 md6 lg3 xl3>
                    <v-autocomplete
                        :no-data-text="$t('general.NORESULTS_TEXT')"
                        :items="roles"        
                        outline                                                
                        hide-details
                        v-model="role"
                        :label="$t('user.SELECT_ROLE')">
                    </v-autocomplete>
                </v-flex>
            </v-layout>   
        </v-form>
        <v-layout row wrap>
            <v-flex shrink d-inline-block>                                                 
                <v-btn type="submit" color="success left" @click.prevent="$emit('filterData')"><v-icon>search</v-icon>{{$t('general.filter.SEARCH')}}</v-btn>
                <v-btn color="success left" @click="resetData">{{$t('general.filter.RESET')}}</v-btn>                
                <v-btn color="success left" @click.stop.prevent>{{recordCount}}&nbsp;{{$t('general.ROWS')}}</v-btn>                
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

export default{
    mixins: [globalFunction, TableFilter],
    data() {
        return {
            statuses:[
                {text: this.$t('general.PUBLISHED'), value: '1'},
                {text: this.$t('general.UNPUBLISHED'), value: '0'},                
            ]
        }
    },
    computed:{
        roles: function(){
            let TableFilterRoles = [];
            let that = this;        
            if(this.$store.getters.serverHelpers.hasOwnProperty('users_roles')){            
                _.forOwn(this.$store.getters.serverHelpers.users_roles, function(title, key) { 
                    TableFilterRoles.push({'value': key, 'text': title})
                });            
            }        
            return TableFilterRoles;
        },
        status: {
            get () {
                if(this.$store.getters.inputItems.hasOwnProperty('status')){
                    return this.$store.getters.inputItems.status;
                }
                else{
                    return '';
                }
            },
            set (value) {
              this.$store.dispatch("addInputItem", {fieldname: 'status', fieldvalue: value});
            }
        },
        role: {
            get () {
                if(this.$store.getters.inputItems.hasOwnProperty('role')){
                    return this.$store.getters.inputItems.role;
                }
                else{
                    return '';
                }
            },
            set (value) {
              this.$store.dispatch("addInputItem", {fieldname: 'role', fieldvalue: value});
            }
        }
    }
}
</script>