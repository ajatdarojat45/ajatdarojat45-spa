<template>
   <div>
      <div class="row wrapper border-bottom white-bg page-heading">
         <div class="col-sm-4">
            <h2>Display Picture</h2>
            <ol class="breadcrumb">
               <li>
                  <router-link v-bind:to="{path: '/dashboard'}">
                     Dashboard
                  </router-link>
               </li>
               <li>
                  <router-link v-bind:to="{path: '/displayPictures/index'}">
                     Display Picture
                  </router-link>
               </li>
               <li class="active">
                  <strong>Create</strong>
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
                                  <label class="col-sm-2 control-label">Image:</label>
                                  <!-- <div class="col-lg-2 col-md-2">
                                     <img id="holder" style="margin-top:15px;max-height:100px;">
                                 </div> -->
                                  <div class="col-lg-8 col-md-8">
                                     <div class="input-group">
                                        <span class="input-group-btn">
                                           <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                              <i class="fa fa-picture-o"></i> Choose
                                           </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" v-model="displayPicture.image">
                                     </div>
                                  </div>
                              </div>
                          </fieldset>
                          <button type="button" class="btn btn-primary pull-right btn-sm" data-toggle="tooltip" data-placement="top" @click="create" style="margin-left:10px">
                          <i class="fa fa-save"></i> Save
                          </button>
                          <router-link v-bind:to="{path: '/displayPictures/index'}" class="btn btn-sm btn-default pull-right">
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
      mounted () {
         $('#lfm').filemanager('image', {prefix: route_prefix});
         $('#lfm2').filemanager('file', {prefix: route_prefix});
      },

      data: function () {
         return {
            displayPicture: {
               image:   ''
            }
         }
      },
      methods: {
         create: function() {
            let uri = 'http://localhost:8000/api/displayPictures/';
            Axios.post(uri, this.displayPicture).then((response) => {
               // console.log(response.data);
               this.$router.push({name: 'DisplayPictureIndex'});
            })
         }
      }
   }
</script>
