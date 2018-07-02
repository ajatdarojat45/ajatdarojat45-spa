<template>
   <div>
      <div class="row wrapper border-bottom white-bg page-heading">
         <div class="col-sm-4">
            <h2>Video</h2>
            <ol class="breadcrumb">
               <li>
                  <router-link v-bind:to="{path: '/dashboard'}">
                     Dashboard
                  </router-link>
               </li>
               <li class="active">
                  <strong>Video</strong>
               </li>
            </ol>
         </div>
      </div>
      <div class="wrapper wrapper-content">
      <div class="alert alert-danger" v-if="!videos.length">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         You dont have a video
      </div>
      <div class="row">
         <div class="col-lg-12 animated fadeInRight">
            <div class="ibox-content">
               <h2 class="page-header">Video</h2>
               <router-link v-bind:to="{path: '/video/create'}" class="btn btn-sm btn-primary">
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
                           <th style="text-align: center;">Stat</th>
                           <th style="text-align: center;">Visitor</th>
                           <th style="text-align: center;">Created at</th>
                           <th style="text-align: center;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr v-for="(video, index) in videos" :key="video.id">
                           <td class="text-center">{{  index + 1}}</td>
                           <td>{{video.name}}</td>
                           <!-- <td>{{podcast.description}}</td> -->
                           <td class="text-center">{{video.visitor}}</td>
                           <td class="text-center">
                              <a href="#" class="btn btn-primary btn-sm btn-outline" v-on:click.prevent = "toggleStat(video)" v-if="video.stat == 1">
                                 <i class="fa fa-toggle-on"></i>
                              </a>
                              <a href="#" class="btn btn-danger btn-sm btn-outline" @click.prevent="toggleStat(video)" v-else>
                                 <i class="fa fa-toggle-off"></i>
                              </a>
                           </td>
                           <td class="text-center">{{video.created_at}}</td>
                           <td class="text-center">
                              <router-link class="btn btn-primary btn-sm btn-outline" v-bind:to="{name: 'VideoShow', params: {id: video.id}}"><i class="fa fa-file"></i></router-link>
                              <router-link class="btn btn-primary btn-sm btn-outline" v-bind:to="{name: 'VideoEdit', params: {id: video.id}}"><i class="fa fa-edit"></i></router-link>
                              <router-link class="btn btn-danger btn-sm btn-outline" v-bind:to="{name: 'VideoDelete', params: {id: video.id}}"><i class="fa fa-trash"></i></router-link>
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
            videos: [],
         }
      },

      methods:{
         fetchData () {
            axios.get('http://localhost:8000/videos/')
               .then((res) => {
                  this.videos = res.data
               })
               .catch((err) => {
                  console.log(err)
               })
         },

         toggleStat(video) {
            let uri = 'http://localhost:8000/videos/toggleStat/'+video.id;
            Axios.get(uri, this.video).then((response) => {
               video.stat = !video.stat
               toastr.success('Video stat updated', 'Success');
            })
         },
      }
    }
</script>
