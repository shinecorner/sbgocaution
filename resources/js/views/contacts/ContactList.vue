<template>
    <div class="contactlist">
        <page-title-bar></page-title-bar>
            <app-section-loader :status="loading"></app-section-loader>
		<v-container fluid grid-list-xl py-0>
                    <v-layout row wrap>
                        <app-card                                
                                :fullBlock="true"
                                colClasses="xl12 lg12 md12 sm12 xs12"
                        >                                
                            <v-flex xs3 md1 lg1 offset-xs9 offset-md11 offset-lg11>                            
                                <v-select class="perpage_selectbox" hide-details v-bind:items="perPageItems"  v-model.number="perPage" single-line  menu-props="bottom" ></v-select>
                            </v-flex>
                        </app-card>
                    </v-layout>
                    <v-layout row wrap>
                        <app-card
                                :heading="$t('message.crm.CONTACTS')"
                                :fullBlock="true"
                                colClasses="xl12 lg12 md12 sm12 xs12"
                        >            
                                <div class="v-table__overflow list-table-container">
				<vuetable ref="vuetable"
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
                                    <v-checkbox v-model="checkedRows" :id="'check_'+props.rowData.id" :value="props.rowData.id"></v-checkbox>
                                </template>  
                                <template slot="c_contactformate" slot-scope="props">
                                  <span class="primary-text">{{ props.rowData.contact_formate }}</span>                                  
                                  <span class="grey--text secondary-text fs-12 d-block">{{ props.rowData.date }}</span>
                                  <div class="pt-2 column_icon_container">
                                    <v-tooltip top v-if="props.rowData.is_duplicate">                                        
                                        <v-icon color="orange darken-2" size="18" slot="activator">zmdi-alert-triangle</v-icon>
                                        <span>{{props.rowData.is_duplicate}}</span>
                                    </v-tooltip>
                                    <v-tooltip top v-if="props.rowData.duplicateEmail">                                        
                                        <v-icon color="red darken-2" size="18" slot="activator">zmdi-email</v-icon>
                                        <span>{{props.rowData.duplicateEmail}}</span>
                                    </v-tooltip>
                                    <v-tooltip top v-if="props.rowData.rc_quote">
                                        <v-icon color="green darken-2" size="18" slot="activator">zmdi-check-square</v-icon>
                                        <span>{{$t('message.crm.RC_QUOTE_TOOLTIP')}}</span>
                                    </v-tooltip>
                                    <v-tooltip top v-if="props.rowData.call_lead_source">                                    
                                        <v-icon color="purple darken-2" size="18" slot="activator">zmdi-phone</v-icon>
                                      <span>{{$t('message.crm.CALL_LEAD_SOURCE_TOOLTIP')}}</span>
                                    </v-tooltip>
                                    <v-tooltip top v-if="props.rowData.send_offer_by_post">
                                        <v-icon color="blue darken-2" size="18" slot="activator">zmdi-email</v-icon>
                                        <span>{{$t('message.crm.SEND_OFFER_BY_POST_TOOLTIP')}}</span>
                                    </v-tooltip>
                                    <v-tooltip top v-if="props.rowData.language_flag">
                                        <img class="contact_flag" height="12" :src="props.rowData.language_flag" slot="activator"/>
                                        <span>{{props.rowData.language}}</span>
                                    </v-tooltip>
                                  </div>
                                </template>
                                <template slot="c_edit" slot-scope="props">
                                    <a>                                         
                                        <span class="primary-text text-xs-center"><v-icon size="18">ti-pencil-alt</v-icon></span>
                                        <span class="grey--text fs-12 secondary-text fw-normal d-block">{{ $t('message.crm.EDIT') }}</span>
                                    </a>
                                </template>
                                <template slot="c_name" slot-scope="props">
                                    <span class="primary-text">{{ props.rowData.nachname }} {{ props.rowData.vorname }}</span>
                                    <span v-if="props.rowData.company_name" class="grey--text fs-12 secondary-text fw-normal d-block">{{ props.rowData.company_name }}</span>
                                    <span v-if="props.rowData.anrede" class="grey--text fs-12 secondary-text fw-normal d-block">{{ props.rowData.anrede }}</span>        
                                </template>
                                <template slot="c_address" slot-scope="props">                                    
                                    <span class="primary-text" v-if="props.rowData.address">{{ props.rowData.address }}</span>
                                    <span class="primary-text secondary-text">{{ props.rowData.plz }} {{ props.rowData.ort }}</span>                                    
                                </template>
                                <template slot="c_invoices" slot-scope="props">
                                    <span class="amount-div">{{ 'CHF 94.50' }}</span>
                                    <span class="grey--text fs-12 secondary-text fw-normal d-block">1 {{ $t('message.crm.CONTACT_QUOTE_TITLE') }}</span>
                                    <span class="grey--text fs-12 secondary-text fw-normal d-block">1 {{ $t('message.crm.TOTAL_INVOICES') }}</span>                                    
                                </template>
                                <template slot="c_statusdropdown" slot-scope="props">
                                    <v-menu offset-y>
                                        <v-icon size="24" slot="activator">zmdi-caret-down-circle</v-icon>
                                        <v-list>
                                            <v-list-tile
                                              class="status_dropdown"
                                              v-for="(qs, index) in quotestatus"
                                              :key="index"
                                              @click=""
                                            >
                                            <v-list-tile-title>{{ qs }}</v-list-tile-title>
                                            </v-list-tile>
                                      </v-list>
                                    </v-menu>
                                </template>
                                <template slot="c_status" slot-scope="props">
                                    <div :class="props.rowData.status_class.replace('label-status','column') + ' status-chips'">
                                        <v-chip small :class="props.rowData.status_class" text-color="white">{{props.rowData.status}}</v-chip>
                                        
                                        <div>
                                            <v-tooltip top> 
                                                <v-chip slot="activator" small dark color="orange" text-color="white">1</v-chip>
                                                <span>{{$t('message.crm.QUOTES')}}:&nbsp;{{$t('message.crm.STATUS_QUOTE_WAITING')}}</span>
                                            </v-tooltip>
                                        </div>
                                        <div>
                                            <v-tooltip top v-for="n in 5" v-bind:key="'invoice'+n"> 
                                                <v-chip slot="activator" small dark color="orange" text-color="white">1</v-chip>
                                                <span>{{$t('message.crm.INVOICES')}}:&nbsp;{{$t('message.crm.ONLINE_PAYMENT_WAITING')}}</span>
                                            </v-tooltip>
                                        </div>
                                    </div>
                                </template>
                                <template slot="c_userlink" slot-scope="props">
                                    {{'0'}}
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
                                <template slot="c_addquote" slot-scope="props">
                                    <a>
                                        <span class="primary-text text-xs-center"><v-icon size="18">ti-plus</v-icon></span>
                                        <span class="grey--text fs-12 secondary-text fw-normal d-block">{{ $t('message.crm.CONTACT_QUOTE_TITLE') }}</span>
                                    </a>                                                                        
                                </template>
                            </vuetable>
                        </div>
                        <div class="layout row wrap">
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
export default {
    components: {
        Vuetable,
        VuetablePagination,
        VuetablePaginationInfo        
    }, 
    watch: {
        selectedLocale: function(newVal, oldVal){
            //console.log(newVal);
            //console.log(this.$t('message.crm.CONTACT_ID'));
            this.reinitializeFields();
        }
    },
     data() {
        return {
            loading: true,
            perPage: 20,
            perPageItems:[20,25,50,100,500],
            moreParams: {},
            paginationComponent: 'vuetable-pagination',
            httpOptions: { headers: { Authorization: 'Bearer '+localStorage.getItem('accessToken') } },
            checkedRows: [],
            fields: [  
                {name: "prettycheck",   title: '', titleClass: "chkbox_column", dataClass: "chkbox_column"},
                { title: this.$t('message.crm.CONTACT_ID'), name: "c_contactformate", titleClass: 'contact_id_title',dataClass: 'contact_id_data' },
                { title: "", name: "c_edit", dataClass: 'edit_data', titleClass:'edit_column' },
                { title: this.$t('message.crm.NAME'), name: "c_name" },
                { title: this.$t('message.crm.ADDRESS'), name: "c_address" },
                { title: this.$t('message.crm.TOTAL_INVOICES'), name: "c_invoices" },                
                { title: "", name: "c_statusdropdown", dataClass: 'statusdropdown_column', titleClass:'statusdropdown_column' },
                { title: this.$t('message.crm.STATUS'), name: "c_status", dataClass: 'status_quote_column', titleClass:'status_quote_column'},
                { title: this.$t('message.crm.LINKED_TO_USER'), name: "c_userlink"},
                //{ title: "", name: "c_action" },
                { title: "", name: "c_addquote" },
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
     quotestatus: function(){
        if(this.$store.getters.currentLanguageHelpers.hasOwnProperty('status_quote_waiting')){            
            return this.$store.getters.currentLanguageHelpers.status_quote_waiting;        
        }
        else{
            return {};
        }        
    },
    contactofferactions: function(){
        if(this.$store.getters.currentLanguageHelpers.hasOwnProperty('CONTACT_PDF_OFFER_PRINT_LETTER')){
            return this.$store.getters.currentLanguageHelpers.CONTACT_PDF_OFFER_PRINT_LETTER;        
        }
        else{
            return {};
        }        
    }    
   },   
      methods: {
        reinitializeFields(){
            this.$nextTick(()=>{                            
              this.$refs.vuetable.fields[1].title = this.$t('message.crm.CONTACT_ID');
              this.$refs.vuetable.fields[3].title = this.$t('message.crm.NAME');
              this.$refs.vuetable.fields[4].title = this.$t('message.crm.ADDRESS');  
              this.$refs.vuetable.fields[5].title = this.$t('message.crm.TOTAL_INVOICES');  
              this.$refs.vuetable.fields[7].title = this.$t('message.crm.STATUS');  
              this.$refs.vuetable.fields[8].title = this.$t('message.crm.LINKED_TO_USER');
              this.$refs.vuetable.normalizeFields();
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



  }
};
</script>
<style scoped>


</style>