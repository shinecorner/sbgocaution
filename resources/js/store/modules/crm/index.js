/**
 * Auth Module
 */
import Vue from 'vue'
const state = {    
    inputItems: {}
}

// getters
const getters = {    
    inputItems: state => {
        return state.inputItems;
    },
}

// actions
const actions = {
    addInputItem: (context, payload) => {
        context.commit("addInputItemHandler", payload)
    },
    deleteInputItem: (context, payload) => {
        context.commit("deleteInputItemHandler", payload)
    },
    clearInputItems: (context) => {
        context.commit("clearInputItemsHandler")
    },
}

// mutations
const mutations = {
    addInputItemHandler: (state, payload) => {
        state.inputItems[payload.fieldname] = payload.fieldvalue;        
    },
    deleteInputItemHandler: (state, payload) => {
        delete state.inputItems[payload.fieldname];        
    },
    clearInputItemsHandler: (state) => {
        state.inputItems = {};
    },
}

export default {
    state,
    getters,
    actions,
    mutations
}
