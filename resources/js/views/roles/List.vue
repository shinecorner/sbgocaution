<template>
    <div class="rolelist">
            <app-section-loader :status="loading"></app-section-loader>
		<v-container fluid grid-list-xl py-0>                    
                    <v-layout row wrap>
                        <app-card                                
                                :fullBlock="true"
                                colClasses="xl12 lg12 md12 sm12 xs12"
                        >                            
                            <filters 
                                    @filterData="onFilterData" 
                                    @resetData="onResetFilter" 
                                    @changePage="changePageHandler"
                                    :recordCount="recordCount"
                            ></filters>
                        </app-card>
                    </v-layout>                              
                    <v-layout row wrap>
                        <app-card                                
                                :fullBlock="true"
                                colClasses="xl12 lg12 md12 sm12 xs12"
                        >                                      
                                <div class="v-table__overflow list-table-container">
				<vuetable ref="vuetable"
                                    :no-data-template="noDataMessage"
                                    api-url="api/roles"
                                    :http-fetch="roleFetch"
                                    :fields="fields"           
                                    :css="css.table"
                                    :transform="transform"
                                    pagination-path="pagination" 
                                    data-path="mydata"
                                    :append-params="moreParams"    
                                    :per-page="perPage"                                     
                                    track-by="id"
                                    row-class="row-general"
                                    @vuetable:pagination-data="onPaginationData"
                                    @vuetable:loading="onLoading"        
                                    @vuetable:loaded="onLoaded"
                                  >                                
                                <template slot="prettycheck" slot-scope="props">
                                    <v-checkbox color="success" v-model="checkedRows" :key="'check_'+props.rowData.id" :value="props.rowData.id"></v-checkbox>
                                </template>  
                                <template slot="r_title" slot-scope="props">                                                                        
                                    <span class="primary-text left ml-1">{{ props.rowData.name}}</span>
                                </template>
                                <template slot="r_edit" slot-scope="props">
                                    <v-tooltip top v-if="props.rowData.id">
                                            <router-link slot="activator" :to="{ name: 'role_edit', params: { id:  props.rowData.id}}">
                                                <v-avatar size="26" class="round-badge-success">
                                                    <v-icon color="white" small>zmdi zmdi-edit</v-icon>
                                                </v-avatar>
                                            </router-link>
                                        <span>{{ $t('general.EDIT') }}</span>
                                    </v-tooltip>
                                </template>
                                <template slot="cnt_active_users" slot-scope="props">                                                                        
                                    <v-chip small v-bind:class="[ (props.rowData.count_active_users == '0') ? disableClass : activeClass]" text-color="white">{{props.rowData.count_active_users}}</v-chip>
                                </template>
                                <template slot="cnt_inactive_users" slot-scope="props">                                                                        
                                    <v-chip small v-bind:class="[ (props.rowData.count_inactive_users == '0') ? disableClass : inactiveClass]" text-color="white">{{props.rowData.count_inactive_users}}</v-chip>
                                </template>
                            </vuetable>
                        </div>
                        <div class="layout row wrap pagination-container">
                        <v-flex sm6></v-flex>                        
                        <v-flex sm6>                            
                            <vuetable-pagination ref="pagination" 
                            :css="css.pagination"   
                              @vuetable-pagination:change-page="onChangePage"
                            ></vuetable-pagination>
                        </v-flex>
                        </div>
                    </app-card>
                </v-layout>
            </v-container>      
            <delete-confirmation  
                :show_confirm_delete="show_confirm_delete"
                :headerText="$t('general.DELETE_CONFIRM_MSG',{'name': $t('role.ROLES')})"
                :bodyText="$t('general.DELETE_CONFIRM_MSG',{'name': $t('role.ROLES')})"
                @deleteEntity="deleteEntityHandler"
                @closeConfirm="show_confirm_delete = false">
            </delete-confirmation>
            <no-item-selected-dialog 
                :show_no_item_dialog="show_no_item_dialog" 
                @closeDialog="show_no_item_dialog = false">
            </no-item-selected-dialog>
	</div>
</template>

<script>
import api from "Api";
import { Vuetable, VuetablePagination, VuetablePaginationInfo, VuetablePaginationDropdown} from 'vuetable-2';
import globalFunction from "Helpers/helpers";
import Filters from "./Filters";
import {TableData} from "Helpers/TableData";

export default {
    mixins: [globalFunction, TableData],
    components: {
        Vuetable,
        VuetablePagination,        
        VuetablePaginationInfo,
        Filters        
    },    
     data() {        
        return {   
            recordCount: 0,
            activeClass: 'badge-activeuser',
            inactiveClass: 'badge-inactiveuser',
            disableClass: 'badge-nouser',
            fields: [
                {name: "prettycheck", title: '', titleClass: "chkbox_column", dataClass: "chkbox_column"},
                {title: () => this.$i18n.t('role.TITLE'), name: "r_title"},
                {title: "", name: "r_edit", dataClass: 'edit_data'},
                {title: () => this.$i18n.t('role.ACTIVE'), name: 'cnt_active_users', dataClass: 'edit_data', titleClass: 'edit_column'},
                {title: () => this.$i18n.t('role.INACTIVE'), name: "cnt_inactive_users",dataClass: 'edit_data', titleClass: 'edit_column'},
            ],            
        }
     },     
    computed:{},   
    methods: {               
        roleFetch(apiUrl,httpOptions){
            return api.get(apiUrl, httpOptions);
        },                
        deleteEntityHandler(){
            let that = this;
            that.loading = true;
            console.log(this.checkedRows);
            /*api.delete('/api/roles/'+this.$route.params.id).then(response => {
                Vue.prototype.$eventHub.$emit('fireSuccess', response.data.message);
                that.show_confirm_delete = false;
                that.loading = false;
                that.$router.push('/roles');
            })*/            
        }
    },
    created() {        
        this.$store.dispatch("setHeaderTitle", 'role.ROLES');
        Vue.prototype.$eventHub.$on('toggleDialogRole', this.toggleDialog);
    }
};
</script>
<style scoped>
.rolelist >>> .v-datatable{
    table-layout: fixed;
    min-width: 990px;
}
.rolelist >>> .list-table-container table.v-table thead th:nth-child(1), .rolelist >>> .list-table-container table.v-table tbody td:nth-child(1){
    width: 40px;
}
.rolelist >>> .list-table-container table.v-table thead th:nth-child(2), .rolelist >>> .list-table-container table.v-table tbody td:nth-child(2){
    width: 60%;
}
.rolelist >>> .list-table-container table.v-table thead th:nth-child(3), .rolelist >>> .list-table-container table.v-table tbody td:nth-child(3){
    width: 40px;
}
.rolelist >>> .list-table-container table.v-table thead th:nth-child(4), .rolelist >>> .list-table-container table.v-table tbody td:nth-child(4){
    width: 40px;
}
.rolelist >>> .list-table-container table.v-table thead th:nth-child(5), .rolelist >>> .list-table-container table.v-table tbody td:nth-child(5){
    width: 50px;
    border-right: none;
}
</style>