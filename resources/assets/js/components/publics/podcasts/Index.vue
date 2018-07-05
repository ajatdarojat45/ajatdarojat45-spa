<template>
   <div class="container">
      <br><br>
      <center>
         <div class="row">
            <strong>
               <router-link v-bind:to="{path: '/'}"  style="color:#636b6f">
                  /ajatdarojat45
               </router-link>
               /Podcast
            </strong>
         </div>
         <div class="row">
            <h1>
               <strong><u>Podcast</u></strong>
            </h1>
         </div>
      </center>
      <br>
      <div class="row" v-for="(podcast, index) in podcasts" :key="podcast.id">
         <div class="row">
            <div class="col-lg-1 col-md-1">

            </div>
            <div class="col-lg-9 col-md-9">
               <div class="row">
                  <div class="col-lg-3 col-md-3">
                  </div>
                  <div class="col-lg-1 col-md-1">
                     <div class="text-center">
                        <center>
                           <i class="fa fa-podcast fa-4x"></i>
                        </center>
                     </div>
                  </div>
                  <div class="col-lg-5 col-md-5">
                     <strong>
                        <router-link v-bind:to="{name: 'PodcastDetail', params: {slug: podcast.slug}}">
                           <p style="font-size: 20px; color:#636b6f;" class="text-center">{{podcast.name}}</p>
                        </router-link>
                        <p class="text-center">{{podcast.created_at}}</p>
                     </strong>
                  </div>
                  <div class="col-lg-3 col-md-3">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <br>
      <p>
         <center>
            <strong> lazyCode - <i class="fa fa-code"></i> dengan <i class="fa fa-heart" style="color:red"></i></strong><br>
         </center>
      </p>
   </div>
</template>

<script>
    export default {
      mounted() {
         this.fetchData()
      },
      data(){
         return{
            podcasts: [],
         }
      },

      methods:{
         fetchData () {
            axios.get('http://localhost:8000/podcast/')
               .then((res) => {
                  this.podcasts = res.data;
               })
               .catch((err) => {
                  console.log(err)
               })
         },
      }
    }
</script>
