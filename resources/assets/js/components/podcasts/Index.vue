<template>
   <div>
      <div class="row wrapper border-bottom white-bg page-heading">
         <div class="col-sm-4">
            <h2>Podcast</h2>
            <ol class="breadcrumb">
               <li>
                  <router-link v-bind:to="{path: '/dashboard'}">
                     Dashboard
                  </router-link>
               </li>
               <li class="active">
                  <strong>Podcast</strong>
               </li>
            </ol>
         </div>
      </div>
      <div class="wrapper wrapper-content">
      <div class="alert alert-danger" v-if="!podcasts.length">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         You dont have a blog
      </div>
      <div class="row">
         <div class="col-lg-12 animated fadeInRight">
            <div class="ibox-content">
               <h2 class="page-header">Podcast</h2>
               <router-link v-bind:to="{path: '/podcast/create'}" class="btn btn-sm btn-primary">
                  <i class="fa fa-plus-circle"></i> Add
               </router-link>
               <br>
               <div class="table-responsive">
                  <table id="example1" class="table table-hover table-striped">
                     <thead>
                        <tr>
                           <th style="text-align: center;">No</th>
                           <th style="text-align: center;">Name</th>
                           <!-- <th style="text-align: center;">Description</th> -->
                           <th style="text-align: center;">Visitor</th>
                           <th style="text-align: center;">Stat</th>
                           <th style="text-align: center;">Created at</th>
                           <th style="text-align: center;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr v-for="(podcast, index) in podcasts" :key="podcast.id">
                           <td class="text-center">{{  index + 1}}</td>
                           <td>{{podcast.name}}</td>
                           <!-- <td>{{podcast.description}}</td> -->
                           <td class="text-center">{{podcast.visitor}}</td>
                           <td class="text-center">
                              <a href="#" class="btn btn-primary btn-sm btn-outline" v-on:click.prevent = "toggleStat(podcast)" v-if="podcast.stat == 1">
                                 <i class="fa fa-toggle-on"></i>
                              </a>
                              <a href="#" class="btn btn-danger btn-sm btn-outline" @click.prevent="toggleStat(podcast)" v-else>
                                 <i class="fa fa-toggle-off"></i>
                              </a>
                           </td>
                           <td class="text-center">{{podcast.created_at}}</td>
                           <td class="text-center">
                              <router-link class="btn btn-primary btn-sm btn-outline" v-bind:to="{name: 'PodcastShow', params: {id: podcast.id}}"><i class="fa fa-file"></i></router-link>
                              <router-link class="btn btn-primary btn-sm btn-outline" v-bind:to="{name: 'PodcastEdit', params: {id: podcast.id}}"><i class="fa fa-edit"></i></router-link>
                              <router-link class="btn btn-danger btn-sm btn-outline" v-bind:to="{name: 'PodcastDelete', params: {id: podcast.id}}"><i class="fa fa-trash"></i></router-link>
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
            podcasts: [],
         }
      },

      methods:{
         fetchData () {
            axios.get('http://localhost:8000/api/podcasts/')
               .then((res) => {
                  this.podcasts = res.data
               })
               .catch((err) => {
                  console.log(err)
               })
         },

         toggleStat(podcast) {
            let uri = 'http://localhost:8000/api/podcasts/toggleStat/'+podcast.id;
            Axios.get(uri, this.podcast).then((response) => {
               podcast.stat = !podcast.stat
               toastr.success('Podcast stat updated', 'Success');
            })
         },
      }
    }
</script>
