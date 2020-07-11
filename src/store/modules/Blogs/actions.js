import Api from "../../apis/Api";


export const getBlogs = ({ commit }) => {
    let api = 'Apis.php?r=blogs_list';
    return Api(api, {})
    .then(res => {

        if(res.status){
            commit('SAVE_BLOGS', res.data);
            return res;
        }
    })
}

export const getBlogDetail = ({ commit }, blogId=null) => {
    let api = 'Apis.php?r=blogs_detail';
    return Api(api, {blogId:blogId})
    .then(res => {

        if(res.status){
            commit('SAVE_BLOG_DETAILS', res.data);
            return res;
        }
    })
}