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
      ],
      items: []
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