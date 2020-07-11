import Vue from 'vue';
import Vuex from 'vuex';
import Blogs from "./modules/Blogs";

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        loading: false
    },
    getters: {
    },
    mutations: {
        LOADING_START: (state, payload) => {
            state.loading = true
        },
        LOADING_END: (state, payload) => {
            state.loading = false
        },
    },
    actions: {
       
    },
    modules: {
         Blogs
    }
})