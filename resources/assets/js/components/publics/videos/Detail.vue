<template id="videoDetail">
   <div class="container">
      <br><br>
      <center>
         <div class="row">
            <strong>
               <router-link v-bind:to="{path: '/'}"  style="color:#636b6f">
                  /ajatdarojat45
               </router-link>
               <router-link v-bind:to="{path: '/video'}"  style="color:#636b6f">
                  /Video
               </router-link>
               /{{video.name}}
            </strong>
         </div>
         <div class="row">
            <h1>
               <strong><u>Video</u></strong>
            </h1>
         </div>
      </center>
      <div class="row">
         <div class="col-lg-2 col-md-2">

         </div>
         <div class="col-lg-8 col-md-8">
            <center>
               <h3><strong>{{video.name}}</strong> </h3>
               <strong>{{video.created_at}}</strong><br><br>
            </center>
            <strong>
               <p style="text-align:left">
                  {{video.description}}
               </p>
            </strong>
            <div class="text-center" v-html="video.embed">
               {{ video.embed }}
            </div>
            <br>
            <div id="disqus_thread"></div>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
         </div>
         <div class="col-lg-2 col-md-2">

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
         (function() {
         var d = document, s = d.createElement('script');
         s.src = 'https://wwwajatdarojat45tk.disqus.com/embed.js';
         s.setAttribute('data-timestamp', +new Date());
         (d.head || d.body).appendChild(s);
         })();
      },
      data: function () {
         return {
            video: {
               name: '',
               description: '',
               created_at: '',
            }
         }
      },
      created: function(){
         let uri = 'http://localhost:8000/video/'+this.$route.params.slug;
         Axios.get(uri).then((response) => {
           this.video = response.data;
           console.log(res.data);
         });
      }
   }
</script>
