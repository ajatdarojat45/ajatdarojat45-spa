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
               <li>
                  <router-link v-bind:to="{path: '/gift/index'}">
                     Gift
                  </router-link>
               </li>
               <li class="active">
                  <strong>{{gift.name}}</strong>
               </li>
            </ol>
         </div>
      </div>
      <div class="wrapper wrapper-content">
      <!-- <div class="row"> -->
        <div class="col-lg-12">
            <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-1"> Edit</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                      <div class="panel-body">
                        <form v-on:submit.prevent = "update">
                           <fieldset class="form-horizontal">
                               <div class="form-group">
                                   <label class="col-sm-2 control-label">Name:</label>
                                   <div class="col-sm-10">
                                       <input type="text" class="form-control" v-model="gift.name">
                                   </div>
                               </div>
                               <div class="form-group">
                                   <label class="col-sm-2 control-label">Content:</label>
                                   <div class="col-sm-10">
                                       <textarea class="form-control" name="" v-model="gift.content"></textarea>
                                   </div>
                               </div>
                               <div class="form-group">
                                   <label class="col-sm-2 control-label">Link:</label>
                                   <div class="col-sm-10">
                                       <input type="text" class="form-control" v-model="gift.link">
                                   </div>
                               </div>
                               <div class="form-group">
                                   <label class="col-sm-2 control-label">Documentation Link:</label>
                                   <div class="col-sm-10">
                                       <input type="text" class="form-control" v-model="gift.documentation_link">
                                   </div>
                               </div>
                           </fieldset>
                           <button type="submit" class="btn btn-primary pull-right btn-sm" style="margin-left:5px">
                              <i class="fa fa-save"></i> Save
                           </button>
                           <router-link v-bind:to="{path: '/gift/index'}" class="btn btn-sm btn-default pull-right">
                              <i class="fa fa-arrow-left"></i> Back
                           </router-link>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
   </div>
</template>

<script>
export default{
   data: function () {
      return {
         gift: {
            name: '',
            content: '',
            link:   '',
            documentation_link: '',
         }
      }
   },
   created: function(){
      let uri = 'http://localhost:8000/gifts/'+this.$route.params.id+'/edit';
      Axios.get(uri).then((response) => {
         this.gift = response.data;
      });
   },
   methods: {
      update: function() {
         let uri = 'http://localhost:8000/gifts/'+this.$route.params.id;
         Axios.patch(uri, this.gift).then((response) => {
            toastr.success('Data saved', 'Success')
            this.$router.push({name: 'GiftEdit', params: {id: gift.id}})
         })
      }
   }
}
</script>
