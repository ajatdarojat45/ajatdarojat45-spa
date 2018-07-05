<template id="post-delete">
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
                  <router-link v-bind:to="{path: '/gift/index'}">
                     Gift
                  </router-link>
               </li>
               <li class="active">
                  <strong>{{gift.title}}</strong>
               </li>
            </ol>
         </div>
      </div>
      <br>
      <div class="row">
         <div class="col-lg-12 animated fadeInRight">
            <div class="ibox-content">
               <div class="panel panel-danger">
                  <div class="panel-heading text-center">
                     Delete Confirmation
                  </div>
                  <div class="panel-body text-center">
                     <h3>{{ gift.name  }}</h3>
                     <form v-on:submit.prevent = "destroy">
                        <h3>Are You Sure?</h3>
                        <p>Your will not be able to recover this imaginary data!</p>
                        <router-link class="btn btn-sm btn-default" v-bind:to="'/gift/index'"><i class="fa fa-arrow-left"></i> Back</router-link>
                        <button class="btn btn-sm btn-danger" type="submit" name="button"><i class="fa fa-trash"></i> Delete</button>
                     </form>
                  </div>
                  <!-- <div class="panel-footer">
                       Panel Footer
                  </div> -->
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
         gift: {
            name: '',
            content: '',
         }
      }
   },
   created: function(){
      let uri = 'http://localhost:8000/api/gifts/'+this.$route.params.id+'/edit';
      Axios.get(uri).then((response) => {
         this.gift = response.data;
      });
   },
   methods: {
      destroy: function() {
         let uri = 'http://localhost:8000/api/gifts/'+this.$route.params.id;
         Axios.delete(uri, this.gift).then((response) => {
            this.$router.push({name: 'GiftIndex'})
         })
      }
   }
}
</script>
