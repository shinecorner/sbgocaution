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
                                <div class="v-table__overflow">
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
                                    @vuetable:pagination-data="onPaginationData"
                                    @vuetable:loading="onLoading"        
                                    @vuetable:loaded="onLoaded"
                                  >    
                                <template slot="c_contactformate" slot-scope="props">
                                  <span class="name-div">{{ props.rowData.contact_formate }}</span>                                  
                                  <span class="grey--text fs-12 fw-normal mb-2 d-block">{{ props.rowData.date }}</span>
                                  <v-tooltip top v-if="props.rowData.is_duplicate">
                                      <i class="ti-layout-accordion-merged" slot="activator"></i>
                                      <span>{{props.rowData.is_duplicate}}</span>
                                  </v-tooltip>
                                  <v-tooltip top v-if="props.rowData.duplicateEmail">
                                      <i class="ti-email" slot="activator"></i>
                                      <span>{{props.rowData.duplicateEmail}}</span>
                                  </v-tooltip>
                                  <v-tooltip top v-if="props.rowData.rc_quote">
                                      <i class="ti-check" slot="activator"></i>
                                      <span>{{$t('message.crm.RC_QUOTE_TOOLTIP')}}</span>
                                  </v-tooltip>
                                  <v-tooltip top v-if="props.rowData.call_lead_source">
                                      <i class="ti-headphone" slot="activator"></i>
                                      <span>{{$t('message.crm.CALL_LEAD_SOURCE_TOOLTIP')}}</span>
                                  </v-tooltip>
                                  <v-tooltip top v-if="props.rowData.send_offer_by_post">
                                      <i class="ti-headphone" slot="activator"></i>
                                      <span>{{$t('message.crm.CALL_LEAD_SOURCE_TOOLTIP')}}</span>
                                  </v-tooltip>
                                  <v-tooltip top v-if="props.rowData.language_flag">
                                      <img height="12" :src="props.rowData.language_flag" slot="activator"/>
                                      <span>{{props.rowData.language}}</span>
                                  </v-tooltip>
                                </template>
                                <template slot="c_edit" slot-scope="props">
                                    <a>
                                        <span class="name-div centertext"><i class="ti-pencil-alt"></i></span>
                                        <span class="grey--text fs-12 fw-normal d-block">{{ $t('message.crm.EDIT') }}</span>
                                    </a>
                                </template>
                                <template slot="c_name" slot-scope="props">
                                    <span class="name-div">{{ props.rowData.nachname }} {{ props.rowData.vorname }}</span>
                                    <span v-if="props.rowData.company_name" class="grey--text fs-12 fw-normal d-block">{{ props.rowData.company_name }}</span>
                                    <span v-if="props.rowData.anrede" class="grey--text fs-12 fw-normal d-block">{{ props.rowData.anrede }}</span>        
                                </template>
                                <template slot="c_address" slot-scope="props">
                                    <div class="name-div">
                                        <!--<span v-if="props.rowData.address" class="grey--text fs-12 fw-normal d-block">{{ props.rowData.address }}</span>-->
                                        {{ props.rowData.plz }} {{ props.rowData.ort }}
                                    </div>
                                </template>
                                <template slot="c_invoices" slot-scope="props">
                                    <span class="amount-div">{{ 'CHF 94.50' }}</span>
                                    <span class="grey--text fs-12 fw-normal d-block">1 {{ $t('message.crm.CONTACT_QUOTE_TITLE') }}</span>
                                    <span class="grey--text fs-12 fw-normal d-block">1 {{ $t('message.crm.TOTAL_INVOICES') }}</span>                                    
                                </template>
                                <template slot="c_statusdropdown" slot-scope="props">
                                    <v-menu offset-y>
                                        <v-icon medium slot="activator">zmdi-caret-down-circle</v-icon>
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
                                    <div :class="props.rowData.status_class.replace('label-status','column')">
                                        <v-chip small :class="props.rowData.status_class" text-color="white"><span class="fs-12">{{props.rowData.status}}</span></v-chip>
                                        
                                        <div class="d-block">
                                            <v-tooltip top> 
                                                <v-chip slot="activator" small dark class="fs-12" color="orange" text-color="white"><span class="fs-12">1</span></v-chip>
                                                <span>{{$t('message.crm.STATUS_QUOTE_WAITING')}}</span>
                                            </v-tooltip>
                                        </div>
                                        <div class="d-block">
                                            <v-tooltip top v-for="n in 5" v-bind:key="'invoice'+n"> 
                                                <v-chip slot="activator" small dark class="fs-12" color="orange" text-color="white"><span class="fs-12">1</span></v-chip>
                                                <span>{{$t('message.crm.ONLINE_PAYMENT_WAITING')}}</span>
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
                                        <span class="name-div centertext"><i class="ti-plus"></i></span>
                                        <span class="grey--text fs-12 fw-normal d-block">{{ $t('message.crm.CONTACT_QUOTE_TITLE') }}</span>
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
import { Vuetable, VuetablePagination, VuetablePaginationInfo, VuetablePaginationDropdown, VuetableFieldCheckbox } from 'vuetable-2';
export default {
    components: {
        Vuetable,
        VuetablePagination,
        VuetablePaginationInfo,
        VuetableFieldCheckbox
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
            fields: [  
                {name: VuetableFieldCheckbox,   titleClass: 'chkbox_title',dataClass: 'chkbox_data center'},
                { title: this.$t('message.crm.CONTACT_ID'), name: "c_contactformate", titleClass: 'contact_id_title',dataClass: 'contact_id_data' },
                { title: "", name: "c_edit", dataClass: 'edit_data', titleClass:'edit_column' },
                { title: this.$t('message.crm.NAME'), name: "c_name" },
                { title: this.$t('message.crm.ADDRESS'), name: "c_address" },
                { title: this.$t('message.crm.TOTAL_INVOICES'), name: "c_invoices" },                
                { title: "", name: "c_statusdropdown", dataClass: 'statusdropdown_column', titleClass:'statusdropdown_column' },
                { title: this.$t('message.crm.STATUS'), name: "c_status"},
                { title: this.$t('message.crm.LINKED_TO_USER'), name: "c_userlink", dataClass: "centertext"},
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
.status_dropdown >>> .v-list__tile{
    height: 30px !important;
    font-size: 0.75rem !important;
}
.contactlist >>> .chkbox_title input{
    display: none;
}
.contactlist >>> table.v-datatable th{
    text-align: left;
    padding: 8px;
}
.contactlist >>> td.vuetable-slot{
    vertical-align: top;
    padding: 8px;
    line-height: 18px;
    text-align: left;        
}
.contactlist >>> th.chkbox_data, .contactlist >>> td.chkbox_data{    
    width: 10px;
    padding: 8px;
    vertical-align: top;
}
.contactlist >>> .name-div, .amount-div {
    display: block;    
    font-weight: 400;
    line-height: 18px;
    outline: medium none;
    overflow: hidden;
    padding: 0;
    position: relative;
    text-decoration: none;
    white-space: nowrap;
}
.contactlist >>> td.statusdropdown_column, .contactlist >>> th.statusdropdown_column{
    padding: 8px 0;
    width: 10px;
}
.contactlist >>> .v-datatable .v-chip__content{
    padding: 0 8px;
}
.contactlist >>> .v-datatable .centertext{
    text-align: center;
}
.contactlist >>> .v-chip--small{
    height: 18px !important;
    font-weight: bold;
}
</style>