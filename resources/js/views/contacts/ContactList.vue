<template>
    <div class="contactlist">
        <!--<page-title-bar></page-title-bar>-->
            <app-section-loader :status="loading"></app-section-loader>
		<v-container fluid grid-list-xl py-0>                    
                    <v-layout row wrap>
                        <app-card                                
                                :fullBlock="true"
                                colClasses="xl12 lg12 md12 sm12 xs12 search-content"
                        >                            
                            <v-flex xs3 md1 lg1 offset-xs9 offset-md11 offset-lg11>                            
                                <v-select solo class="perpage_selectbox" hide-details v-bind:items="perPageItems"  v-model.number="perPage" single-line  menu-props="bottom" ></v-select>
                                    </v-flex>                                    
                        </app-card>
                    </v-layout>                    
                    <v-layout row wrap>
                        <app-card                                
                                :fullBlock="true"
                                colClasses="xl12 lg12 md12 sm12 xs12"
                        >                                      
                                <div class="v-table__overflow list-table-container">
				<vuetable ref="vuetable"
                                    :no-data-template="$t('general.DATA_LOADING')"
                                    api-url="api/contacts"
                                    :http-fetch="contactFetch"
                                    :fields="fields"           
                                    :css="css.table"
                                    :transform="transform"
                                    pagination-path="pagination" 
                                    data-path="mydata"
                                    :append-params="moreParams"    
                                    :per-page="perPage" 
                                    track-by="id"
                                    @vuetable:pagination-data="onPaginationData"
                                    @vuetable:loading="onLoading"        
                                    @vuetable:loaded="onLoaded"
                                  >                                                                     
                                <template slot="prettycheck" slot-scope="props">
                                    <v-checkbox color="indigo" v-model="checkedRows" :key="'check_'+props.rowData.id" :value="props.rowData.id"></v-checkbox>
                                </template>  
                                <template slot="c_contactformate" slot-scope="props">                                  
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
                                <template slot="c_edit" slot-scope="props">
                                    <v-tooltip top v-if="props.rowData.id">
                                            <a href="#" slot="activator">
                                                <v-avatar size="26" class="round-badge-success">
                                                    <v-icon color="white" small>zmdi zmdi-edit</v-icon>
                                                </v-avatar>
                                            </a>    
                                        <span>{{ $t('general.EDIT') }}</span>
                                    </v-tooltip>
                                </template>
                                <template slot="c_name" slot-scope="props">                                    
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
                                <template slot="c_address" slot-scope="props">                                    
                                    <span class="primary-text" v-if="props.rowData.address">{{ props.rowData.address }}</span>
                                    <span class="primary-text secondary-text">{{ props.rowData.zip }} {{ props.rowData.city }}</span>                                    
                                </template>
                                <template slot="c_invoices" slot-scope="props">
                                    <span class="amount-div">{{ props.rowData.invoice_total}}</span>
                                    <span class="grey--text fs-12 secondary-text fw-normal d-block">{{props.rowData.count_policies}}&nbsp;{{ $t('contact.TOTAL_POLICIES') }}</span>
                                    <span class="grey--text fs-12 secondary-text fw-normal d-block">{{props.rowData.count_invoices}}&nbsp;{{ $t('contact.TOTAL_INVOICES') }}</span>                                    
                                </template>
                                <template slot="c_statusdropdown" slot-scope="props">
                                    <v-menu offset-y>
                                        <v-btn icon slot="activator" class="ma-0">
                                            <v-icon>more_vert</v-icon>
                                        </v-btn>
                                        <v-list>
                                            <v-list-tile
                                              class="status_dropdown"
                                              v-for="(qs, index) in contactstatus"
                                              :key="index"
                                              @click="changeStatus(index,props.rowData.id)"
                                            >
                                            <v-list-tile-title>{{ $t(qs) }}</v-list-tile-title>
                                            </v-list-tile>
                                      </v-list>
                                    </v-menu>
                                </template>
                                <template slot="c_status" slot-scope="props">
                                    <div :columnclass="props.rowData.status_class.replace('label-status','column')" :class="props.rowData.status_class.replace('label-status','column') + ' status-chips'" :id="'c_status_'+props.rowData.id">
                                        <v-chip small :id="'c_status_chip_'+props.rowData.id" :chipclass="props.rowData.status_class" :class="props.rowData.status_class" text-color="white">{{props.rowData.status}}</v-chip>
                                        
                                        <div>
                                            <v-tooltip top v-for="(policy_detail,policy_status, policy_index) in props.rowData.count_policy_by_status" v-bind:key="policy_index"> 
                                                <v-chip slot="activator" small :class="'label-status-' + policy_detail.class" text-color="white">{{policy_detail.count}}</v-chip>
                                                <span>{{$t('general.POLICIES')}}:&nbsp;{{tConverted('policy.status.'+policy_status)}}</span>
                                            </v-tooltip>
                                        </div>
                                        <div>
                                            <v-tooltip top v-for="(invoice_detail,invoice_status, invoice_index) in props.rowData.count_invoice_by_status" v-bind:key="invoice_index"> 
                                                <v-chip slot="activator" small :class="'label-status-' + invoice_detail.class" text-color="white">{{invoice_detail.count}}</v-chip>
                                                <span>{{$t('general.INVOICES')}}:&nbsp;{{tConverted('invoice.status.'+invoice_status)}}</span>
                                            </v-tooltip>
                                        </div>
                                    </div>
                                </template>
                                <template slot="c_userlink" slot-scope="props">
                                    <v-avatar v-if="props.rowData.user_id" size="26" class="round-badge-success">
                                        <a href="#"><v-icon color="white" small>ti-link</v-icon></a>
                                    </v-avatar>
                                    <v-avatar v-else size="26" class="round-badge-disabled">
                                        <a href="#"><v-icon color="white" small>ti-link</v-icon></a>
                                    </v-avatar>
                                </template>
                                <!-- <template slot="c_action" slot-scope="props">
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
                                <template slot="c_addpolicy" slot-scope="props">
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
import { mapGetters } from "vuex";
import { Vuetable, VuetablePagination, VuetablePaginationInfo, VuetablePaginationDropdown} from 'vuetable-2';
import globalFunction from "Helpers/helpers";
export default {
    mixins: [globalFunction],
    components: {
        Vuetable,
        VuetablePagination,        
        VuetablePaginationInfo        
    }, 
    watch: {
        selectedLocale: function(newVal, oldVal){
            //console.log(newVal);
            //console.log(this.$t('contact.ID'));
            this.$refs.vuetable.refresh();
            this.reinitializeFields();
      }
    },
     data() {
        console.log(this.$store.getters.serverHelpers);
        return {
            loading: true,
            currentPerPage: '',
            perPage: ((this.$store.getters.serverHelpers.hasOwnProperty('configs') && this.$store.getters.serverHelpers.configs['crm.items_per_page'])? parseInt(this.$store.getters.serverHelpers.configs['crm.items_per_page']) : 20),
            //perPageItems: ((typeof process.env.MIX_PER_PAGE_OPTIONS === 'undefined')?  [20,25,50,100,500] : process.env.MIX_PER_PAGE_OPTIONS.split(',').map(Number)),
            perPageItems: process.env.MIX_PER_PAGE_OPTIONS.split(',').map(Number),
            moreParams: {},
            paginationComponent: 'vuetable-pagination',
            httpOptions: { headers: { Authorization: 'Bearer '+localStorage.getItem('accessToken') } },
            checkedRows: [],
            fields: [  
                {name: "prettycheck",   title: '', titleClass: "chkbox_column", dataClass: "chkbox_column"},
                { title: this.$t('contact.ID'), name: "c_contactformate", titleClass: 'contact_id_title',dataClass: 'contact_id_data' },
                { title: "", name: "c_edit", dataClass: 'edit_data', titleClass:'edit_column' },
                { title: this.$t('general.NAME'), name: "c_name" },
                { title: this.$t('general.ADDRESS'), name: "c_address" },
                { title: this.$t('contact.TOTAL_INVOICES'), name: "c_invoices" },                
                { title: "", name: "c_statusdropdown", dataClass: 'statusdropdown_column', titleClass:'statusdropdown_column' },
                { title: this.$t('general.STATUS'), name: "c_status", dataClass: 'status_policy_column', titleClass:'status_policy_column'},
                { title: "", name: "c_userlink", dataClass: 'userid_link'},
                //{ title: "", name: "c_action" },
                { title: "", name: "c_addpolicy",  dataClass: 'add_policy_btn'},
            ],
            css: {
                table: {
                  tableClass: 'v-datatable v-table theme--light',
                  loadingClass: 'loading',
                  ascendingIcon: 'glyphicon glyphicon-chevron-up',
                  descendingIcon: 'glyphicon glyphicon-chevron-down',
                  handleIcon: 'glyphicon glyphicon-menu-hamburger',
                },
                pagination: {
                  infoClass: 'v-datatable__actions__pagination',
                  wrapperClass: 'v-datatable__actions',
                  activeClass: 'btn-primary',
                  disabledClass: 'disabled',
                  pageClass: 'btn btn-border',
                  linkClass: 'btn btn-border',
                  icons: {
                    first: '',
                    prev: '',
                    next: '',
                    last: '',
                  },
                }
            }
        }
     },     
     computed:{
     ...mapGetters(["selectedLocale"]),
     contactstatus: function(){
        if(this.$store.getters.serverHelpers.statuses.hasOwnProperty('contact')){            
            return this.$store.getters.serverHelpers.statuses.contact;
        }
        else{
            return {};
        }        
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
        reinitializeFields(){
            this.$nextTick(()=>{                            
              this.$refs.vuetable.fields[1].title = this.$t('contact.ID');
              this.$refs.vuetable.fields[3].title = this.$t('general.NAME');
              this.$refs.vuetable.fields[4].title = this.$t('general.ADDRESS');  
              this.$refs.vuetable.fields[5].title = this.$t('contact.TOTAL_INVOICES');  
              this.$refs.vuetable.fields[7].title = this.$t('general.STATUS');                
              this.$refs.vuetable.normalizeFields();
           });
        },
        changeStatus(val,id){
            let that = this;            
            this.loading = true;
            api.put('/api/contacts/change_status/'+id, {status: val}) .then(function (response) {                
                if((typeof response.data.data !== "undefined") && (response.data.data.hasOwnProperty('id'))){                    
                    let row_id = response.data.data.id;
                    
                    let columnclass = $('#c_status_'+row_id).attr('columnclass');
                    let new_columnclass = response.data.data.status_class.replace('label-status','column');
                    $('#c_status_'+row_id).removeClass(columnclass);
                    $('#c_status_'+row_id).attr('columnclass', new_columnclass);
                    $('#c_status_'+row_id).addClass(new_columnclass);
                    
                    let chipclass = $('#c_status_chip_'+row_id).attr('chipclass');
                    let new_chipclass = response.data.data.status_class;
                    $('#c_status_chip_'+row_id).removeClass(chipclass);
                    $('#c_status_chip_'+row_id).attr('chipclass', new_chipclass);
                    $('#c_status_chip_'+row_id).addClass(new_chipclass);

                    $('#c_status_chip_'+row_id+' .v-chip__content').html(response.data.data.status);
                    that.loading = false;
                    Vue.prototype.$eventHub.$emit('fireSuccess', that.$t('general.SAVE_SUCCESSFULLY')); 
                }
            }).catch(function (error) {
                that.loading = false;
                console.log(error);
            });
        },
        contactFetch(apiUrl,httpOptions){
            return api.get(apiUrl, httpOptions);
        },
        onPaginationData (paginationData) {
          this.$refs.pagination.setPaginationData(paginationData)
        },
        onChangePage (page) {
          this.$refs.vuetable.changePage(page)
        },
        
        onLoading() {            
          this.loading = true;
          if(this.currentPerPage !== this.perPage){                
                this.currentPerPage = this.perPage;
                this.$refs.vuetable.currentPage = 1;
            }          
        },
        onLoaded() {
          this.loading = false; 
        },
        transform: function(data) {        
        let transformed = {}
        let pg_meta = data.meta
        let pg_links = data.links

        transformed.pagination = {
          total: pg_meta.total,
          per_page: pg_meta.per_page,
          current_page: pg_meta.current_page,
          last_page: pg_meta.last_page,
          next_page_url: pg_links.next ? pg_links.next : null,
          prev_page_url: pg_links.prev ? pg_links.prev : null,
          from: pg_meta.from,
          to: pg_meta.to,
        }
        transformed.mydata = [];
        transformed.mydata = data.data
        return transformed
      },



  },
    created() {
        this.currentPerPage = this.perPage;
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