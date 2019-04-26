<template>
	<div class="contactList">
		<page-title-bar></page-title-bar>
		<app-section-loader :status="loading"></app-section-loader>
		<v-container fluid grid-list-xl py-0>
			<v-layout row wrap>
				<app-card
					:heading="$t('message.crm.CONTACTS')"
					:fullBlock="true"
					colClasses="xl12 lg12 md12 sm12 xs12"
				>
					<v-data-table
						:headers="headers"
						:items="contacts"
                                                :pagination.sync="pagination"
                                                :total-items="totalContacts"
                                                :loading="loading"												
						item-key="id"
                                                rows-per-page-text=""
                                                :rows-per-page-items="[]"						
					>                                        
					<template slot="headerCell" slot-scope="props">
						<v-tooltip top>
							<span slot="activator">
								{{ $t(props.header.text) }}
							</span>
							<span>
								{{ $t(props.header.text) }}
							</span>
						</v-tooltip>
					</template>
					<template slot="items" slot-scope="props">						
						<td>
                                                    {{ props.item.contact_formate }}
                                                    <br />   
                                                    <span class="grey--text fs-12 fw-normal mb-2 d-block">{{ props.item.date }}</span>
                                                    <v-tooltip top v-if="props.item.is_duplicate">
                                                        <i class="ti-layout-accordion-merged" slot="activator"></i>
                                                        <span>{{props.item.is_duplicate}}</span>
                                                    </v-tooltip>
                                                    <v-tooltip top v-if="props.item.duplicateEmail">
                                                        <i class="ti-email" slot="activator"></i>
                                                        <span>{{props.item.duplicateEmail}}</span>
                                                    </v-tooltip>
                                                    <v-tooltip top v-if="props.item.rc_quote">
                                                        <i class="ti-check" slot="activator"></i>
                                                        <span>{{$t('message.crm.RC_QUOTE_TOOLTIP')}}</span>
                                                    </v-tooltip>
                                                    <v-tooltip top v-if="props.item.call_lead_source">
                                                        <i class="ti-headphone" slot="activator"></i>
                                                        <span>{{$t('message.crm.CALL_LEAD_SOURCE_TOOLTIP')}}</span>
                                                    </v-tooltip>
                                                    <v-tooltip top v-if="props.item.send_offer_by_post">
                                                        <i class="ti-headphone" slot="activator"></i>
                                                        <span>{{$t('message.crm.CALL_LEAD_SOURCE_TOOLTIP')}}</span>
                                                    </v-tooltip>
                                                    <v-tooltip top v-if="props.item.language_flag">
                                                        <img :src="props.item.language_flag" class="img-responsive" slot="activator"/>
                                                        <span>{{props.item.language}}</span>
                                                    </v-tooltip>
                                                </td>
						<td>
                                                    {{ props.item.nachname }} {{ props.item.vorname }}
                                                    <span v-if="props.item.company_name" class="grey--text fs-12 fw-normal d-block">{{ props.item.company_name }}</span>
                                                    <span v-if="props.item.anrede" class="grey--text fs-12 fw-normal d-block">{{ props.item.anrede }}</span>
                                                </td>
                                                <td>
                                                    <span class="grey--text fs-12 fw-normal">{{ props.item.address }}</span>
                                                     <br />
                                                    {{ props.item.plz }} {{ props.item.ort }}                                                    
                                                </td>
                                                <td>
                                                    {{ 'CHF 94.50' }}
                                                    <span v-if="props.item.company_name" class="grey--text fs-12 fw-normal d-block">1 {{ $t('message.crm.CONTACT_QUOTE_TITLE') }}</span>
                                                    <span v-if="props.item.anrede" class="grey--text fs-12 fw-normal d-block">1 {{ $t('message.crm.TOTAL_INVOICES') }}</span>
                                                </td>
                                                <td width="5%">
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
                                                </td>                                                
                                                <td>
                                                    <span class="grey--text fs-12 fw-normal d-block">
                                                        <v-chip small dark :class="props.item.status_class" text-color="white">{{props.item.status}}</v-chip>
                                                    </span>
                                                    <span class="grey--text fs-12 fw-normal d-block"><v-chip small dark color="orange" text-color="white">1</v-chip></span>
                                                    <span class="grey--text fs-12 fw-normal d-block"><v-chip small dark color="orange" text-color="white">1</v-chip></span>                                                    
                                                </td>
                                                <td width="5%">
                                                    0
                                                </td>
                                                <td width="5%">
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
                                                </td>
                                                <td width="5%">
                                                    <v-icon medium>zmdi-plus</v-icon>
                                                    <span class="grey--text fs-12 fw-normal d-block">{{ $t('message.crm.CONTACT_QUOTE_TITLE') }}</span>
                                                </td>
					</template>                                        
					</v-data-table>                                        
				</app-card>
			</v-layout>
		</v-container>
	</div>
</template>

<script>
import api from "Api";
import { mapGetters } from "vuex";
export default {
  data() {
    return {
      loading: true,
      totalContacts: 0,
      pagination: {},      
      contacts: [],      
      selected: [],
      headers: [        
        { text: 'message.crm.CONTACT_ID', value: "id", sortable: false },
        { text: 'message.crm.NAME', value: "vorname", sortable: false },
        { text: 'message.crm.ADDRESS', value: "address", sortable: false },
        { text: 'message.crm.TOTAL_INVOICES', value: "", sortable: false },
        { text: '', value: "", sortable: false },
        { text: 'message.crm.STATUS', value: "", sortable: false },
        { text: 'message.crm.LINKED_TO_USER', value: "", sortable: false },        
        { text: '', value: "", sortable: false },
        { text: '', value: "", sortable: false },
      ],               
    };
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
  watch: {
      pagination: {
        handler () {          
          this.getDataFromApi(this.pagination.page,'watcher')
            .then(data => {
              this.contacts = data.data;
              this.totalContacts = data.meta.total;
              this.pagination.totalItems= data.meta.total;
              this.pagination.rowsPerPage = data.meta.per_page;
              this.pagination.page = data.meta.current_page;
              this.loading = false;
            })
        },
        deep: true
      }
    },
    mounted () {
      this.getDataFromApi(this.pagination.page,'mounted')
        .then(data => {
          this.contacts = data.data;
          this.totalContacts = data.meta.total;
          this.loading = false;
        })
    },
    methods: {
      getDataFromApi (fetchpage, state) {
        this.loading = true;
        return new Promise(function(resolve, reject) {
            api.get("api/contacts").then(response => {                
                resolve(response.data);
            }).catch(error => {
                console.log(error);
                reject(error);                
            });
        });
      }
    }  
};
</script>
<style scoped>
.contactList >>> .v-list__tile{
    height: 30px;
    font-size: 13px;
}
</style>