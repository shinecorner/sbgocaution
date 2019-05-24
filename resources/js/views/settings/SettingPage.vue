<template>
	<div class="pt-4">
		<!-- <page-title-bar></page-title-bar> -->
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
											:label="$t('message.general.INVOICE_DATE_FORMAT')"
											v-model="configs['crm.display_date_format']"
											:rules="form1.dateFormat"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-select v-bind:items="length_options" v-model="configs['crm.items_per_page']" :label="$t('message.general.ITEMS_PER_PAGE')"></v-select>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-select v-bind:items="robot_options" v-model="configs['crm.robots']" :label="$t('message.general.ROBOTS')"></v-select>
									</v-flex>
								</v-layout>
								<v-layout row wrap>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.general.INVOICE_NUMBER_FORMAT')"
											v-model="configs['crm.invoice_num_format']"
											:rules="form1.invoiceNumberFormat"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.general.QUOTE_NUMBER_FORMAT')"
											v-model="configs['crm.quote_num_format']"
											:rules="form1.quoteNumberFormat"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.general.CONTACT_NUMBER_FORMAT')"
											v-model="configs['crm.contact_num_format']"
											:rules="form1.contact_num_format"
											required></v-text-field>
									</v-flex>
								</v-layout>
								<v-layout row wrap>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.general.THOUSANDS')"
											v-model="configs['crm.thousands']"
											:rules="form1.thousands"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.general.DECPOINTS')"
											v-model="configs['crm.decpoint']"
											:rules="form1.decpoint"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											type="number"
											:label="$t('message.general.INVOICE_NUM_DIGITS')"
											v-model="configs['crm.invoice_number_digits']"
											:rules="form1.invoiceNumberDigits"
											required></v-text-field>
									</v-flex>
								</v-layout>
								<v-layout row wrap>
									<v-flex sm6 md4 lg4>
										<v-text-field
											type="number"
											:label="$t('message.general.DECIMALS')"
											v-model="configs['crm.decimals']"
											:rules="form1.decimals"
											required></v-text-field>
									</v-flex>
								</v-layout>
								<v-btn color="success" @click="form1Submit()">
									{{$t("message.general.SUBMIT")}}
								</v-btn>
							</v-form>
						</v-tab-item>
						<v-tab-item class="mt-3">
							<v-form v-model="form2.valid" ref="form2" lazy-validation>
								<v-layout row wrap>
									<v-flex sm6 md4 lg4>
										<v-select hide-details v-bind:items="mail_options" :label="$t('message.general.SEND_MAILS')" v-model="configs['mail.driver']"></v-select>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.general.FROM_NAME_ON_EMAILS')"
											v-model="configs['mail.from.name']"
											:rules="form2.mailFromName"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.general.FROM_EMAIL_ON_EMAILS')"
											v-model="configs['mail.from.address']"
											:rules="form2.mailFromAddress"
											required></v-text-field>
									</v-flex>
								</v-layout>
								<v-layout row wrap>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.general.REPLY_ADDRESS')"
											v-model="configs['mail.reply_to.address']"
											:rules="form2.replyToAddress"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.general.REPLY_NAME')"
											v-model="configs['mail.reply_to.name']"
											:rules="form2.replyToName"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.general.PORT')"
											v-model="configs['mail.port']"
											:rules="form2.port"
											required></v-text-field>
									</v-flex>
								</v-layout>
								<v-layout row wrap>
									<v-flex sm6 md4 lg4>
										<v-select v-bind:items="smtp_encryption" v-model="configs['mail.encryption']" :label="$t('message.general.SMTP_SECURITY')" item-text="text" item-value="value"></v-select>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.general.SMTP_USER')"
											v-model="configs['mail.username']"
											:rules="form2.username"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											type="password"
											:label="$t('message.general.SMTP_PASSWORD')"
											v-model="configs['mail.password']"
											:rules="form2.password"
											required></v-text-field>
									</v-flex>
								</v-layout>
								<v-layout row wrap>
									<v-flex sm6 md4 lg4>
										<v-switch 
											:label="$t('message.general.SMTP_AUTHENTICATION')"
											v-model="configs['mail.authentication']"
											color="success"
											value="Yes"></v-switch>
									</v-flex>
								</v-layout>
								<v-btn color="success" @click="form2Submit()">
									{{$t("message.general.SUBMIT")}}
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
			robot_options: [
				{ value: 'index, follow', text: 'Index, Follow' },
				{ value: 'noindex, follow', text: 'No Index, follow' },
				{ value: 'index, nofollow', text: 'Index, No follow' },
				{ value: 'noindex, nofollow', text: 'No index, No follow' }
			],
			mail_options: ['log','smtp'],
			length_options: ((typeof process.env.MIX_PER_PAGE_OPTIONS === 'undefined')?  ['20','25','50','100','500'] : process.env.MIX_PER_PAGE_OPTIONS.split(',')),
			smtp_encryption:[
								{ value: 'none', text: 'None' },
								{ value: 'ssl', text: 'SSL/TLS' },
								{ value: 'tls', text: 'STARTTLS' }
							],
	      	form1: {
		        valid: false,
		        dateFormat: [
		          	v => !!v || this.$t('message.validation.required', {attribute: this.$t('message.general.INVOICE_DATE_FORMAT')})
		        ],
		        contact_num_format:[
		        	v => !!v || this.$t('message.validation.required', {attribute: this.$t('message.general.CONTACT_NUMBER_FORMAT')})
		        ],
		        invoiceNumberFormat: [
		        	v => !!v || this.$t('message.validation.required', {attribute: this.$t('message.general.INVOICE_NUMBER_FORMAT')})
		        ],
		        quoteNumberFormat: [
		        	v => !!v || this.$t('message.validation.required', {attribute: this.$t('message.general.QUOTE_NUMBER_FORMAT')})
		        ],
		        invoiceNumberDigits: [
		        	v => !!v || this.$t('message.validation.required', {attribute: this.$t('message.general.INVOICE_NUM_DIGITS')})
		        ],
		        decpoint: [
		        	v => !!v || this.$t('message.validation.required', {attribute: this.$t('message.general.DECPOINTS')})
		        ],
		        thousands: [
		        	v => !!v || this.$t('message.validation.required', {attribute: this.$t('message.general.THOUSANDS')})
		        ],
		        decimals: [
		        	v => !!v || this.$t('message.validation.required', {attribute: this.$t('message.general.DECIMALS')})
		        ]
	      	},
	      	form2:{
	      		mailFromName: [
	      			v => !!v || this.$t('message.validation.required', {attribute: this.$t('message.general.FROM_NAME_ON_EMAILS')})
	      		],
	      		mailFromAddress: [
	      			v => !!v || this.$t('message.validation.required', {attribute: this.$t('message.general.FROM_EMAIL_ON_EMAILS')}),
		          	v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || this.$t('message.validation.email', {attribute: this.$t('message.general.FROM_EMAIL_ON_EMAILS')})
	      		],
	      		replyToName: [
	      			v => !!v || this.$t('message.validation.required', {attribute: this.$t('message.general.REPLY_NAME')})
	      		],
	      		replyToAddress: [
	      			v => !!v || this.$t('message.validation.required', {attribute: this.$t('message.general.REPLY_ADDRESS')}),
	      			v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || this.$t('message.validation.email', {attribute: this.$t('message.general.REPLY_ADDRESS')})
	      		],
	      		port: [
	      			v => !!v || this.$t('message.validation.required', {attribute: this.$t('message.general.PORT')})
	      		],
	      		username: [
	      			v => !!v || this.$t('message.validation.required', {attribute: this.$t('message.general.SMTP_USER')})
	      		],
	      		password: [
	      			v => !!v || this.$t('message.validation.required', {attribute: this.$t('message.general.SMTP_PASSWORD')})
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
		this.setConfigs(),
                this.$store.dispatch("setHeaderTitle", 'message.general.OPTIONS');    
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
