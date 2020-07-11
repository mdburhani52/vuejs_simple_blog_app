<template>
  <div>
    <b-container class="bv-example-row text-center pt-5 pb-5">
      <b-row class="pt-3 pb-3">
        <b-col lg="4" md="4" v-for="(blog, index) in blogs" v-bind:key="index">
          <router-link :to="`/blogs/blog_details/${blog.id}`">
            <div class="blog_card">
              <img :src="blog.image" />
              <h6>{{blog.heading}}</h6>
              <small
                class="text-secondary"
              >{{blog.description.length > 80 ? blog.description.slice(0, 80)+ '...' :blog.description}}</small>
            </div>
          </router-link>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>



<script>
import { mapState, mapGetters, mapMutations, mapActions } from "vuex";
export default {
  data() {
    return {
      slide: 0,
      sliding: null
    };
  },
  computed: {
    // ...mapState(["sports"]),
    ...mapState("Blogs", ["blogs"]),

    ...mapGetters("Blogs", ["countBlogs"])
  },
  mounted() {
    this.LOADING_START()
    this.getBlogs()
    .then(res => {
      setTimeout(() => this.LOADING_END(), 1000);
    });
  },
  methods: {
    ...mapActions("Blogs", ["getBlogs"]),
    ...mapMutations(["LOADING_START", "LOADING_END"])
  }
};
</script>

<style scoped lang="scss">
a, a:hover{text-decoration: none; color: inherit;}
.blog_card {
  width: 100%;
  padding: 10px;
  box-shadow: 0px 0px 15px #efefef;
  text-align: left;
  margin-bottom: 30px;
  img {
    width: 100%;
    margin-bottom: 20px;
  }
  h6 {
    margin-bottom: 0px;
    color: #000;
  }
}
</style>