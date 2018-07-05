<template>
   <div>
      <div class="flex-center position-ref full-height">
         <div class="content">
            <div class="title m-b-md">
               <center>
                  <img :src="displayPicture.image" alt="" class="img-circle img-responsive" width="200px"><br>
               </center>
               <p>
                  <strong>
                     Halo, saya Ajat Darojat
                     <a style="color:#636b6f" v-on:click="login"> <i class="fa fa-coffee"></i></a>
                     <!-- <router-link v-bind:to="{path: '/login'}" style="color:#636b6f">
                        <i class="fa fa-coffee"></i>
                     </router-link> -->
                  </strong>
               </p>
            </div>
            <div class="menu">
               <h3>
                  <router-link v-bind:to="{path: '/blog'}" style="margin-right:20px; color:#636b6f">
                     <i class="fa fa-file-text-o"></i> Catatan
                  </router-link>
                  <router-link v-bind:to="{path: '/podcast'}" style="margin-right:20px; color:#636b6f">
                     <i class="fa fa-podcast"></i> Podcast
                  </router-link>
                  <router-link v-bind:to="{path: '/video'}" style="margin-right:20px; color:#636b6f">
                     <i class="fa fa-youtube-play"></i> Video
                  </router-link>
                  <router-link v-bind:to="{path: '/gift'}" style="margin-right:20px; color:#636b6f">
                     <i class="fa fa-gift"></i> Gift
                  </router-link>
               </h3>
            </div>
            <br>
            <div class="menu">
               <a href="https://facebook.com/ajatdarojat45" target="_blank"><i class="fa fa-facebook-square"> Facebook</i></a>
               <a href="https://twitter.com/ajatdarojat45" target="_blank"><i class="fa fa-twitter"> Twitter</i></a>
               <a href="https://instagram.com/ajatdarojat45" target="_blank"><i class="fa fa-instagram"> Instagram</i></a>
               <a href="https://youtube.com/ajatdarojat45" target="_blank"><i class="fa fa-youtube"> Youtube</i></a>
               <a href="https://github.com/ajatdarojat45" target="_blank"><i class="fa fa-github"> Github</i></a>
            </div>
            <br><br>
            <p>
               <strong>
                  Luruskan niat / Perbaiki sikap / Luaskan ilmu / Luaskan manfaat
               </strong>
            </p>
            <p>
               <strong>
                  Mau dapet notif kalo ada post baru?
               </strong>
            </p>
            <div class="container" style="margin-bottom:7px">
               <div class="row">
                  <div class="container">
                     <div class="col-lg-4  col-md-4">

                     </div>
                     <div class="col-lg-4 col-md-4">
                        <form action="" method="post">
                           <strong>
                              <div class="input-group">
                                 <input type="text" placeholder="Masukan email nya disini." name="email" class="form-control input-sm">
                                 <input type="hidden" name="type" value="subscribe">
                                 <div class="input-group-btn">
                                    <button class="btn btn-danger btn-sm" type="submit">
                                       <strong>Subscribe</strong>
                                    </button>
                                 </div>
                              </div>
                           </strong>
                        </form>
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
      </div>
   </div>
</template>

<script>
   export default {
      mounted() {
         this.fetchData()
      },
      data(){
         return{
            displayPicture: '',
         }
      },

      methods:{
         fetchData () {
            axios.get('http://localhost:8000/api/getDisplayPictureActive/')
               .then((res) => {
                  this.displayPicture = res.data;
                  console.log(this.displayPicture);
               })
               .catch((err) => {
                  console.log(err)
               })
         },

         login: function() {
            window.location.replace('login');
         },
      }
    }
</script>
<style>
   html,
   body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Raleway', sans-serif;
      font-weight: 100;
      height: 100vh;
      margin: 0;
   }

   .full-height {
      height: 100vh;
   }

   .flex-center {
       align-items: center;
       display: flex;
       justify-content: center;
   }

   .position-ref {
      position: relative;
   }

   .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
   }

   .content {
      text-align: center;
   }

   .title {
      font-size: 30px;
   }

   .links>a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 15px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: ;
   }

   .m-b-md {
      margin-bottom: 30px;
   }

   .menu>a {
      font-size: 15px;
      color: #636b6f;
      margin-right: 20px;
   }
</style>
