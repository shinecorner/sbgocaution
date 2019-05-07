<template>
	<div>
		<page-title-bar></page-title-bar>
		<v-container fluid grid-list-xl pt-0>
			<v-layout row wrap>
				<v-tabs fixed-tabs>
					<v-tab
						v-for="item in items"
						:key="item"
					>
						{{item}}
					</v-tab>
					<v-tab-item>
						<v-form v-if="configs.length">
							<v-select v-bind:items="length_options" v-model="configs[1].value" :label="$t('message.crm.ITEMS_PER_PAGE')"></v-select>
						</v-form>
					</v-tab-item>
					<v-tab-item>
						<v-form v-if="configs.length">
							<v-select hide-details v-bind:items="robot_options" v-model="configs[19].value" :label="$t('message.crm.ROBOTS')"></v-select>
						</v-form>
					</v-tab-item>
					<v-tab-item>
						<v-form v-if="configs.length">
							<v-text-field
								:label="$t('message.crm.INVOICE_DATE_FORMAT')"
								v-model="configs[0].value"
								required></v-text-field>
							<v-text-field
								:label="$t('message.crm.INVOICE_NUMBER_FORMAT')"
								v-model="configs[2].value"
								required></v-text-field>
							<v-text-field
								:label="$t('message.crm.QUOTE_NUMBER_FORMAT')"
								v-model="configs[3].value"
								required></v-text-field>
							<v-text-field
								:label="$t('message.crm.CONTACT_NUMBER_FORMAT')"
								v-model="configs[4].value"
								required></v-text-field>
							<v-text-field
								:label="$t('message.crm.INVOICE_NUM_DIGITS')"
								v-model="configs[5].value"
								required></v-text-field>
							<v-text-field
								:label="$t('message.crm.DECPOINTS')"
								v-model="configs[6].value"
								required></v-text-field>
							<v-text-field
								:label="$t('message.crm.THOUSANDS')"
								v-model="configs[7].value"
								required></v-text-field>
							<v-text-field
								:label="$t('message.crm.DECIMALS')"
								v-model="configs[8].value"
								required></v-text-field>
						</v-form>
					</v-tab-item>
					<v-tab-item>
						<v-form v-if="configs.length">
							<v-select  hide-details v-bind:items="mail_options" :label="$t('message.crm.SEND_MAILS')" v-model="configs[11].value"></v-select>
							<v-text-field
								:label="$t('message.crm.FROM_NAME_ON_EMAILS')"
								v-model="configs[9].value"
								required></v-text-field>
							<v-text-field
								:label="$t('message.crm.FROM_EMAIL_ON_EMAILS')"
								v-model="configs[10].value"
								required></v-text-field>
							<v-text-field
								:label="$t('message.crm.REPLY_ADDRESS')"
								v-model="configs[12].value"
								required></v-text-field>
							<v-text-field
								:label="$t('message.crm.REPLY_NAME')"
								v-model="configs[13].value"
								required></v-text-field>
							<v-text-field
								:label="$t('message.crm.PORT')"
								v-model="configs[14].value"
								required></v-text-field>
							<v-text-field
								:label="$t('message.crm.SMTP_SECURITY')"
								v-model="configs[15].value"
								required></v-text-field>
							<v-switch 
								:label="$t('message.crm.SMTP_AUTHENTICATION')"
								v-model="configs[16].value"
								color="success"
								value="Yes"></v-switch>
							<v-text-field
								:label="$t('message.crm.SMTP_USER')"
								v-model="configs[17].value"
								required></v-text-field>
							<v-text-field
								type="password"
								:label="$t('message.crm.SMTP_PASSWORD')"
								v-model="configs[18].value"
								required></v-text-field>
							
						</v-form>
					</v-tab-item>
				</v-tabs>
			</v-layout>
			<v-layout>
				<v-btn color="success" @click="saveConfig()">
					{{$t("message.crm.SUBMIT")}}
				</v-btn>
			</v-layout>
		</v-container>
	</div>
</template>

<script>
import { mapState, mapActions  } from "vuex";
export default {
	data() {
		return {
			items: ["Global", "General", "CRM", "Email"],
			robot_options: ['Index, Follow', 'No index, Follow', 'Index, No follow', 'No index, No follow'],
			mail_options: ['log','smtp'],
			length_options: ['5', '10', '20', '25', '30', '50', '100', '200', '500'],
		};
	},
	computed: {
		...mapState({
			configs:state => state.settings.configs
			})
	},
	created() {
		this.setConfigs()
	},
	methods: {
		...mapActions(["setConfigs", "saveConfig"])
	}
};
</script>
