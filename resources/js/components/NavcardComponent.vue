<template>
    <b-card header-tag="header" footer-tag="footer" class="bodycard fullvh" text-variant="white" >
            <!-- <div class="card-header head-card buttonmenu">
                <a href=''><h5 class="mb-0">Menu</h5></a>
            </div> -->
      <template v-slot:header>
          <div class="row">
              <div class="col-7 align-self-center">
                  <a href=''><h4 class="mb-0">Menu</h4></a>
              </div>
              <div class="col-5 pr-2">
                  <a href="javascript:void(0)" class="closebtn" style="padding:1px" onclick="closeNav()">&times;</a>
              </div>
          </div>
      </template>
      <b-card-text><b-link href=''><h5 class="mb-0">Home</h5></b-link></b-card-text>
      <b-card-text v-b-toggle.collapse-1><b-link href=''><h5 class="mb-0">Lesson</h5></b-link></b-card-text>
      <b-collapse id="collapse-1" class="mt-2 text-center">
            <router-link to="/lesson1" ><h6 class="card-text">Lesson 1</h6></router-link>
            <router-link to="/lesson2" ><h6 class="card-text">Lesson 2</h6></router-link>
            <router-link to="/lesson3" ><h6 class="card-text">Lesson 3</h6></router-link>
            <router-link to="/lesson4" ><h6 class="card-text">Lesson 4</h6></router-link>
            <router-link to="/lesson5" ><h6 class="card-text">Lesson 5</h6></router-link>
            <router-link to="/lesson6" ><h6 class="card-text">Lesson 6</h6></router-link>
      </b-collapse>
      <b-card-text><b-link href=''><h5 class="mb-0">Check Class</h5></b-link></b-card-text>

      <template v-slot:footer class="vertical-last text-center">
        <b-button block onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</b-button>
        <b-form id="logout-form" action="logout" method="POST" style="display: none;">
            <input type="hidden" name="_token" :value="csrf">
        </b-form>
      </template>
    </b-card>
</template>

<script>
export default {
    data(){
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
     methods: {
        submit : function(){
            this.$refs.form.submit();
   }
 }
}
</script>
