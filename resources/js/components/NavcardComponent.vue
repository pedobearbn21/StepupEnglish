<template>
    <b-card header-tag="header" footer-tag="footer" class="bodycard fullvh">
            <div class="card-header head-card buttonmenu">
                <a href=''><h5 class="mb-0">Menu</h5></a>
            </div>
      <b-card-text><b-link href=''><h5 class="mb-0">Home</h5></b-link></b-card-text>
      <b-card-text v-b-toggle.collapse-1><b-link href=''><h5 class="mb-0">Lesson</h5></b-link></b-card-text>
      <b-collapse id="collapse-1" class="mt-2 text-center">
            <p class="card-text">Lesson 1</p>
            <p class="card-text">Lesson 2</p>
            <p class="card-text">Lesson 3</p>
            <p class="card-text">Lesson 4</p>
            <p class="card-text">Lesson 5</p>
            <p class="card-text">Lesson 6</p>
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
