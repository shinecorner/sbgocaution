<template>
    <div class="contactlist">
        <!--<page-title-bar></page-title-bar>-->
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
                                    api-url="api/contacts"
                                    :http-fetch="contactFetch"
                                    :fields="fields"           
                                    :css="css.table"
                                    :transform="transform"
                                    pagination-path="pagination" 
                                    data-path="mydata"
                                    :append-params="moreParams"    
                                    :per-page="perPage" 
                                    :row-class="onRowClass"
                                    track-by="id"
                                    @vuetable:pagination-data="onPaginationData"
                                    @vuetable:loading="onLoading"        
                                    @vuetable:loaded="onLoaded"
                                  >                                                                     
                                <template slot="prettycheck" slot-scope="props">
                                    <v-checkbox color="success" v-model="checkedRows" :key="'check_'+props.rowData.id" :value="props.rowData.id"></v-checkbox>
                                </template>  
                                <template slot="contactformate" slot-scope="props">                                  
                                  <span class="primary-text">{{ props.rowData.contact_num }}</span>                                  
                                  <span class="grey--text secondary-text fs-12 d-block">{{ props.rowData.created_at_formatted }}</span>
                                  <div class="column_icon_container">
                                    <v-tooltip top v-if="props.rowData.is_duplicate">                                        
                                        <v-icon color="orange darken-2" size="18" slot="activator">zmdi-alert-triangle</v-icon>
                                        <span>{{props.rowData.is_duplicate}}</span>
                                    </v-tooltip>
                                    <v-tooltip top v-if="props.rowData.duplicateEmail">                                        
                                        <v-icon color="red darken-2" size="18" slot="activator">zmdi-email</v-icon>
                                        <span v-html="props.rowData.duplicateEmail"></span>
                                    </v-tooltip>
                                    <v-tooltip top v-if="props.rowData.rc_policy">
                                        <v-icon color="green darken-2" size="18" slot="activator">zmdi-check-square</v-icon>
                                        <span>{{$t('contact.RC_POLICY_TOOLTIP')}}</span>
                                    </v-tooltip>
                                    <v-tooltip top v-if="props.rowData.call_lead_source">                                    
                                        <v-icon color="purple darken-2" size="18" slot="activator">zmdi-phone</v-icon>
                                      <span>{{$t('contact.CALL_LEAD_SOURCE_TOOLTIP')}}</span>
                                    </v-tooltip>
                                    <v-tooltip top v-if="props.rowData.send_offer_by_post">
                                        <v-icon color="blue darken-2" size="18" slot="activator">zmdi-email</v-icon>
                                        <span>{{$t('contact.SEND_OFFER_BY_POST_TOOLTIP')}}</span>
                                    </v-tooltip>
                                    <v-tooltip top v-if="props.rowData.language_flag">
                                        <img class="contact_flag" height="12" :src="props.rowData.language_flag" slot="activator"/>
                                        <span>{{props.rowData.language}}</span>
                                    </v-tooltip>
                                  </div>
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
                                <template slot="name" slot-scope="props">                                    
                                    <span class="salute_icon left">
                                        <template v-if="props.rowData.salutation === 'company'">
                                            <v-tooltip top>                                                
                                                <font-awesome-icon :icon="['far', 'building']" slot="activator"/>
                                                <span>{{$t('general.COMPANY')}}</span>
                                            </v-tooltip>                                            
                                        </template>
                                        <template v-else-if="props.rowData.salutation === 'mr'">
                                            <v-tooltip top>
                                                <font-awesome-icon :icon="['fas', 'mars']" slot="activator"/>
                                                <span>{{$t('general.MR')}}</span>                                                
                                            </v-tooltip>   
                                        </template>                                                                                
                                        <template v-else-if="props.rowData.salutation === 'mrs'">                                            
                                            <v-tooltip top>
                                                <font-awesome-icon :icon="['fas', 'venus']" slot="activator"/>
                                                <span>{{$t('general.MRS')}}</span>
                                            </v-tooltip>    
                                        </template>                                                                                
                                    </span>
                                    <span class="primary-text left ml-1">{{ props.rowData.first_name + ' ' + props.rowData.last_name}}</span>                                    
                                </template>
                                <template slot="address" slot-scope="props">                                    
                                    <span class="primary-text" v-if="props.rowData.address">{{ props.rowData.address }}</span>
                                    <span class="primary-text secondary-text">{{ props.rowData.zip }} {{ props.rowData.city }}</span>                                    
                                </template>
                                <template slot="invoices" slot-scope="props">
                                    <span class="amount-div">{{ props.rowData.invoice_total}}</span>
                                    <span class="grey--text fs-12 secondary-text fw-normal d-block">{{props.rowData.count_policies}}&nbsp;{{ $t('contact.TOTAL_POLICIES') }}</span>
                                    <span class="grey--text fs-12 secondary-text fw-normal d-block">{{props.rowData.count_invoices}}&nbsp;{{ $t('contact.TOTAL_INVOICES') }}</span>                                    
                                </template>
                                <template slot="statusdropdown" slot-scope="props">
                                    <v-menu offset-y>
                                        <v-btn icon slot="activator" class="ma-0">
                                            <v-icon>more_vert</v-icon>
                                        </v-btn>
                                        <v-list>
                                            <v-list-tile
                                              class="status_dropdown"
                                              v-for="(qs, index) in contactstatus"
                                              :key="qs.title"
                                              @click="changeStatus(qs.title,props.rowData.id)"
                                            >
                                            <v-list-tile-title>{{ qs.text }}</v-list-tile-title>
                                            </v-list-tile>
                                      </v-list>
                                    </v-menu>
                                </template>
                                <template slot="status" slot-scope="props">
                                    <div :columnclass="props.rowData.status_class.replace('label-status','column')" :class="props.rowData.status_class.replace('label-status','column') + ' status-chips'" :id="'status_'+props.rowData.id">
                                        <v-chip small :id="'status_chip_'+props.rowData.id" :chipclass="props.rowData.status_class" :class="props.rowData.status_class" text-color="white">{{tConverted('contact.status.' + props.rowData.status)}}</v-chip>
                                        <policy-count :policy_count_detail="props.rowData.count_policy_by_status"></policy-count>
                                        <invoice-count :invoice_count_detail="props.rowData.count_invoice_by_status"></invoice-count>
                                    </div>
                                </template>
                                <template slot="userlink" slot-scope="props">
                                    <v-avatar v-if="props.rowData.user_id" size="26" class="round-badge-success">
                                        <a href="#"><v-icon color="white" small>ti-link</v-icon></a>
                                    </v-avatar>
                                    <v-avatar v-else size="26" class="round-badge-disabled">
                                        <a href="#"><v-icon color="white" small>ti-link</v-icon></a>
                                    </v-avatar>
                                </template>
                                <!-- <template slot="action" slot-scope="props">
                                    <v-menu offset-y>
                                        <v-icon medium slot="activator">zmdi-caret-down-circle</v-icon>
                                      <v-list>
                                        <v-list-tile
                                          v-for="(co, index) in contactofferactions"
                                          :key="index"
                                          @click=""
                                        >
                                          <v-list-tile-title>{{ co }}</v-list-tile-title>
                                        </v-list-tile>
                                      </v-list>
                                    </v-menu>
                                </template>-->
                                <template slot="addpolicy" slot-scope="props">
                                    <v-tooltip top>
                                            <a href="#" slot="activator">
                                                <v-avatar size="26" class="round-badge-success">
                                                    <v-icon color="white" small>zmdi zmdi-plus</v-icon>
                                                </v-avatar>
                                            </a>    
                                        <span>{{ $t('contact.ADD_NEW_POLICY') }}</span>
                                    </v-tooltip>                                    
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
import PolicyCount from "Components/Crm/General/PolicyCount";
import InvoiceCount from "Components/Crm/General/InvoiceCount";

export default {
    mixins: [globalFunction, TableData],
    components: {
        Vuetable,
        VuetablePagination,        
        VuetablePaginationInfo,
        Filters,
        PolicyCount,
        InvoiceCount
    },    
     data() {        
        return {   
            recordCount: 0,
            fields: [
                {name: "prettycheck", title: '', titleClass: "chkbox_column", dataClass: "chkbox_column"},
                {title: () => this.$i18n.t('contact.ID'), name: "contactformate", titleClass: 'contact_id_title', dataClass: 'contact_id_data'},
                {title: "", name: "edit", dataClass: 'edit_data', titleClass: 'edit_column'},
                {title: () => this.$i18n.t('general.NAME'), name: "name"},
                {title: () => this.$i18n.t('general.ADDRESS'), name: "address"},
                {title: () => this.$i18n.t('contact.TOTAL_INVOICES'), name: "invoices"},
                {title: "", name: "statusdropdown", dataClass: 'statusdropdown_column', titleClass: 'statusdropdown_column'},
                {title: () => this.$i18n.t('general.STATUS'), name: "status", dataClass: 'status_policy_column', titleClass: 'status_policy_column'},
                {title: "", name: "userlink", dataClass: 'userid_link'},
                //{ title: "", name: "action" },
                {title: "", name: "addpolicy", dataClass: 'add_policy_btn'},
            ],                                           
        }
     },     
     computed:{     
     contactstatus: function(){
        let status = [];
        let that = this;                
        if(this.$store.getters.serverHelpers.statuses.hasOwnProperty('contact')){             
            _.forOwn(this.$store.getters.serverHelpers.statuses.contact, function(title, key) { 
                status.push({'title': key, 'text': that.$i18n.t(title)})
            });            
        }        
        return status;
    },
    lead_source_option: function(){
        let ls_option = [];
        let that = this;
        if(this.$store.getters.serverHelpers.hasOwnProperty('lead_source_options')){            
            _.forOwn(this.$store.getters.serverHelpers.lead_source_options, function(title, key) { 
                ls_option.push({'title': key, 'text': that.$i18n.t(title)})
            });            
        }        
        return ls_option;
    },
    language_filter_option:function(){
        let that = this;
        let language_option = [];
        let mix_lang = process.env.MIX_LANGUAGE_OPTIONS.split(',');
        _.forEach(mix_lang, function(title, key) { 
            language_option.push({'title': title, 'text': that.tConverted('general.language.'+title)})
        }); 
        return language_option;
    },
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
        changeStatus(val,id){
            let that = this;            
            this.loading = true;
            api.put('/api/contacts/change_status/'+id, {status: val}) .then(function (response) {                
                if((typeof response.data.data !== "undefined") && (response.data.data.hasOwnProperty('id'))){                    
                    let row_id = response.data.data.id;
                    
                    let columnclass = $('#status_'+row_id).attr('columnclass');
                    let new_columnclass = response.data.data.status_class.replace('label-status','column');
                    $('#status_'+row_id).removeClass(columnclass);
                    $('#status_'+row_id).attr('columnclass', new_columnclass);
                    $('#status_'+row_id).addClass(new_columnclass);
                    
                    let chipclass = $('#status_chip_'+row_id).attr('chipclass');
                    let new_chipclass = response.data.data.status_class;
                    $('#status_chip_'+row_id).removeClass(chipclass);
                    $('#status_chip_'+row_id).attr('chipclass', new_chipclass);
                    $('#status_chip_'+row_id).addClass(new_chipclass);

                    $('#status_chip_'+row_id+' .v-chip__content').html(that.tConverted('contact.status.'+ response.data.data.status));
                    that.loading = false;
                    Vue.prototype.$eventHub.$emit('fireSuccess', response.data.message); 
                }
            }).catch(function (error) {
                that.loading = false;
                console.log(error);
            });
        },       
        contactFetch(apiUrl,httpOptions){
            return api.get(apiUrl, httpOptions);
        },              
    onRowClass(dataItem, index) {            
        return ((dataItem.contact_type) == '2' ? 'row-business': 'row-personal');
    }
  },
    created() {        
        this.$store.dispatch("setHeaderTitle", 'contact.CONTACTS');    
    }
};
</script>
<style scoped>
.contactlist >>> .v-datatable{
    table-layout: fixed;
    min-width: 1100px;
}
.contactlist >>> .list-table-container table.v-table thead th:nth-child(1), .contactlist >>> .list-table-container table.v-table tbody td:nth-child(1){
    width: 40px;
}
.contactlist >>> .list-table-container table.v-table thead th:nth-child(2), .contactlist >>> .list-table-container table.v-table tbody td:nth-child(2){
    width: 120px;
}
.contactlist >>> .list-table-container table.v-table thead th:nth-child(3), .contactlist >>> .list-table-container table.v-table tbody td:nth-child(3){
    width: 40px;
}
.contactlist >>> .list-table-container table.v-table thead th:nth-child(4), .contactlist >>> .list-table-container table.v-table tbody td:nth-child(4){
    width: 15%;
}
.contactlist >>> .list-table-container table.v-table thead th:nth-child(5), .contactlist >>> .list-table-container table.v-table tbody td:nth-child(5){
    width: 16%;
}
.contactlist >>> .list-table-container table.v-table thead th:nth-child(6), .contactlist >>> .list-table-container table.v-table tbody td:nth-child(6){
    width: 98px;
}
.contactlist >>> .list-table-container table.v-table thead th:nth-child(7), .contactlist >>> .list-table-container table.v-table tbody td:nth-child(7){
    width: 25px;
}
.contactlist >>> .list-table-container table.v-table thead th:nth-child(8), .contactlist >>> .list-table-container table.v-table tbody td:nth-child(8){
    width: 200px;
}
.contactlist >>> .list-table-container table.v-table thead th:nth-child(9), .contactlist >>> .list-table-container table.v-table tbody td:nth-child(9){
    width: 40px;
}
.contactlist >>> .list-table-container table.v-table thead th:nth-child(10), .contactlist >>> .list-table-container table.v-table tbody td:nth-child(10){
    width: 40px;
    border-right: none;
}
</style>