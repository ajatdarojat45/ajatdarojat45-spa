<template>
   <div>
      <div class="row wrapper border-bottom white-bg page-heading">
         <div class="col-sm-4">
            <h2>Podcast</h2>
            <ol class="breadcrumb">
               <li>
                  <router-link v-bind:to="{path: '/dashboard'}">
                     Dashboard
                  </router-link>
               </li>
               <li>
                  <router-link v-bind:to="{path: '/podcast/index'}">
                     Podcast
                  </router-link>
               </li>
               <li class="active">
                  <strong>{{podcast.name}}</strong>
               </li>
            </ol>
         </div>
      </div>
      <br>
      <div class="row">
         <div class="col-lg-12 animated fadeInRight">
            <div class="ibox-content">
               <div class="panel panel-danger">
                  <div class="panel-heading text-center">
                     Delete Confirmation
                  </div>
                  <div class="panel-body text-center">
                     <h3>{{ podcast.name  }}</h3>
                     <form v-on:submit.prevent = "destroy">
                        <h3>Are You Sure?</h3>
                        <p>Your will not be able to recover this imaginary data!</p>
                        <router-link class="btn btn-sm btn-default" v-bind:to="'/podcast/index'"><i class="fa fa-arrow-left"></i> Back</router-link>
                        <button class="btn btn-sm btn-danger" type="submit" name="button"><i class="fa fa-trash"></i> Delete</button>
                     </form>
                  </div>
                  <!-- <div class="panel-footer">
                       Panel Footer
                  </div> -->
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
         podcast: {
            name: '',
            description: ''
         }
      }
   },
   created: function(){
      let uri = 'http://localhost:8000/podcasts/'+this.$route.params.id+'/edit';
      Axios.get(uri).then((response) => {
         this.podcast = response.data;
      });
   },
   methods: {
      destroy: function() {
         let uri = 'http://localhost:8000/podcasts/'+this.$route.params.id;
         Axios.delete(uri, this.podcast).then((response) => {
            this.$router.push({name: 'PodcastIndex'})
         })
      }
   }
}
</script>
