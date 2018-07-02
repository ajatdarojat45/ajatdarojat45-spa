<template>
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
               <li class="active">
                  <strong>Blog</strong>
               </li>
            </ol>
         </div>
      </div>
      <div class="wrapper wrapper-content">
      <div class="alert alert-danger" v-if="!blogs.length">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         You dont have a blog
      </div>
      <div class="row">
         <div class="col-lg-12 animated fadeInRight">
            <div class="ibox-content">
               <h2 class="page-header">Blog</h2>
               <router-link v-bind:to="{path: '/blog/create'}" class="btn btn-sm btn-primary">
                  <i class="fa fa-plus-circle"></i> Add
               </router-link>
               <br>
               <div class="table-responsive">
                  <table id="example1" class="table table-hover table-striped">
                     <thead>
                        <tr>
                           <th style="text-align: center;">No</th>
                           <th style="text-align: center;">Title</th>
                           <th style="text-align: center;">Visitors</th>
                           <th style="text-align: center;">Stat</th>
                           <th style="text-align: center;">Created at</th>
                           <th style="text-align: center;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr v-for="(blog, index) in blogs" :key="blog.id">
                           <td class="text-center">{{  index + 1}}</td>
                           <td>{{blog.title}}</td>
                           <td class="text-center">{{blog.visitor}}</td>
                           <td class="text-center">
                              <a href="#" class="btn btn-primary btn-sm btn-outline" v-on:click.prevent = "toggleStat(blog)" v-if="blog.stat == 1">
                                 <i class="fa fa-toggle-on"></i>
                              </a>
                              <a href="#" class="btn btn-danger btn-sm btn-outline" @click.prevent="toggleStat(blog)" v-else>
                                 <i class="fa fa-toggle-off"></i>
                              </a>
                           </td>
                           <td class="text-center">{{blog.created_at}}</td>
                           <td class="text-center">
                              <router-link class="btn btn-primary btn-sm btn-outline" v-bind:to="{name: 'BlogShow', params: {id: blog.id}}"><i class="fa fa-file"></i></router-link>
                              <router-link class="btn btn-primary btn-sm btn-outline" v-bind:to="{name: 'BlogEdit', params: {id: blog.id}}"><i class="fa fa-edit"></i></router-link>
                              <router-link class="btn btn-danger btn-sm btn-outline" v-bind:to="{name: 'BlogDelete', params: {id: blog.id}}"><i class="fa fa-trash"></i></router-link>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
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
            blogs: [],
         }
      },

      methods:{
         fetchData () {
            axios.get('http://localhost:8000/blogs/')
               .then((res) => {
                  this.blogs = res.data
               })
               .catch((err) => {
                  console.log(err)
               })
         },

         toggleStat(blog) {
            let uri = 'http://localhost:8000/blogs/toggleStat/'+blog.id;
            Axios.get(uri, this.blog).then((response) => {
               blog.stat = !blog.stat
               toastr.success('Blog stat updated', 'Success');
            })
         },
      }
    }
</script>
