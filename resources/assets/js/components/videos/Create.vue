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
      <!-- <div class="row"> -->
        <div class="col-lg-12">
            <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-1"> Create</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                      <div class="panel-body">
                          <fieldset class="form-horizontal">
                              <div class="form-group">
                                  <label class="col-sm-2 control-label">Name:</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" v-model="video.name">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label">Description:</label>
                                  <div class="col-sm-10">
                                      <!-- <textarea class="form-control" name="" v-model="video.description"></textarea> -->
                                      <editor api-key="API_KEY" :init="{plugins: 'wordcount'}" v-model="video.description"></editor>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label">Embed:</label>
                                  <div class="col-sm-10">
                                      <textarea class="form-control" name="" v-model="video.embed"></textarea>
                                  </div>
                              </div>
                          </fieldset>
                          <button type="button" class="btn btn-primary pull-right btn-sm" data-toggle="tooltip" data-placement="top" @click="create" style="margin-left:10px">
                          <i class="fa fa-save"></i> Save
                          </button>
                          <router-link v-bind:to="{path: '/video/index'}" class="btn btn-sm btn-default pull-right">
                            <i class="fa fa-arrow-left"></i> Back
                         </router-link>
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
            video: {
               name: '',
               embed:   '',
               description: '',
            }
         }
      },

      components: {
          'editor': Editor
      },

      methods: {
         create: function() {
            let uri = 'http://localhost:8000/api/videos/';
            Axios.post(uri, this.video).then((response) => {
               this.$router.push({name: 'VideoIndex'})
            })
         }
      }
   }
</script>
