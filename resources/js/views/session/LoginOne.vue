<template>
	<div class="session-wrapper">
		<div class="session-left">
			<!--<session-slider-widget></session-slider-widget>-->
		</div>                 
		<div class="session-right text-xs-center">
			<div class="session-table-cell">
				<div class="session-content">
					<img 
						:src="appLogo"
						class="img-responsive mb-3" 						
					/>					
					<p class="fs-14">{{$t('message.login.LOGIN_TITLE')}}</p>
					<v-form v-model="valid" class="mb-4">
						<v-text-field 
							:label="$t('message.general.EMAIL')" 
							v-model="email" 
							:rules="emailRules" 
							required
						></v-text-field>
						<v-text-field 
							:label="$t('message.login.PASSWORD')" 
							v-model="password" 
							type="password" 
							:rules="passwordRules" 
							required
						></v-text-field>
                                               <v-select                                                    
                                                    :label="$t('message.login.LANGUAGE')"
                                                    :items="languageItems"
                                                    v-model="fetchLanguage"
                                                    item-text="name"
                                                    item-value="locale"                                                                                                                                             
                                                    @change="changeLanguageByCode"
                                                  >
                                                    <template slot="selection" slot-scope="data">
                                                      <v-flex xs1>                                                        
                                                        <img :src="data.item.flag"/>                                                        
                                                      </v-flex>
                                                      <v-flex class='ml-1'>
                                                        {{ data.item.name }}
                                                      </v-flex>
                                                    </template>
                                                    <template slot="item" slot-scope="data">                                                      
                                                        <v-flex xs1>
                                                            <img :src="data.item.flag" />
                                                        </v-flex>    
                                                        <v-flex class='ml-1'>
                                                            <v-list-tile-content>
                                                              <v-list-tile-title v-html="data.item.name"></v-list-tile-title>
                                                            </v-list-tile-content>
                                                        </v-flex>    
                                                    </template>
                                                  </v-select>
						<v-checkbox 
							color="primary" 
							:label="$t('message.login.COM_USERS_LOGIN_REMEMBER_ME')" 
                                                        class="rememberme"
							v-model="checkbox"
						></v-checkbox>
						<!--<router-link class="mb-1" to="/session/forgot-password">{{$t('message.login.COM_USERS_LOGIN_RESET')}}?</router-link>-->
						<div>						
                                                    <v-btn large @click="signInWithLaravelPassport" block color="primary">{{$t('message.login.LOGIN')}}</v-btn>
						</div>						
					</v-form>					
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import firebase from "firebase/app";
import { mapGetters } from "vuex";
import SessionSliderWidget from "Components/Widgets/SessionSlider";
import AppConfig from "Constants/AppConfig";

import AuthService from "../../auth/AuthService";

const auth = new AuthService();
const { login, logout, authenticated, authNotifier } = auth;

export default {
  components: {
    SessionSliderWidget
  },
  data() {
    return {
      checkbox: false,
      valid: false,      
      email: "",
      emailRules: [
        v => !!v || this.$t('message.validation.required',{attribute: this.$t('message.login.EMAIL')}),
        v =>
          /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) ||
          this.$t('message.validation.invalid',{attribute: this.$t('message.login.EMAIL')})
      ],
      password: "",
      passwordRules: [v => !!v || this.$t('message.validation.required',{attribute: this.$t('message.login.PASSWORD')})],
      appLogo: AppConfig.appLogo2,
      brand: AppConfig.brand,
      fetchLanguage: localStorage.getItem('selectedLocale') || 'de',
      languageItems: [
             { name: this.$t('message.login.DE'), locale: 'de', flag: '/static/flag-icons/de.png' },
             { name: this.$t('message.login.FR'), locale: 'fr', flag: '/static/flag-icons/fr.png' },
             { name: this.$t('message.login.IT'), locale: 'it', flag: '/static/flag-icons/it.png' },
             { name: this.$t('message.login.EN'), locale: 'en', flag: '/static/flag-icons/en.png' },                          
        ]
    };
  },
    computed: {
		...mapGetters(["selectedLocale", "languages"])
    },
  methods: {
    submit() {
      const user = {
        email: this.email,
        password: this.password,
        lang: this.fetchLanguage
      };
      this.$store.dispatch("signinUserInFirebase", {
        user
      });
    },
    signInWithLaravelPassport(){
        const user = {
        email: this.email,
        password: this.password,
        lang: this.fetchLanguage
      };
      if('lang' in user){
            this.changeLanguageByCode(user.lang);
      }      
      this.$store.dispatch("signInWithLaravelPassport", {
        user
      });
    },   
    onCreateAccount() {
      this.$router.push("/session/sign-up");
    },   
    changeLanguageByCode(languagecode) {
        this.$i18n.locale = languagecode;                
        this.$store.dispatch("changeLanguage", languagecode);
    }
            }
};
</script>
<style scoped>    
    .rememberme >>> .v-label{
            top: 4px;
        }    
</style>
