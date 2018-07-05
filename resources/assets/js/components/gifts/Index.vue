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
                  <strong>Gift</strong>
               </li>
            </ol>
         </div>
      </div>
      <div class="wrapper wrapper-content">
      <div class="alert alert-danger" v-if="!gifts.length">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         You dont have a blog
      </div>
      <div class="row">
         <div class="col-lg-12 animated fadeInRight">
            <div class="ibox-content">
               <h2 class="page-header">Gift</h2>
               <router-link v-bind:to="{path: '/gift/create'}" class="btn btn-sm btn-primary">
                  <i class="fa fa-plus-circle"></i> Add
               </router-link>
               <br>
               <div class="table-responsive">
                  <table id="example1" class="table table-hover table-striped">
                     <thead>
                        <tr>
                           <th style="text-align: center;">No</th>
                           <th style="text-align: center;">Name</th>
                           <th style="text-align: center;">Link</th>
                           <th style="text-align: center;">Documentation</th>
                           <th style="text-align: center;">Stat</th>
                           <th style="text-align: center;">Created at</th>
                           <th style="text-align: center;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr v-for="(gift, index) in gifts" :key="gift.id">
                           <td class="text-center">{{  index + 1}}</td>
                           <td>{{gift.name}}</td>
                           <td class="text-left">{{gift.link}}</td>
                           <td class="text-left">{{gift.documentation_link}}</td>
                           <td class="text-center">
                              <a href="#" class="btn btn-primary btn-sm btn-outline" v-on:click.prevent = "toggleStat(gift)" v-if="gift.stat == 1">
                                 <i class="fa fa-toggle-on"></i>
                              </a>
                              <a href="#" class="btn btn-danger btn-sm btn-outline" @click.prevent="toggleStat(gift)" v-else>
                                 <i class="fa fa-toggle-off"></i>
                              </a>
                           </td>
                           <td class="text-center">{{gift.created_at}}</td>
                           <td class="text-center">
                              <router-link class="btn btn-primary btn-sm btn-outline" v-bind:to="{name: 'GiftShow', params: {id: gift.id}}"><i class="fa fa-file"></i></router-link>
                              <router-link class="btn btn-primary btn-sm btn-outline" v-bind:to="{name: 'GiftEdit', params: {id: gift.id}}"><i class="fa fa-edit"></i></router-link>
                              <router-link class="btn btn-danger btn-sm btn-outline" v-bind:to="{name: 'GiftDelete', params: {id: gift.id}}"><i class="fa fa-trash"></i></router-link>
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
            gifts: [],
         }
      },

      methods:{
         fetchData () {
            axios.get('http://localhost:8000/api/gifts/')
               .then((res) => {
                  this.gifts = res.data
               })
               .catch((err) => {
                  console.log(err)
               })
         },

         toggleStat(gift) {
            let uri = 'http://localhost:8000/api/gifts/toggleStat/'+gift.id;
            Axios.get(uri, this.gift).then((response) => {
               gift.stat = !gift.stat
               toastr.success('Gift stat updated', 'Success');
            })
         },
      }
    }
</script>
