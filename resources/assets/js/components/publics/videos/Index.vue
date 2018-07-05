<template>
   <div class="container">
      <br><br>
      <center>
         <div class="row">
            <strong>
               <router-link v-bind:to="{path: '/'}"  style="color:#636b6f">/ajatdarojat45</router-link>
               /Video
            </strong>
         </div>
         <div class="row">
            <h1><strong><u>Video</u></strong></h1>
         </div>
      </center>
      <br>
      <div class="row" v-for="(video, index) in videos" :key="video.id">
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
                           <i class="fa fa-youtube-play fa-4x"></i>
                        </center>
                     </div>
                  </div>
                  <div class="col-lg-5 col-md-5">
                     <strong>
                        <router-link v-bind:to="{name: 'VideoDetail', params: {slug: video.slug}}">
                           <p style="font-size: 20px; color:#636b6f;" class="text-center">{{video.name}}</p>
                        </router-link>
                        <p class="text-center">{{video.created_at}}</p>
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
            videos: [],
         }
      },

      methods:{
         fetchData () {
            axios.get('http://localhost:8000/video/')
               .then((res) => {
                  this.videos = res.data;
               })
               .catch((err) => {
                  console.log(err)
               })
         },
      }
    }
</script>
