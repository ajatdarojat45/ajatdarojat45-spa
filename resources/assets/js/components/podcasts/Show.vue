<template id="post">
   <div>
      <div class="row wrapper border-bottom white-bg page-heading">
         <div class="col-sm-4">
            <h2>Blog</h2>
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
            <div class="ibox">
               <div class="ibox-content">
                  <div class="pull-left">
                     <router-link v-bind:to="{path: '/podcast/index'}" class="btn btn-primary btn-sm">
                        <i class="fa fa-arrow-left"></i> Back
                     </router-link>
                  </div>
                  <div class="pull-right">
                     <button class="btn btn-white btn-xs" type="button">Model</button>
                     <button class="btn btn-white btn-xs" type="button">Publishing</button>
                     <button class="btn btn-white btn-xs" type="button">Modern</button>
                  </div>
                  <div class="text-center article-title">
                     <span class="text-muted"><i class="fa fa-clock-o"></i> {{podcast.created_at}}</span>
                     <h1><b>{{podcast.name}}</b> </h1>
                  </div>
                  <div class="text-center" v-html="podcast.embed">
                     {{ podcast.embed }}
                  </div><br>
                  <p>{{podcast.description}}</p>
                  <hr>
                  <div class="row">
                     <div class="col-md-6">
                        <h5>Tags:</h5>
                        <button class="btn btn-primary btn-xs" type="button">Model</button>
                        <button class="btn btn-white btn-xs" type="button">Publishing</button>
                     </div>
                     <div class="col-md-6">
                        <div class="small text-right">
                            <h5>Stats:</h5>
                            <div> <i class="fa fa-comments-o"> </i> 56 comments </div>
                            <i class="fa fa-eye"> </i> 144 views
                        </div>
                     </div>
                   </div>
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
               description: '',
               embed: '',
               created_at: ''
            }
         }
      },
      created: function(){
         let uri = 'http://localhost:8000/podcasts/'+this.$route.params.id;
         Axios.get(uri).then((response) => {
           this.podcast = response.data;
           console.log(response.data);
         });
      }
   }
</script>
