<template>
  <div>
    <b-container class="bv-example-row text-center pt-5 pb-5">
      <b-row class="pt-3 pb-3">
        <b-col lg="12" md="12">
          <div class="blog_card">
            <img :src="blog_detail.image" />
            <h6>{{blog_detail.heading}}</h6>
            <small class="text-secondary">{{blog_detail.description}}</small>
          </div>
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
    ...mapState("Blogs", ["blog_detail"])
  },
  mounted() {
    this.LOADING_START();
    this.getBlogDetail(this.$route.params.blogId).then(res => {
      setTimeout(() => this.LOADING_END(), 1000);
    });
  },
  methods: {
    ...mapActions("Blogs", ["getBlogDetail"]),
    ...mapMutations(["LOADING_START", "LOADING_END"])
  }
};
</script>

<style scoped lang="scss">
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