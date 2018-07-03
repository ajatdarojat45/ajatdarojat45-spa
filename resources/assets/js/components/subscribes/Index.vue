<template>
   <div>
      <div class="row wrapper border-bottom white-bg page-heading">
         <div class="col-sm-4">
            <h2>Subscribe</h2>
            <ol class="breadcrumb">
               <li>
                  <router-link v-bind:to="{path: '/dashboard'}">
                     Dashboard
                  </router-link>
               </li>
               <li class="active">
                  <strong>Subscribe</strong>
               </li>
            </ol>
         </div>
      </div>
      <div class="wrapper wrapper-content">
      <div class="alert alert-danger" v-if="!subscribes.length">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         You dont have a blog
      </div>
      <div class="row">
         <div class="col-lg-12 animated fadeInRight">
            <div class="ibox-content">
               <h2 class="page-header">Subscribe</h2>
               <!-- <router-link v-bind:to="{path: '/blog/create'}" class="btn btn-sm btn-primary">
                  <i class="fa fa-plus-circle"></i> Add
               </router-link> -->
               <br>
               <div class="table-responsive">
                  <table id="example1" class="table table-hover table-striped">
                     <thead>
                        <tr>
                           <th style="text-align: center;">No</th>
                           <th style="text-align: center;">Email</th>
                           <th style="text-align: center;">Stat</th>
                           <th style="text-align: center;">Created at</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr v-for="(subscribe, index) in subscribes" :key="subscribe.id">
                           <td class="text-center">{{  index + 1}}</td>
                           <td>{{subscribe.email}}</td>
                           <td class="text-center">
                              <span class="label label-primary" v-if="subscribe.stat == 1">Subscribe</span>
                              <span class="label label-danger" v-else>Unsubscribe</span>
                           </td>
                           <td class="text-center">{{subscribe.created_at}}</td>
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
            subscribes: [],
         }
      },

      methods:{
         fetchData () {
            axios.get('http://localhost:8000/subscribes/')
               .then((res) => {
                  this.subscribes = res.data
               })
               .catch((err) => {
                  console.log(err)
               })
         },
      }
    }
</script>
