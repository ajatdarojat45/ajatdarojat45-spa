<template>
   <div class="container">
      <br><br><br><br>
      <center>
         <div class="row">
            <strong>
               <router-link v-bind:to="{path: '/'}"  style="color:#636b6f">
                  /ajatdarojat45
               </router-link>
               <router-link v-bind:to="{path: '/blog'}"  style="color:#636b6f">
                  /Catatan
               </router-link>
               /{{blog.title}}
            </strong>
         </div>
         <div class="row">
            <h1>
               <strong><u>Catatan</u></strong>
            </h1>
         </div>
      </center>
      <div class="row">
         <div class="col-lg-2 col-md-2">

         </div>
         <div class="col-lg-8 col-md-8">
            <center>
               <h3><strong>{{blog.title}}</strong> </h3>
               <strong>{{blog.created_at}}</strong><br><br>
            </center>
            <strong>
               <p style="text-align:left" v-html="blog.content">
                  {{blog.content}}
               </p>
            </strong>
            <br>
            <div id="disqus_thread"></div>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
         </div>
         <div class="col-lg-2 col-md-2">

         </div>
      </div>
   </div>
</template>
<script>
   export default {
      mounted() {
         (function() { // DON'T EDIT BELOW THIS LINE
         var d = document, s = d.createElement('script');
         s.src = 'https://wwwajatdarojat45tk.disqus.com/embed.js';
         s.setAttribute('data-timestamp', +new Date());
         (d.head || d.body).appendChild(s);
         })();
      },
      data: function () {
         return {
            blog: {
               title: '',
               content: '',
               created_at: '',
               image: ''
            }
         }
      },
      created: function(){
         let uri = 'http://localhost:8000/api/getBlog/'+this.$route.params.slug;
         Axios.get(uri).then((response) => {
           this.blog = response.data;
           console.log(response.data);
         });
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
         height: ;
         margin: 0;
      }

      .full-height {
         height: 100vh;
      }

      .flex-center {
         align-items: center;
         /* display: flex; */
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
         /* text-align: center; */
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
         margin-bottom: 50px;
      }
   </style>
