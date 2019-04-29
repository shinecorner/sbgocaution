<template>
	<div>
		<page-title-bar></page-title-bar>
		<app-section-loader :status="loading"></app-section-loader>
		<v-container fluid grid-list-xl py-0>
			<v-layout row wrap>
				<app-card
					:heading="$t('message.crm.CONTACTS')"
					:fullBlock="true"
					colClasses="xl12 lg12 md12 sm12 xs12"
				>
                                <div class="v-table__overflow">
				<vuetable ref="vuetable"
    api-url="api/contacts"
    :http-options="httpOptions"
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
    {{ props.rowData.contact_formate }}
    <br />   
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
        <img :src="props.rowData.language_flag" class="img-responsive" slot="activator"/>
        <span>{{props.rowData.language}}</span>
    </v-tooltip>
  </template>
    <template slot="c_name" slot-scope="props">
        {{ props.rowData.nachname }} {{ props.rowData.vorname }}
        <span v-if="props.rowData.company_name" class="grey--text fs-12 fw-normal d-block">{{ props.rowData.company_name }}</span>
        <span v-if="props.rowData.anrede" class="grey--text fs-12 fw-normal d-block">{{ props.rowData.anrede }}</span>        
    </template>
    <template slot="c_address" slot-scope="props">
        <span class="grey--text fs-12 fw-normal">{{ props.rowData.address }}</span>
            <br />
        {{ props.rowData.plz }} {{ props.rowData.ort }}
    </template>
    <template slot="c_invoices" slot-scope="props">
        {{ 'CHF 94.50' }}
        <span v-if="props.rowData.company_name" class="grey--text fs-12 fw-normal d-block">1 {{ $t('message.crm.CONTACT_QUOTE_TITLE') }}</span>
        <span v-if="props.rowData.anrede" class="grey--text fs-12 fw-normal d-block">1 {{ $t('message.crm.TOTAL_INVOICES') }}</span>
    </template>
    <template slot="c_statusdropdown" slot-scope="props">
        <v-menu offset-y>
            <v-icon medium slot="activator">zmdi-caret-down-circle</v-icon>
            <v-list>
                <v-list-tile
                  v-for="(statusitem, index) in statusitems"
                  :key="index"
                  @click=""
                >
                <v-list-tile-title>{{ statusitem}}</v-list-tile-title>
                </v-list-tile>
          </v-list>
        </v-menu>
    </template>
    <template slot="c_status" slot-scope="props">
        <v-chip small dark :class="props.rowData.status_class" text-color="white">{{props.rowData.status}}</v-chip>
        </span>
        <span class="grey--text fs-12 fw-normal d-block"><v-chip small dark color="orange" text-color="white">1</v-chip></span>
        <span class="grey--text fs-12 fw-normal d-block"><v-chip small dark color="orange" text-color="white">1</v-chip></span>
    </template>
    <template slot="c_userlink" slot-scope="props">
        {{'0'}}
    </template>
    <template slot="c_action" slot-scope="props">
        <v-menu offset-y>
            <v-icon medium slot="activator">zmdi-caret-down-circle</v-icon>
          <v-list>
            <v-list-tile
              v-for="(statusitem, index) in statusitems"
              :key="index"
              @click=""
            >
              <v-list-tile-title>{{ statusitem}}</v-list-tile-title>
            </v-list-tile>
          </v-list>
        </v-menu>
    </template>
    <template slot="c_addquote" slot-scope="props">
        <v-icon medium>zmdi-plus</v-icon>
        <span class="grey--text fs-12 fw-normal d-block">{{ $t('message.crm.CONTACT_QUOTE_TITLE') }}</span>
    </template>
    </vuetable>
</div>	
    <vuetable-pagination ref="pagination" 
    :css="css.pagination"   
      @vuetable-pagination:change-page="onChangePage"
    ></vuetable-pagination>                                     

                    </app-card>
            </v-layout>
    </v-container>
	</div>
</template>

<script>
import api from "Api";
import { mapGetters } from "vuex";
import { Vuetable, VuetablePagination, VuetablePaginationInfo } from 'vuetable-2';
export default {
    components: {
        Vuetable,
        VuetablePagination,
        VuetablePaginationInfo,
    },
     data() {
        return {
            loading: true,
            perPage: 20,
            moreParams: {},
            httpOptions: { headers: { Authorization: 'Bearer '+localStorage.getItem('accessToken') } },
            fields: [        
                { title: this.$t('message.crm.CONTACT_ID'), name: "c_contactformate" },                
                { title: this.$t('message.crm.NAME'), name: "c_name" },
                { title: this.$t('message.crm.ADDRESS'), name: "c_address" },
                { title: this.$t('message.crm.TOTAL_INVOICES'), name: "c_invoices" },
                { title: "", name: "c_statusdropdown" },
                { title: this.$t('message.crm.STATUS'), name: "c_status" },
                { title: this.$t('message.crm.LINKED_TO_USER'), name: "c_userlink"},
                { title: "", name: "c_action" },
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
                  infoClass: 'pull-left',
                  wrapperClass: 'vuetable-pagination pull-right',
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
     statusitems: function(){
        if(this.$store.getters.currentLanguageHelpers.hasOwnProperty('contact_statuslist')){
            return this.$store.getters.currentLanguageHelpers.contact_statuslist;        
        }
        else{
            return {};
        }        
    }
   }, 
      methods: {
        onPaginationData (paginationData) {
          this.$refs.pagination.setPaginationData(paginationData)
        },
        onChangePage (page) {
          this.$refs.vuetable.changePage(page)
        },
        
        onLoading() {
          console.log('loading... show your spinner here')
        },
        onLoaded() {
          console.log('loaded! .. hide your spinner here')
        },
        transform: function(data) {
        console.log(data);
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
<style>
    .vuetable-th-slot-c_contactformate{
        width: 50px;
    }
    .vuetable-th-slot-c_name{
        width: 70px;
    }
    .vuetable-th-slot-c_address{
        width: 80px;
    }
    .vuetable-th-slot-c_address{
        width: 80px;
    }
    .vuetable-th-slot-c_invoices{
        width: 50px;
    }
    .vuetable-th-slot-c_statusdropdown{
        width: 10px;
    }
    .vuetable-th-slot-c_status{
        width: 80px;
    }
    .vuetable-th-slot-c_userlink{
        width: 10px;
    }
    .vuetable-th-slot-c_action{
        width: 10px;
    }
    .vuetable-th-slot-c_addquote{
        width: 30px;
    }
</style>