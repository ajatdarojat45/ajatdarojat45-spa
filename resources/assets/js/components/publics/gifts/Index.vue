<template>
   <div class="container">
      <br><br>
      <center>
         <div class="row">
            <strong>
               <router-link v-bind:to="{path: '/'}"  style="color:#636b6f">
                  /ajatdarojat45
               </router-link>
               /Gift
            </strong>
         </div>
         <div class="row">
            <h1>
               <strong><u>Gift</u></strong>
            </h1>
         </div>
      </center>
      <br>
      <div class="row">
         <div class="col-lg-4 col-lg-4" v-for="(gift, index) in gifts" :key="gift.id">
             <div style="border: 1px solid #a1a1a1;margin-top: 15px;padding: 10px;">
                 <strong>
                    <center>
                       <p style="font-size: 20px; ">{{gift.name}}</p>
                    </center>
                 </strong>
                 <center>
                    <i class="fa fa-gift fa-5x"></i>
                 </center>
                 <div class="row">
                    <div class="col-lg-6 col-lg-6">
                       <center>
                          <strong><a v-bind:href="gift.link" target="_blank" style="color:#636b6f">View</a> </strong>
                       </center>
                    </div>
                    <div class="col-lg-6 col-lg-6">
                       <center>
                          <strong><a v-bind:href="gift.documentation_link" target="_blank" style="color:#636b6f">Documentation</a> </strong>
                       </center>
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
            gifts: [],
         }
      },

      methods:{
         fetchData () {
            axios.get('http://localhost:8000/api/getGiftsActive/')
               .then((res) => {
                  this.gifts = res.data;
               })
               .catch((err) => {
                  console.log(err)
               })
         },
      }
    }
</script>
