import * as getters from "./getters";
import * as actions from "./actions";

export default {
    namespaced: true,
    state:{
        blogs: [],
        blog_detail:{}
    },
    mutations:{
        SAVE_BLOGS: (state, payload) => {
            state.blogs = payload
        },
        SAVE_BLOG_DETAILS: (state, payload) => {
            state.blog_detail = payload
        },
    },
    getters,
    actions
}