<template>
    <div class="userslist">        
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
                                    api-url="api/users"
                                    :http-fetch="userFetch"
                                    :fields="fields"           
                                    :css="css.table"
                                    :transform="transform"
                                    pagination-path="pagination" 
                                    data-path="mydata"
                                    :append-params="moreParams"    
                                    :per-page="perPage" 
                                    row-class="row-general"
                                    track-by="id"
                                    @vuetable:pagination-data="onPaginationData"
                                    @vuetable:loading="onLoading"        
                                    @vuetable:loaded="onLoaded"
                                    @vuetable:load-error="handleLoadError"
                                  >                                                                     
                                <template slot="prettycheck" slot-scope="props">
                                    <v-checkbox color="success" v-model="checkedRows" :key="'check_'+props.rowData.id" :value="props.rowData.id"></v-checkbox>
                                </template>    
                                <template slot="name" slot-scope="props">
                                    <span>{{ props.rowData.name}}</span>
                                </template> 
                                <template slot="edit" slot-scope="props">
                                    <v-tooltip top v-if="props.rowData.id">
                                            <a href="#" slot="activator">
                                                <v-avatar size="26" class="round-badge-success">
                                                    <v-icon color="white" small>zmdi zmdi-edit</v-icon>
                                                </v-avatar>
                                            </a>    
                                        <span>{{ $t('general.EDIT') }}</span>
                                    </v-tooltip>
                                </template>  
                                <template slot="enabled" slot-scope="props">
                                    <v-tooltip top v-if="props.rowData.status == '1'">
                                            <a href="#" @click="changeStatus(props.rowData.id)" slot="activator">
                                                <v-avatar size="26" class="round-badge-success">
                                                    <v-icon color="white" size="18">zmdi zmdi-check</v-icon>
                                                </v-avatar>
                                            </a>    
                                        <span>{{ $t('general.PUBLISHED') }}</span>
                                    </v-tooltip>
                                    <v-tooltip top v-else-if="props.rowData.status == '0'">
                                            <a href="#" @click="changeStatus(props.rowData.id)" slot="activator">
                                                <v-avatar size="26" class="round-badge-danger">
                                                    <v-icon color="white" size="18">zmdi zmdi-close</v-icon>
                                                </v-avatar>
                                            </a>    
                                        <span>{{ $t('general.UNPUBLISHED') }}</span>
                                    </v-tooltip>
                                </template>
                                
                                <template slot="roles" slot-scope="props">
                                    <span class="primary-text left"
                                        v-for="role in props.rowData.roles"
                                    >
                                        {{ role}}
                                    </span>
                                </template>
                                <template slot="email" slot-scope="props">
                                    <span>{{ props.rowData.email }}</span>
                                </template>
                                <template slot="last_visit_date" slot-scope="props">
                                    <span>{{ props.rowData.last_login }}</span>
                                </template>
                                <template slot="registration_date" slot-scope="props">
                                    <span>{{ props.rowData.created_at }}</span>
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
            fields: [
                {name: "prettycheck", title: '', titleClass: "chkbox_column", dataClass: "chkbox_column"},                
                {title: () => this.$i18n.t('general.NAME'), name: "name"},
                {title: "", name: "edit", dataClass: 'edit_data', titleClass: 'edit_column'},                
                {title: () => this.$i18n.t('role.ROLES'), name: "roles"},
                {title: () => this.$i18n.t('general.EMAIL'), name: "email"},
                {title: () => "", name: "enabled", dataClass: 'edit_data', titleClass: 'edit_column'},
                {title: () => this.$i18n.t('user.LAST_LOGIN'), name: "last_visit_date"},
                {title: () => this.$i18n.t('user.REGISTRATION_DATE'), name: "registration_date"},
            ],                                           
        }
     },     
     computed:{     
       
    },   
      methods: {
        userFetch(apiUrl,httpOptions){
            return api.get(apiUrl, httpOptions);
        },  
        changeStatus(id){
            let that = this;            
            this.loading = true;
            api.put('/api/users/change_status/'+id) .then(function (response) {
                if((typeof response.data.data !== "undefined") && (response.data.data.hasOwnProperty('id'))){
                    let row_id = response.data.data.id;                                        
                    that.loading = false;
                    Vue.prototype.$eventHub.$emit('fireSuccess', response.data.message); 
                }
            }).catch(function (error) {
                that.loading = false;
                console.log(error);
            });
        }
  },
    created() {        
        this.$store.dispatch("setHeaderTitle", 'user.USERS');    
    }
};
</script>
<style scoped>
.userslist >>> .v-datatable{
    table-layout: fixed;
    min-width: 1000px;
}
.userslist >>> .list-table-container table.v-table thead th:nth-child(1), .userslist >>> .list-table-container table.v-table tbody td:nth-child(1){
    width: 40px;
}
.userslist >>> .list-table-container table.v-table thead th:nth-child(2), .userslist >>> .list-table-container table.v-table tbody td:nth-child(2){
    width: 20%;
}
.userslist >>> .list-table-container table.v-table thead th:nth-child(3), .userslist >>> .list-table-container table.v-table tbody td:nth-child(3){
    width: 40px;
}
.userslist >>> .list-table-container table.v-table thead th:nth-child(4), .userslist >>> .list-table-container table.v-table tbody td:nth-child(4){
    width: 120px;
}
.userslist >>> .list-table-container table.v-table thead th:nth-child(5), .userslist >>> .list-table-container table.v-table tbody td:nth-child(5){
    width: 20%;
}
.userslist >>> .list-table-container table.v-table thead th:nth-child(6), .userslist >>> .list-table-container table.v-table tbody td:nth-child(6){
    width: 40px;
}
.userslist >>> .list-table-container table.v-table thead th:nth-child(7), .userslist >>> .list-table-container table.v-table tbody td:nth-child(7){
    width: 130px;
}
.userslist >>> .list-table-container table.v-table thead th:nth-child(8), .userslist >>> .list-table-container table.v-table tbody td:nth-child(8){
    width: 130px;
    border-right: none;
}
</style>