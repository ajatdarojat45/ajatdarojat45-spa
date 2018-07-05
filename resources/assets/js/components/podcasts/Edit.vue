<template>
   <div>
      <div class="row wrapper border-bottom white-bg page-heading">
         <div class="">
            <h2>Podcast</h2>
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
                                      <input type="text" class="form-control" v-model="podcast.name">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label">Description:</label>
                                  <div class="col-sm-10">
                                      <!-- <textarea class="form-control" name="" v-model="podcast.description"></textarea> -->
                                       <editor api-key="API_KEY" :init="{plugins: 'wordcount'}" v-model="podcast.descriptiont"></editor>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label">Embed:</label>
                                  <div class="col-sm-10">
                                      <textarea class="form-control" name="" v-model="podcast.embed"></textarea>
                                  </div>
                              </div>
                           </fieldset>
                           <button type="submit" class="btn btn-primary pull-right btn-sm" style="margin-left:5px">
                              <i class="fa fa-save"></i> Save
                           </button>
                           <router-link v-bind:to="{path: '/podcast/index'}" class="btn btn-sm btn-default pull-right">
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
         podcast: {
            name: '',
            description: '',
            embed:   ''
         }
      }
   },

   components: {
       'editor': Editor
   },

   created: function(){
      let uri = 'http://localhost:8000/api/podcasts/'+this.$route.params.id+'/edit';
      Axios.get(uri).then((response) => {
         this.podcast = response.data;
      });
   },

   methods: {
      update: function() {
         let uri = 'http://localhost:8000/api/podcasts/'+this.$route.params.id;
         Axios.patch(uri, this.podcast).then((response) => {
            toastr.success('Data saved', 'Success')
            this.$router.push({name: 'PodcastEdit', params: {id: podcast.id}})
         })
      }
   }
}
</script>
