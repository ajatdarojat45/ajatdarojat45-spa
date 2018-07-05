<template>
   <div>
      <div class="flex-center position-ref full-height">
         <div class="content">
            <div class="alert alert-danger" v-if="messsage">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               Email atau password salah. Silahkan coba lagi.
            </div>
            <strong>
               <div>
                  <h3>
                     <strong>
                        Selamat Datang
                         <router-link v-bind:to="{path: '/'}" style="color:#636b6f">
                             ajatdarojat45
                         </router-link>
                     </strong>
                  </h3>
                  <form>
                       <div class="form-group">
                           <input type="email" class="form-control" placeholder="Email" v-model="auth.email" required autofocus>
                       </div>
                       <div class="form-group">
                           <input type="password" class="form-control" placeholder="Password" v-model="auth.password" required>
                       </div>
                       <button type="button" class="btn btn-primary btn-sm btn-block" @click="login"><i class="fa fa-sign-in"></i><strong> Login</strong> </button><br>
                  </form>
               </div>
            </strong>
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
      data: function () {
         return {
            auth: {
               email: '',
               password: '',
            },
            messsage:false
         }
      },
      methods: {
         login: function() {
            let uri = 'http://localhost:8000/login/';
            Axios.post(uri, this.auth).then((response) => {
               // if (response.data == true) {
               //    window.location.replace("dashboard");
               // }else if (response.data == errors) {
               //    this.messsage = !this.messsage;
               // }
               console.log(response.data);
            })
         }
      }
   }
</script>
