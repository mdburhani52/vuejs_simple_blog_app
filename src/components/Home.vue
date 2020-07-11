<template>
  <div>
    <b-container class="bv-example-row text-center mt-5">
      <div>
        <b-carousel
          id="carousel-1"
          v-model="slide"
          :interval="4000"
          controls
          indicators
          fade
          background="#ababab"
          img-width="1024"
          img-height="480"
          style="text-shadow: 1px 1px 2px #333;"
        >
          <!-- Text slides with image -->
          <b-carousel-slide
            caption="First slide"
            text="Nulla vitae elit libero, a pharetra augue mollis interdum."
            img-src="https://picsum.photos/1024/480/?image=52"
          ></b-carousel-slide>

          <!-- Slides with custom text -->
          <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=54">
            <h1>Hello world!</h1>
          </b-carousel-slide>

          <!-- Slides with image only -->
          <b-carousel-slide img-src="https://picsum.photos/1024/480/?image=58"></b-carousel-slide>

          <!-- Slides with img slot -->
          <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
          <b-carousel-slide>
            <template v-slot:img>
              <img
                class="d-block img-fluid w-100"
                width="1024"
                height="480"
                src="https://picsum.photos/1024/480/?image=55"
                alt="image slot"
              />
            </template>
          </b-carousel-slide>
        </b-carousel>
      </div>

      <!-- intro sec -->

      <section class="intro_sec pt-5 pb-5">
        <h2>Who We Are?</h2>
        <b-row class="justify-content-center">
          <b-col lg="8">
            <h6
              class="text-secondary"
            >Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h6>
          </b-col>
        </b-row>

        <b-row class="text-left mt-5">
          <b-col lg="6">
            <p class="text-secondary">
              Lorem Ipsum is simply dummy text of the printing and typesetting industry.
              Lorem Ipsum has been the industry's standard dummy text ever since the
              1500s, when an unknown printer took a galley of type and scrambled it to
              make a type specimen book. It has survived not only five centuries,
              but also the leap into electronic typesetting, remaining essentially
              unchanged.
              <br />
              <br />It was popularised in the 1960s with the release of Letraset
              sheets containing Lorem Ipsum passages, and more recently with desktop
              publishing software like Aldus PageMaker including versions of Lorem
              Ipsum.
            </p>
          </b-col>
          <b-col lg="6">
            <img style="width:100%" src="https://picsum.photos/1024/480/?image=55" />
          </b-col>
        </b-row>
      </section>

      <section class="intro_sec pt-5 pb-5">
        <h2>Latest Blogs</h2>
        <b-row class="justify-content-center">
          <b-col lg="8">
            <h6
              class="text-secondary"
            >Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h6>
          </b-col>
        </b-row>

        <b-row class="pt-3 pb-3">
          <b-col lg="4" md="4" v-for="(blog, index) in blogs.slice(0,3)" v-bind:key="index">
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

        <div class="d-flex justify-content-center">
          <router-link to="/blogs">
          <b-button variant="primary">Check All Blogs ({{countBlogs}})</b-button>

          </router-link>
        </div>
      </section>
    </b-container>
  </div>
</template>

<script>
import { mapState, mapGetters, mapMutations, mapActions } from "vuex";
export default {
  data() {
    return {
      slide: 0,
      sliding: null,
      
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