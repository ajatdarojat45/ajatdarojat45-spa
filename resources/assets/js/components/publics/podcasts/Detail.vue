<template id="podcastDetail">
   <div class="container">
      <br><br>
      <center>
         <div class="row">
            <strong>
               <router-link v-bind:to="{path: '/'}"  style="color:#636b6f">
                  /ajatdarojat45
               </router-link>
               <router-link v-bind:to="{path: '/podcast'}"  style="color:#636b6f">
                  /Podcast
               </router-link>
               /{{podcast.name}}
            </strong>
         </div>
         <div class="row">
            <h1>
               <strong><u>Podcast</u></strong>
            </h1>
         </div>
      </center>
      <div class="row">
         <div class="col-lg-2 col-md-2">

         </div>
         <div class="col-lg-8 col-md-8">
            <center>
               <h3><strong>{{podcast.name}}</strong> </h3>
               <strong>{{podcast.created_at}}</strong><br><br>
            </center>
            <strong>
               <p style="text-align:left">
                  {{podcast.description}}
               </p>
            </strong>
            <div class="text-center" v-html="podcast.embed">
               {{ podcast.embed }}
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
            podcast: {
               name: '',
               description: '',
               created_at: '',
            }
         }
      },
      created: function(){
         let uri = 'http://localhost:8000/podcast/'+this.$route.params.slug;
         Axios.get(uri).then((response) => {
           this.podcast = response.data;
           console.log(response.data);
         });
      }
   }
</script>
