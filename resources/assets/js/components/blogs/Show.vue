<template id="post">
   <div>
      <div class="row wrapper border-bottom white-bg page-heading">
         <div >
            <h2>Blog</h2>
            <ol class="breadcrumb">
               <li>
                  <router-link v-bind:to="{path: '/dashboard'}">
                     Dashboard
                  </router-link>
               </li>
               <li>
                  <router-link v-bind:to="{path: '/blog/index'}">
                     Blog
                  </router-link>
               </li>
               <li class="active">
                  <strong>{{blog.title}}</strong>
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
                     <router-link v-bind:to="{path: '/blog/index'}" class="btn btn-primary btn-sm">
                        <i class="fa fa-arrow-left"></i> Back
                     </router-link>
                  </div>
                  <div class="pull-right">
                  </div>
                  <div class="text-center article-title">
                     <span class="text-muted"><i class="fa fa-clock-o"></i> {{blog.created_at}}</span>
                     <h1><b>{{blog.title}}</b> </h1>
                  </div>
                  <div v-html="blog.content">{{blog.content}}</div>
                  <hr>
                  <div class="row">
                     <div class="col-md-6">
                        <!-- <h5>Tags:</h5>
                        <button class="btn btn-primary btn-xs" type="button">Model</button>
                        <button class="btn btn-white btn-xs" type="button">Publishing</button> -->
                     </div>
                     <div class="col-md-6">
                        <div class="small text-right">
                            <h5>Stats:</h5>
                            <!-- <div> <i class="fa fa-comments-o"> </i> 56 comments </div> -->
                            <i class="fa fa-eye"> </i> {{blog.visitor}} views
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
            blog: {
               title: '',
               content: '',
               created_at: '',
               image: ''
            }
         }
      },
      created: function(){
         let uri = 'http://localhost:8000/api/blogs/'+this.$route.params.id;
         Axios.get(uri).then((response) => {
           this.blog = response.data;
           console.log(response.data);
         });
      }
   }
</script>
