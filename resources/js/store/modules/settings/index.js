/**
 * Settings Module
 */
import Vue from 'vue'
import api from 'Api'
import {
	languages,
	sidebarBackgroundImages,
	sidebarFilters,
	routerAnimations,
	themes,
	headerFilters
} from "./data";
//console.log(localStorage);
const state = {
	darkMode: false,                                       // dark mode
	collapseSidebar: false,                                // mini sidevar
	rtlLayout: false,                                    // rtl layout
	backgroundImage: false,                                // enable sidebar background image
	horizontalLayoutSidebar: false,                        // horizontal layout sidebar
	languages,                                             // languages
	selectedLocale: localStorage.getItem('selectedLocale') || 'de', //selected locale
        serverHelpers: localStorage.getItem('serverHelpers') || "{}",
        currentLanguageHelpers: "{}",
	sidebarBackgroundImages,                               // sidebar backgorund images
	selectedSidebarBgImage: sidebarBackgroundImages[0],    // selected sidebar background image
	sidebarFilters,                                        // sidebar filters
	sidebarSelectedFilter: sidebarFilters[0],              // selected sidebar filter
	routerAnimations,                                      // router animations
	selectedRouterAnimation: routerAnimations[0],          // selected router animation
	themes,                                                // themes
	selectedTheme: themes[0],                              // selected theme
	headerFilters,                                         // header filters
	activeHeaderFilter: headerFilters[1],                  // selected header filter
	mobileSearchForm: false,								   // Is Mobile Search Form Open
        headerTitle: "",
	configs: []
}

// getters
const getters = {
        serverHelpers: state => {                
            return JSON.parse(state.serverHelpers);
	},
        currentLanguageHelpers: (state, getters) => {            
            if(_.isEmpty(getters.serverHelpers)){
                return JSON.parse("{}");
            }
            else{
                return getters.serverHelpers[state.selectedLocale];
            }            
	},
	darkMode: state => {
		return state.darkMode;
	},
	collapseSidebar: state => {
		return state.collapseSidebar;
	},
	boxLayout: state => {
		return state.boxLayout;
	},
	rtlLayout: state => {
		return state.rtlLayout;
	},
        headerTitle: state => {
		return state.headerTitle;
	},
	backgroundImage: state => {
		return state.backgroundImage;
	},
	selectedLocale: state => {
		return state.selectedLocale;
	},
	languages: state => {
		return state.languages;
	},
	sidebarBackgroundImages: state => {
		return state.sidebarBackgroundImages;
	},
	selectedSidebarBgImage: state => {
		return state.selectedSidebarBgImage;
	},
	sidebarFilters: state => {
		return state.sidebarFilters;
	},
	sidebarSelectedFilter: state => {
		return state.sidebarSelectedFilter;
	},
	selectedRouterAnimation: state => {
		return state.selectedRouterAnimation;
	},
	routerAnimations: state => {
		return state.routerAnimations;
	},
	themes: state => {
		return state.themes;
	},
	selectedTheme: state => {
		return state.selectedTheme;
	},
	headerFilters: state => {
		return state.headerFilters;
	},
	activeHeaderFilter: state => {
		return state.activeHeaderFilter;
	},
	horizontalLayoutSidebar: state => {
		return state.horizontalLayoutSidebar;
	},
	mobileSearchForm: state => {
		return state.mobileSearchForm;
	}
}

// actions
const actions = {
    setServerHelpers(context, payload) {           
        context.commit('serverHelpersHandler', payload);            
	},        
	darkModeHandler(context) {
		context.commit('darkModeHandler');
	},
        setHeaderTitle(context,payload) {
		context.commit('headerTitleHandler', payload);
	},
	collapseSidebar(context) {
		context.commit('collapseSidebarHandler');
	},
	boxLayout(context) {
		context.commit('boxLayoutHandler');
	},
	rtlLayout(context) {
		context.commit('rtlLayoutHandler');
	},
	backgroundImage(context) {
		context.commit('sidebarBgImageHandler');
	},
	changeLanguage(context, payload) {                
            context.commit('changeLanguageHandler', payload);
//            context.commit('changeCurrentLanguageHelpersHandler', payload);
	},        
	changeBackgroundImage(context, payload) {
		context.commit('changeBackgroundImageHandler', payload);
	},
	changeSidebarFilter(context, payload) {
		context.commit('changeSidebarFilterHandler', payload);
	},
	changeRouterAnimation(context, payload) {
		context.commit('changeRouterAnimationHandler', payload);
	},
	changeTheme(context, payload) {
		context.commit('changeThemeHandler', payload);
	},
	changeHeaderFilter(context, payload) {
		context.commit('changeHeaderFilterHandler', payload);
	},
	setMiniSidebarLayout(context, payload) {
		context.commit('setMiniSidebarLayoutHandler', payload);
	},
	toggleHorizontalLayoutSidebar(context, payload) {
		context.commit('toggleHorizontalLayoutSidebarHandler', payload);
	},
	toggleSearchForm(context) {
		context.commit('toggleSearchFormHandler');
	},
	setConfigs(context){
		api.get('/api/configs').then(response => context.commit('configs', response.data.data))
	},
	saveConfig(context, payload) {
                let s_helpers = {};
                s_helpers['serverhelpers'] = this.getters.serverHelpers;
                if(s_helpers.serverhelpers.hasOwnProperty('configs')){                    
                    for(var key in state.configs){
                        if(s_helpers.serverhelpers.configs.hasOwnProperty(key)){                            
                            s_helpers.serverhelpers.configs[key] = state.configs[key];
                        }
                    }                    
//                    s_helpers.configs = state.configs;
                    context.commit('serverHelpersHandler', s_helpers);
                }
		api.put('/api/configs/all', state.configs).then(response => {                        
                        Vue.prototype.$eventHub.$emit('fireSuccess', response.data.message);			
		})
	}
}

// mutations
const mutations = {        
    serverHelpersHandler(state, helpers) {                
        localStorage.setItem('serverHelpers', JSON.stringify(helpers.serverhelpers));
        state.serverHelpers = JSON.stringify(helpers.serverhelpers);
	},        
	darkModeHandler(state) {
		state.darkMode = !state.darkMode;
	},
        headerTitleHandler(state, titleValue) {
		state.headerTitle = titleValue;
	},
	collapseSidebarHandler(state) {
		state.collapseSidebar = !state.collapseSidebar;
	},
	boxLayoutHandler(state) {
		state.boxLayout = !state.boxLayout;
	},
	rtlLayoutHandler(state) {
		state.rtlLayout = !state.rtlLayout;
	},
	sidebarBgImageHandler(state) {
		state.backgroundImage = !state.backgroundImage;
	},        
	changeLanguageHandler(state, languagecode) {
		state.selectedLocale = languagecode;
                localStorage.setItem('selectedLocale', languagecode);
		if (languagecode === 'he' || languagecode === 'ar') {
			state.rtlLayout = true;
		} else {
			state.rtlLayout = false;
		}
	},
        changeCurrentLanguageHelpersHandler(state, languagecode) {
            if(_.isEmpty(JSON.parse(state.serverHelpers))){
                state.currentLanguageHelpers = JSON.parse("{}");
            }
            else{
                state.currentLanguageHelpers = JSON.parse(state.serverHelpers[languagecode]);
            }
	},
	changeBackgroundImageHandler(state, image) {
		state.selectedSidebarBgImage = image;
	},
	changeSidebarFilterHandler(state, filter) {
		state.sidebarSelectedFilter = filter;
	},
	changeRouterAnimationHandler(state, animation) {
		state.selectedRouterAnimation = animation;
	},
	changeThemeHandler(state, theme) {
		state.selectedTheme = theme;
	},
	changeHeaderFilterHandler(state, filter) {
		state.activeHeaderFilter = filter;
	},
	setMiniSidebarLayoutHandler(state, isSet) {
		state.collapseSidebar = isSet;
	},
	toggleHorizontalLayoutSidebarHandler(state, value) {
		state.horizontalLayoutSidebar = value;
	},
	toggleSearchFormHandler(state) {
		state.mobileSearchForm = !state.mobileSearchForm;
	},
	configs(state, configs) {
		state.configs = configs
	}
}

export default {
	state,
	getters,
	actions,
	mutations
}
