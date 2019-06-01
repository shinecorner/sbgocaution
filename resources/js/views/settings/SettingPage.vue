<template>
	<div class="pt-4">
		<!-- <page-title-bar></page-title-bar> -->
		<v-container fluid grid-list-xl pt-0>
                        <v-layout row wrap>
				<app-card colClasses="xs12 md12">					
					<v-tabs
				    left
				    color="cyan"
				    dark
				    icons-and-text
				  >
				    <v-tabs-slider color="yellow"></v-tabs-slider>

				    <v-tab v-for="(icon, index) in tabItems" :href="'#tab-'+index" :key="index">
				      {{icon.text}}
				      <v-icon>{{icon.icon}}</v-icon>
				    </v-tab>

				    <v-tab-item
				      v-for="(icon,index) in tabItems"
				      :value="'tab-' + index"
				      :key="index"
				    >
				      <v-card flat>
				        <v-card-text>
                                            <v-form @submit.prevent="validateForm('crm')" data-vv-scope="crm" v-if="index=='crm'" ref="crm">
                                                <v-layout row wrap>
                                                        <v-flex sm6 md4 lg4>
                                                                <v-text-field
                                                                        :label="$t('message.setting.INVOICE_DATE_FORMAT')"
                                                                        :data-vv-as="$t('message.setting.INVOICE_DATE_FORMAT')"
                                                                        v-model="configs['crm.display_date_format']"
                                                                        data-vv-name="display_date_format"
                                                                        v-validate="'required'"
                                                                        :error="errors.has('crm.display_date_format')"
                                                                        required></v-text-field>
                                                        </v-flex>
                                                        <v-flex sm6 md4 lg4>
                                                                <v-select v-bind:items="length_options" v-model="configs['crm.items_per_page']" :label="$t('message.setting.ITEMS_PER_PAGE')"></v-select>
                                                        </v-flex>
                                                        <v-flex sm6 md4 lg4>
                                                                <v-text-field
                                                                        type="number"
                                                                        :label="$t('message.setting.DECIMALS')"
                                                                        v-model="configs['crm.decimals']"
                                                                        :data-vv-as="$t('message.setting.DECIMALS')"
                                                                        data-vv-name="decimals"
                                                                        v-validate="'required'"
                                                                        :error="errors.has('crm.decimals')"
                                                                        required></v-text-field>
                                                        </v-flex>
                                                </v-layout>
                                                <v-layout row wrap>
                                                        <v-flex sm6 md4 lg4>
                                                                <v-text-field
                                                                        :label="$t('message.setting.INVOICE_NUMBER_FORMAT')"
                                                                        v-model="configs['crm.invoice_num_format']"
                                                                        :data-vv-as="$t('message.setting.INVOICE_NUMBER_FORMAT')"
                                                                        data-vv-name="invoice_num_format"
                                                                        v-validate="'required'"
                                                                        :error="errors.has('crm.invoice_num_format')"
                                                                        required></v-text-field>
                                                        </v-flex>
                                                        <v-flex sm6 md4 lg4>
                                                                <v-text-field
                                                                        :label="$t('message.setting.QUOTE_NUMBER_FORMAT')"
                                                                        v-model="configs['crm.quote_num_format']" 
                                                                        :data-vv-as="$t('message.setting.QUOTE_NUMBER_FORMAT')"
                                                                        data-vv-name="quote_num_format"
                                                                        v-validate="'required'"
                                                                        :error="errors.has('crm.quote_num_format')"
                                                                        required></v-text-field>
                                                        </v-flex>
                                                        <v-flex sm6 md4 lg4>
                                                                <v-text-field
                                                                        :label="$t('message.setting.CONTACT_NUMBER_FORMAT')"
                                                                        v-model="configs['crm.contact_num_format']"
                                                                        :data-vv-as="$t('message.setting.CONTACT_NUMBER_FORMAT')"
                                                                        data-vv-name="contact_num_format"
                                                                        v-validate="'required'"
                                                                        :error="errors.has('crm.contact_num_format')"
                                                                        required></v-text-field>
                                                        </v-flex>
                                                </v-layout>
                                                <v-layout row wrap>
                                                        <v-flex sm6 md4 lg4>
                                                                <v-text-field
                                                                        :label="$t('message.setting.THOUSANDS')"
                                                                        v-model="configs['crm.thousands']"
                                                                        :data-vv-as="$t('message.setting.THOUSANDS')"
                                                                        data-vv-name="thousands"
                                                                        v-validate="'required'"
                                                                        :error="errors.has('crm.thousands')"
                                                                        required></v-text-field>
                                                        </v-flex>
                                                        <v-flex sm6 md4 lg4>
                                                                <v-text-field
                                                                        :label="$t('message.setting.DECPOINTS')"
                                                                        v-model="configs['crm.decpoint']"
                                                                        :data-vv-as="$t('message.setting.DECPOINTS')"
                                                                        data-vv-name="decpoint"
                                                                        v-validate="'required'"
                                                                        :error="errors.has('crm.decpoint')"
                                                                        required></v-text-field>
                                                        </v-flex>
                                                        <v-flex sm6 md4 lg4>
                                                                <v-text-field
                                                                        type="number"
                                                                        :label="$t('message.setting.INVOICE_NUM_DIGITS')"
                                                                        v-model="configs['crm.invoice_number_digits']"
                                                                        :data-vv-as="$t('message.setting.INVOICE_NUM_DIGITS')"
                                                                        data-vv-name="invoice_number_digits"
                                                                        v-validate="'required'"
                                                                        :error="errors.has('crm.invoice_number_digits')"
                                                                        required></v-text-field>
                                                        </v-flex>
                                                </v-layout>
                                                <v-btn type="submit" color="success">
                                                        {{$t("message.general.SUBMIT")}}
                                                </v-btn>
                                            </v-form>
                                            <v-form @submit.prevent="validateForm('email')" data-vv-scope="email" v-if="index=='email'" ref="email">
								<v-layout row wrap>
									<v-flex sm6 md4 lg4>
										<v-select hide-details v-bind:items="mail_options" :label="$t('message.setting.SEND_MAILS')" v-model="configs['mail.driver']"></v-select>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.setting.FROM_NAME_ON_EMAILS')"
											v-model="configs['mail.from.name']"
                                                                                        :data-vv-as="$t('message.setting.FROM_NAME_ON_EMAILS')"
                                                                                        data-vv-name="from_name"
                                                                                        v-validate="'required'"
                                                                                        :error="errors.has('email.from_name')"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.setting.FROM_EMAIL_ON_EMAILS')"
											v-model="configs['mail.from.address']"
                                                                                        :data-vv-as="$t('message.setting.FROM_EMAIL_ON_EMAILS')"
                                                                                        data-vv-name="from_address"
                                                                                        v-validate="'required|email'"
                                                                                        :error="errors.has('email.from_address')"
											required></v-text-field>
									</v-flex>
								</v-layout>
								<v-layout row wrap>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.setting.REPLY_ADDRESS')"
											v-model="configs['mail.reply_to.address']"
                                                                                        :data-vv-as="$t('message.setting.REPLY_ADDRESS')"
                                                                                        data-vv-name="reply_to_address"
                                                                                        v-validate="'required|email'"
                                                                                        :error="errors.has('email.reply_to_address')"
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.setting.REPLY_NAME')"
											v-model="configs['mail.reply_to.name']"
                                                                                        :data-vv-as="$t('message.setting.REPLY_NAME')"
                                                                                        data-vv-name="reply_to_name"
                                                                                        v-validate="'required'"
                                                                                        :error="errors.has('email.reply_to_name')"											
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.setting.PORT')"
											v-model="configs['mail.port']"
                                                                                        :data-vv-as="$t('message.setting.PORT')"
                                                                                        data-vv-name="port"
                                                                                        v-validate="'required'"
                                                                                        :error="errors.has('email.port')"	
											required></v-text-field>
									</v-flex>
								</v-layout>
								<v-layout row wrap>
									<v-flex sm6 md4 lg4>
										<v-select v-bind:items="smtp_encryption" v-model="configs['mail.encryption']" :label="$t('message.setting.SMTP_SECURITY')" item-text="text" item-value="value"></v-select>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											:label="$t('message.setting.SMTP_USER')"
											v-model="configs['mail.username']"
                                                                                        :data-vv-as="$t('message.setting.SMTP_USER')"
                                                                                        data-vv-name="username"
                                                                                        v-validate="'required'"
                                                                                        :error="errors.has('email.username')"											
											required></v-text-field>
									</v-flex>
									<v-flex sm6 md4 lg4>
										<v-text-field
											type="password"
											:label="$t('message.setting.SMTP_PASSWORD')"
											v-model="configs['mail.password']"
                                                                                        :data-vv-as="$t('message.setting.SMTP_PASSWORD')"
                                                                                        data-vv-name="password"
                                                                                        v-validate="'required'"
                                                                                        :error="errors.has('email.password')"
											required></v-text-field>
									</v-flex>
								</v-layout>
								<v-layout row wrap>
									<v-flex sm6 md4 lg4>
										<v-switch 
											:label="$t('message.setting.SMTP_AUTHENTICATION')"
											v-model="configs['mail.authentication']"
											color="success"
											value="Yes"></v-switch>
									</v-flex>
								</v-layout>
								<v-btn type="submit" color="success">
									{{$t("message.general.SUBMIT")}}
								</v-btn>
							</v-form>
                                        </v-card-text>
				      </v-card>
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
                        text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat",
			tabItems: {
                                "crm": {
					icon: "zmdi zmdi-group",
					text: "CRM"
				},
				"email": {
					icon: "zmdi zmdi-email",
					text: "Email"
				}				
                        },                        
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
                        ]	      	
		}
	},
	computed: {
		...mapState({
			configs:state => state.settings.configs
			})
	},
	created() {
		this.setConfigs(),
                this.$store.dispatch("setHeaderTitle", 'message.setting.OPTIONS');    
	},
	methods: {
		...mapActions(["setConfigs", "saveConfig"]),
		validateForm(scope) {                
                this.$validator.validateAll(scope).then((result) => {                    
                  if (result) {
                    this.saveConfig();
                  }
                  else{
                    let msgHTML = '';
                    _.forOwn(this.$validator.errors.all(scope), function(msg, key) { 
                        msgHTML += ('<li>' + msg + '<\/li>')
                    });            
                    Vue.prototype.$eventHub.$emit('fireError', '<ul>' + msgHTML + '<\/ul>');
                    return;
                  }
                });
            }
	}
};
</script>
