<template>
   <div>
      <div class="flex-center position-ref full-height">
         <div class="content">
            <div class="row">
               <strong>
                  <router-link v-bind:to="{path: '/'}" style="color:#636b6f">
                     /ajatdarojat45
                  </router-link>
                  /Subscribe
               </strong>
            </div><br>
            <div class="row">
               <div class="col-lg-4  col-md-4">

               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="alert alert-success" v-if="notif == 'subscribe berhasil'">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <strong>Subscribe success! Selamat kamu berhasil berlangganan.</strong>
                  </div>
                  <div class="alert alert-warning" v-if="notif == 'sudah subscribe'">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <strong>Kamu sudah subscribe.</strong>
                  </div>
                  <div class="alert alert-warning" v-if="notif == 'sudah unsubscribe'">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <strong>Kamu sudah unsubscribe.</strong>
                  </div>
                  <div class="alert alert-danger" v-if="notif == 'unsubscribe berhasil'">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <strong>Unubscribe success! Terimakasih kamu sudah berlangganan.</strong>
                  </div>
                  <strong>
                     <form v-on:submit.prevent = "create">
                        <strong>
                           <div class="input-group">
                              <input type="email" placeholder="Masukan email nya disini." v-model="subscribe.email" class="form-control input-sm" required>
                              <div class="input-group-btn">
                                 <button class="btn btn-danger btn-sm" type="submit">
                                    <strong>Unsubscribe</strong>
                                 </button>
                              </div>
                           </div>
                        </strong>
                     </form>
                  </strong>
               </div>
               <div class="col-lg-4  col-md-4">

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

      },
      data(){
         return{
            displayPicture: '',
            subscribe: {
               email: '',
               type: 'unsubscribe',
            },
            notif: 'subscribe berhasil',
         }
      },

      methods:{
         create() {
            let uri = 'http://localhost:8000/api/subscribes/';
            Axios.post(uri, this.subscribe).then((response) => {
               this.notif = response.data;
            })
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
