<template>
   <div>
      <div class="row wrapper border-bottom white-bg page-heading">
         <div>
            <h2>Display Picture</h2>
            <ol class="breadcrumb">
               <li>
                  <router-link v-bind:to="{path: '/dashboard'}">
                     Dashboard
                  </router-link>
               </li>
               <li class="active">
                  <strong>Display Picture</strong>
               </li>
            </ol>
         </div>
      </div>
      <div class="wrapper wrapper-content">
      <div class="alert alert-danger" v-if="!displayPictures.length">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         You dont have a Display Picture
      </div>
      <div class="row">
         <div class="col-lg-12 animated fadeInRight">
            <div class="ibox-content">
               <h2 class="page-header">Display Picture</h2>
               <router-link v-bind:to="{path: '/displayPicture/create'}" class="btn btn-sm btn-primary">
                  <i class="fa fa-plus-circle"></i> Add
               </router-link>
               <br>
               <div class="table-responsive">
                  <table id="example1" class="table table-hover table-striped">
                     <thead>
                        <tr>
                           <th style="text-align: center;">No</th>
                           <th style="text-align: center;">Image</th>
                           <th style="text-align: center;">Stat</th>
                           <th style="text-align: center;">Created at</th>
                           <th style="text-align: center;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr v-for="(displayPicture, index) in displayPictures" :key="displayPicture.id">
                           <td class="text-center">{{  index + 1}}</td>
                           <td class="text-center">
                              <img v-bind:src="displayPicture.image" alt="" width="50" class="img-circle">
                           </td>
                           <td class="text-center">
                              <span class="label label-danger" v-if="!displayPicture.stat">Nonactive</span>
                              <span class="label label-primary" v-else>Active</span>
                           </a>
                           </td>
                           <td class="text-center">{{displayPicture.created_at}}</td>
                           <td class="text-center">
                              <router-link class="btn btn-danger btn-sm btn-outline" v-bind:to="{name: 'DisplayPictureDelete', params: {id: displayPicture.id}}" v-if="!displayPicture.stat"><i class="fa fa-trash"></i></router-link>
                              <router-link class="btn btn-danger btn-sm btn-outline" v-bind:to="{name: 'DisplayPictureToggleStat', params: {id: displayPicture.id}}" v-if="!displayPicture.stat"><i class="fa fa-toggle-off"></i></router-link>
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
            displayPictures: [],
         }
      },

      methods:{
         fetchData () {
            axios.get('http://localhost:8000/api/displayPictures/')
               .then((res) => {
                  this.displayPictures = res.data.fetch;
               })
               .catch((err) => {
                  console.log(err)
               })
         },
      }
    }
</script>
