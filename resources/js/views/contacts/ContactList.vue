<template>
	<div>
		<page-title-bar></page-title-bar>
		<app-section-loader :status="loader"></app-section-loader>
		<v-container fluid grid-list-xl py-0>
			<v-layout row wrap>
				<app-card
					:heading="$t('message.crm.CONTACTS')"
					:fullBlock="true"
					colClasses="xl12 lg12 md12 sm12 xs12"
				>
					<v-data-table
						:headers="headers"
						:items="items"
						:search="search"
						v-model="selected"
						item-key="id"
						select-all
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
						<td width="5%">
							<v-checkbox
								color="primary"
								hide-details
								v-model="props.selected"
							></v-checkbox>
						</td>
						<td>
                                                    {{ props.item.contact_formate }}
                                                    <br />   
                                                    <span class="grey--text fs-12 fw-normal mb-2 d-block">{{ props.item.date }}</span>
                                                    <v-tooltip top v-if="props.item.is_duplicate">
                                                        <i class="ti-layout-accordion-merged" slot="activator"></i>
                                                        <span>{{props.item.is_duplicate}}</span>
                                                    </v-tooltip>
                                                    <v-tooltip top v-if="props.item.rc_quote">
                                                        <i class="ti-check" slot="activator"></i>
                                                        <span>{{$t('message.crm.RC_QUOTE_TOOLTIP')}}</span>
                                                    </v-tooltip>
                                                    <v-tooltip top v-if="props.item.lead_source">
                                                        <i class="ti-headphone" slot="activator"></i>
                                                        <span>{{$t('message.crm.CALL_LEAD_SOURCE_TOOLTIP')}}</span>
                                                    </v-tooltip>
                                                    <v-tooltip top v-if="props.item.Send_Offer_By == 'post'">
                                                        <i class="ti-headphone" slot="activator"></i>
                                                        <span>{{$t('message.crm.CALL_LEAD_SOURCE_TOOLTIP')}}</span>
                                                    </v-tooltip>
                                                    <v-tooltip top v-if="props.item.language">
                                                        <img :src="'/static/flag-icons/'+props.item.language+'.png'" class="img-responsive" slot="activator"/>                                                        
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
                                                   <v-menu
                                                    offset-y
                                                    content-class="dropdown-menu"
                                                    transition="slide-y-transition">    
                                                    <v-icon medium slot="activator">zmdi-caret-down-circle</v-icon>
                                                    <v-card>
                                                      <v-list dense>
                                                        <v-list-tile
                                                          v-for="statusitem in statusitems"
                                                          :key="$t(statusitem.state)"
                                                        >
                                                          <v-list-tile-title
                                                            v-text="$t(statusitem.state)"
                                                          />
                                                        </v-list-tile>
                                                      </v-list>
                                                    </v-card>
                                                  </v-menu>
                                                </td>                                                
                                                <td>
                                                    <span class="grey--text fs-12 fw-normal d-block">
                                                        <v-chip small dark color="orange" text-color="white">{{$t('message.crm.WAITING_FOR_PROCESSING')}}</v-chip>
                                                    </span>
                                                    <span class="grey--text fs-12 fw-normal d-block"><v-chip small dark color="orange" text-color="white">1</v-chip></span>
                                                    <span class="grey--text fs-12 fw-normal d-block"><v-chip small dark color="orange" text-color="white">1</v-chip></span>                                                    
                                                </td>
                                                <td width="5%">
                                                    0
                                                </td>
                                                <td width="5%">
                                                   <v-menu
                                                    offset-y
                                                    content-class="dropdown-menu"
                                                    transition="slide-y-transition">    
                                                    <v-icon medium slot="activator">zmdi-caret-down-circle</v-icon>
                                                    <v-card>
                                                      <v-list dense>
                                                        <v-list-tile
                                                          v-for="statusitem in statusitems"
                                                          :key="statusitem.state"
                                                        >
                                                          <v-list-tile-title
                                                            v-text="statusitem.state"
                                                          />
                                                        </v-list-tile>
                                                      </v-list>
                                                    </v-card>
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

export default {
  data() {
    return {
      loader: true,
      search: "",
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
      items: [],
      statusitems: [
          { state: 'message.crm.NEW' },
          { state: 'message.crm.OFFER' },
          { state: 'message.crm.IN_CLARIFICATION' },
          { state: 'message.crm.PENDING' },
          { state: 'message.crm.ACCEPTED' },
          { state: 'message.crm.PRE_CONFIRMATION_PENDING' },
          { state: 'message.crm.PRE_CONFIRMATION_SENT' },
          { state: 'message.crm.CANCELLED' },
          { state: 'message.crm.REJECTED' },
          { state: 'message.crm.DISSOLVED_IMMEDIATELY' },
          { state: 'message.crm.STATUS_RESOLVED' },
          { state: 'message.crm.STATUS_QUOTE_WAITING' },

        ],
      currentStatus : { state: 'Florida', abbr: 'FL' }
    };
  },
  mounted() {
    this.getTablesData();
  },
  methods: {
    getTablesData() {
      api
        .get("api/contacts")
        .then(response => {         
          this.loader = false;
          this.items = response.data.data;
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>