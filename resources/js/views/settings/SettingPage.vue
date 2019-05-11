<template>
	<div>
		<page-title-bar></page-title-bar>
		<v-container fluid grid-list-xl pt-0>
			<v-layout row wrap>
				<app-card colClasses="xs12 md12" customClasses="mb-30">
					<v-tabs>
						<v-tab
							v-for="item in items"
							:key="item"
						>
							{{item}}
						</v-tab>
						<v-tab-item class="mt-3">
							<v-form v-model="form1.valid" ref="form1" lazy-validation>
								<v-layout row wrap>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.crm.INVOICE_DATE_FORMAT')"
											v-model="configs['crm.display_date_format']"
											:rules="form1.dateFormat"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.crm.CONTACT_NUMBER_FORMAT')"
											v-model="configs['crm.contact_num_format']"
											:rules="form1.contact_num_format"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.crm.INVOICE_NUMBER_FORMAT')"
											v-model="configs['crm.invoice_num_format']"
											:rules="form1.invoiceNumberFormat"
											required></v-text-field>
									</v-flex>
								</v-layout>
								<v-layout row wrap>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.crm.QUOTE_NUMBER_FORMAT')"
											v-model="configs['crm.quote_num_format']"
											:rules="form1.quoteNumberFormat"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											type="number"
											:label="$t('message.crm.INVOICE_NUM_DIGITS')"
											v-model="configs['crm.invoice_number_digits']"
											:rules="form1.invoiceNumberDigits"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.crm.DECPOINTS')"
											v-model="configs['crm.decpoint']"
											:rules="form1.decpoint"
											required></v-text-field>
									</v-flex>
								</v-layout>
								<v-layout row wrap>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.crm.THOUSANDS')"
											v-model="configs['crm.thousands']"
											:rules="form1.thousands"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-select v-bind:items="length_options" v-model="configs['crm.items_per_page']" :label="$t('message.crm.ITEMS_PER_PAGE')"></v-select>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-select v-bind:items="robot_options" v-model="configs['crm.robots']" :label="$t('message.crm.ROBOTS')"></v-select>
									</v-flex>
								</v-layout>
								<v-btn color="success" @click="form1Submit()">
									{{$t("message.crm.SUBMIT")}}
								</v-btn>
							</v-form>
						</v-tab-item>
						<v-tab-item class="mt-3">
							<v-form v-model="form2.valid" ref="form2" lazy-validation>
								<v-layout row wrap>
									<v-flex sm6 md4 lg4>
										<v-select hide-details v-bind:items="mail_options" :label="$t('message.crm.SEND_MAILS')" v-model="configs['mail.driver']"></v-select>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.crm.FROM_NAME_ON_EMAILS')"
											v-model="configs['mail.from.name']"
											:rules="form2.mailFromName"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.crm.FROM_EMAIL_ON_EMAILS')"
											v-model="configs['mail.from.address']"
											:rules="form2.mailFromAddress"
											required></v-text-field>
									</v-flex>
								</v-layout>
								<v-layout row wrap>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.crm.REPLY_ADDRESS')"
											v-model="configs['mail.reply_to.address']"
											:rules="form2.replyToAddress"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.crm.REPLY_NAME')"
											v-model="configs['mail.reply_to.name']"
											:rules="form2.replyToName"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.crm.PORT')"
											v-model="configs['mail.port']"
											:rules="form2.port"
											required></v-text-field>
									</v-flex>
								</v-layout>
								<v-layout row wrap>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.crm.SMTP_SECURITY')"
											v-model="configs['mail.encryption']"
											:rules="form2.encryption"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.crm.SMTP_USER')"
											v-model="configs['mail.username']"
											:rules="form2.username"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											type="password"
											:label="$t('message.crm.SMTP_PASSWORD')"
											v-model="configs['mail.password']"
											:rules="form2.password"
											required></v-text-field>
									</v-flex>
								</v-layout>
								<v-layout row wrap>
									<v-flex sm6 md4 lg4>
										<v-switch 
											:label="$t('message.crm.SMTP_AUTHENTICATION')"
											v-model="configs['mail.authentication']"
											color="success"
											value="Yes"></v-switch>
									</v-flex>
								</v-layout>
								<v-btn color="success" @click="form2Submit()">
									{{$t("message.crm.SUBMIT")}}
								</v-btn>
							</v-form>
						</v-tab-item>
					</v-tabs>
				</app-card>
			</v-layout>
		</v-container>
	</div>
</template>

<script>
import { mapState, mapActions  } from "vuex";
export default {
	data() {
		return {
			items: ["CRM", "Email"],
			robot_options: ['index, follow', 'noindex, follow', 'index, nofollow', 'noindex, nofollow'],
			mail_options: ['log','smtp'],
			length_options: ['5', '10', '20', '25', '30', '50', '100', '200', '500'],
	      	form1: {
		        valid: false,
		        dateFormat: [
		          	v => !!v || "Date Format is required"
		        ],
		        contact_num_format:[
		        	v => !!v || "Contact Number Format is required"
		        ],
		        invoiceNumberFormat: [
		        	v => !!v || "Invoice Number Format is required"
		        ],
		        quoteNumberFormat: [
		        	v => !!v || "Quote Number Format is required"
		        ],
		        contactNumberFormat: [
		        	v => !!v || "Contact Number Format is required"
		        ],
		        invoiceNumberDigits: [
		        	v => !!v || "Invoice Number Digits is required"
		        ],
		        decpoint: [
		        	v => !!v || "Decpoint is required"
		        ],
		        thousands: [
		        	v => !!v || "Thousands is required"
		        ],
		        decimals: [
		        	v => !!v || "Decimals is required"
		        ]
	      	},
	      	form2:{
	      		mailFromName: [
	      			v => !!v || "Mail from name is required"
	      		],
	      		mailFromAddress: [
	      			v => !!v || "Mail from address is required",
		          	v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || "E-mail must be valid"
	      		],
	      		replyToName: [
	      			v => !!v || "Reply to name is required"
	      		],
	      		replyToAddress: [
	      			v => !!v || "Reply to address is required",
	      			v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || "E-mail must be valid"
	      		],
	      		port: [
	      			v => !!v || "Port is required"
	      		],
	      		encryption: [
	      			v => !!v || "Encryption is required"
	      		],
	      		username: [
	      			v => !!v || "Username is required"
	      		],
	      		password: [
	      			v => !!v || "Password is required"
	      		],
	      		
	      	}
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
		...mapActions(["setConfigs", "saveConfig"]),
		form1Submit(){
			if (this.$refs.form1.validate()) {
				this.saveConfig();
			}
		},
		form2Submit(){
			if (this.$refs.form2.validate()) {
				this.saveConfig();
			}
		}
	}
};
</script>
