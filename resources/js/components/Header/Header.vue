<!-- Header Structure -->
<template>
	<div>
		<v-navigation-drawer
			v-if="!horizontal"
			app
			fixed
			v-model="drawer"
			:mini-variant.sync="collapseSidebar"
			mini-variant-width="70"
			:width="230"
			class="Vuely-sidebar"
			:style="{backgroundImage: 'url(' + selectedSidebarBgImage.url + ')'}"
			:class="{'background-none': !backgroundImage}"
			:right="rtlLayout"
		>
			<!-- App Sidebar -->
			<app-sidebar></app-sidebar>
		</v-navigation-drawer>
		<v-toolbar 
			class="Vuely-toolbar"
			app
			:color="activeHeaderFilter.class"
			fixed
		>	
			<div class="d-custom-flex align-items-center navbar-left">
				<div v-if="!horizontal">
					<v-toolbar-side-icon icon large @click.stop="drawer = !drawer" class="v-step-0"></v-toolbar-side-icon>                                        
                                        {{$t(headerTitle)}}                                        
				</div>                                
				<div class="site-logo-wrap d-custom-flex ml-0 align-items-center" v-else>
					<router-link to="/horizontal/dashboard/ecommerce" class="grayish-blue site-logo-img">
						<img src="/static/img/site-logo.png" alt="site logo" width="100" height="30">
					</router-link>
				</div>
                                <v-divider class="mx-3" inset vertical></v-divider>
				<top-actions></top-actions>
				<!--<v-text-field flat solo prepend-icon="search" :placeholder="$t('message.search')" class="search-bar"></v-text-field>
				<div class="mobile-search d-none">
					<v-btn flat icon  small class="mobile-search-btn" @click="toggleSearchForm">
						<v-icon class="font-md">search</v-icon>
					</v-btn>
				</div>-->
			</div>
			<div class="navbar-right">
				<!--<v-btn class="v-step-2 upgrade-btn" color="primary" tag="link" @click="sidebarPath('/pages/pricing-1')">{{ $t('message.pricing') }}</v-btn>-->
				<language-provider></language-provider>
				<user></user>
			</div>
		</v-toolbar>
		<!-- Chat Searchbar -->		
		<mobile-search-form></mobile-search-form>
	</div>
</template>

<script>
import Sidebar from "../Sidebar/Sidebar.vue";
import LanguageProvider from "./LanguageProvider";
import TopActions from "./TopActions";
import User from "./User";
import MobileSearchForm from "./MobileSearchForm";
import { getCurrentAppLayout } from "Helpers/helpers";
import { mapGetters } from "vuex";

export default {
	props: {
		horizontal: {
			default: false,
			type: Boolean
		}
	},
	data() {
		return {
			collapsed: false, // collapse sidebar
			drawer: null, // sidebar drawer default true			
			sidebarImages: "", // sidebar background images
			enableDefaultSidebar: false
		};
	},
	computed: {
		...mapGetters([
			"rtlLayout",
			"backgroundImage",
			"backgroundImage",
			"selectedSidebarBgImage",
			"darkMode",
			"collapseSidebar",
			"activeHeaderFilter",
                        "headerTitle"
		])
	},
	methods: {
		// toggle full screen method
		
		sidebarPath(link){
			this.$store.dispatch('setActiveMenuGroup',{ pathURL: link });
			this.$router.push(this.getMenuLink(link));
		},
		getMenuLink(link) {
			return "/" + getCurrentAppLayout(this.$router) + link;
		},
			toggleSearchForm() {
				this.$store.dispatch('toggleSearchForm');
		}
	},
	components: {
		appSidebar: Sidebar,		
		LanguageProvider,			
		MobileSearchForm,
		User,
                TopActions
	}
};
</script>
