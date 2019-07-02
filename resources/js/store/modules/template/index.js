/**
 * Template Module
 */
import Vue from 'vue'

const state = {
    template: []
}

const getters = {
    getTemplate: state => {
        return state.template;
    }
}

const actions = {
    setTemplate(context, templateData) {
        context.commit('templateHandler', templateData);
    },
}

const mutations = {
    templateHandler(state, templateData) {
        state.template = templateData;
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}
