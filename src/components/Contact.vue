<template>
  <div>
    <b-container class="bv-example-row text-center pt-5 pb-5">
      <h1>Contact Us</h1>
      <b-row class="pt-3 pb-3 d-flex justify-content-center">
        <b-col lg="7" md="10" sm="12">
          <div class="contact text-left">
            <form @submit="submitHandler" method="post" action="#">
              <div class="form-group">
                <label>Name</label>
                <b-form-input v-model="obj.name" placeholder="Enter your name"></b-form-input>
                <span class="text-danger">{{errors.name}}</span>
              </div>
              <div class="form-group">
                <label>Phone No.</label>
                <b-form-input v-model="obj.phone" placeholder="Enter your phone"></b-form-input>
                <span class="text-danger">{{errors.phone}}</span>
              </div>
              <div class="form-group">
                <label>Email</label>
                <b-form-input v-model="obj.email" placeholder="Enter your email"></b-form-input>
                <span class="text-danger">{{errors.email}}</span>
              </div>
              <div class="form-group">
                <label>Query</label>
                <b-form-textarea
                  id="query"
                  v-model="obj.query"
                  placeholder="Enter something..."
                  rows="3"
                  max-rows="6"
                ></b-form-textarea>
                <span class="text-danger">{{errors.query}}</span>
              </div>
              <div class="form-group">
                <input type="submit" class="btn-block btn btn-primary" value="Send Query" />

                <div
                  v-if="notify"
                  :class="`mt-3 text-center alert alert-${notify.status}`"
                >{{notify.message}}</div>
              </div>
            </form>
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
      obj: {
        name: "",
        phone: "",
        email: "",
        query: ""
      },
      errors: {},
      notify: {}
    };
  },
  mounted() {
    setTimeout(() => this.LOADING_END(), 1000);
  },
  methods: {
    ...mapMutations(["LOADING_START", "LOADING_END"]),

    submitHandler: function(e) {
      e.preventDefault();
      var checkValid = this.checkFormValid();
      if (checkValid) {
        this.LOADING_START();
        setTimeout(() => {
          this.notify = {};
          this.notify.status = "success";
          this.notify.message = "Query sent successfully";
          this.LOADING_END();
        }, 2000);

        setTimeout(() => {this.notify = {}}, 6000)
      }
    },
    validEmail: function(email) {
      var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    },
    validPhone: function(phone) {
      var re = /^(?=.{8,18}$)(\(?\+?[0-9]{1,3}\)?)([ ]{0,1})?[0-9_\- \(\)]{8,18}$/;
      return re.test(phone);
    },
    checkFormValid: function() {
      var valid = true;
      this.errors = {};
      if (!this.obj.name) {
        this.errors.name = "Name required.";
        valid = false;
      }

      if (!this.obj.phone) {
        this.errors.phone = "Phone required.";
        valid = false;
      } else if (!this.validPhone(this.obj.phone)) {
        this.errors.phone = "Valid Phone required.";
        valid = false;
      }

      if (!this.obj.email) {
        this.errors.email = "Email required.";
        valid = false;
      } else if (!this.validEmail(this.obj.email)) {
        this.errors.email = "Valid email required.";
        valid = false;
      }

      if (!this.obj.query) {
        this.errors.query = "Query required.";
        valid = false;
      } else if (this.obj.query.length < 20) {
        this.errors.query = "Query should be atleast 20 chars.";
        valid = false;
      }

      return valid;
    }
  }
};
</script>

<style scoped>
</style>