<template>
  <div id="app">

    <div v-if="loading" class="loadingSec">loading...</div>
    <app-header />
    <router-view></router-view>
    <app-footer />
  </div>
</template>

<script>
import "./App.scss";
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";
import { mapState, mapGetters, mapMutations, mapActions } from "vuex";
export default {
  name: "app",
  data() {
    return {
      // msg: "Welcome to Your Vue.js App"
    };
  },
  computed: {
    ...mapState(["loading"])
  },
  methods: {
    ...mapMutations(["LOADING_START", "LOADING_END"])
  },
  mounted(){
    this.LOADING_START();

  },
  components: {
    "app-header": Header,
    "app-footer": Footer
  }
};
</script>

<style lang="scss">

.loadingSec{
  width: 100%;
  height: 100%;
  position: fixed;
  left: 0;
  top: 0;
  background: rgba(256, 256, 256, 0.5);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000;
}
</style>
