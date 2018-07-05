<template>
   <div>
      <div class="row wrapper border-bottom white-bg page-heading">
         <div class>
            <h2>Display Picture</h2>
            <ol class="breadcrumb">
               <li>
                  <router-link v-bind:to="{path: '/dashboard'}">
                     Dashboard
                  </router-link>
               </li>
               <li>
                  <router-link v-bind:to="{path: '/displayPictures/index'}">
                     Display Picture
                  </router-link>
               </li>
               <li class="active">
                  <strong>{{displayPicture.image}}</strong>
               </li>
            </ol>
         </div>
      </div>
      <br>
      <div class="row">
         <div class="col-lg-12 animated fadeInRight">
            <div class="ibox-content">
               <div class="panel panel-warning">
                  <div class="panel-heading text-center">
                     Toggle Confirmation
                  </div>
                  <div class="panel-body text-center">
                     <img v-bind:src="displayPicture.image" alt="" width="200" class="img-circle">
                     <h3>{{ displayPicture.image  }}</h3>
                     <form v-on:submit.prevent = "toggleStat">
                        <h3>Are You Sure?</h3>
                        <p>Your will display this image in font your website!</p>
                        <router-link class="btn btn-sm btn-default" v-bind:to="'/displayPicture/index'"><i class="fa fa-arrow-left"></i> Back</router-link>
                        <button class="btn btn-sm btn-primary" type="submit" name="button"><i class="fa fa-check-circle"></i> Use</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</template>

<script>
   export default {
      data: function () {
         return {
            displayPicture: {
               image: '',
            }
         }
      },
      created: function(){
         let uri = 'http://localhost:8000/api/displayPictures/'+this.$route.params.id+'/edit';
         Axios.get(uri).then((response) => {
            this.displayPicture = response.data;
         });
      },
      methods: {
         toggleStat: function() {
            let uri = 'http://localhost:8000/api/displayPictures/toggleStat/'+this.$route.params.id;
            Axios.get(uri, this.displayPicture).then((response) => {
               this.$router.push({name: 'DisplayPictureIndex'})
            })
         }
      }
   }
</script>
