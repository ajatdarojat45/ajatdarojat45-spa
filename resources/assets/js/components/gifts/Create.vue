<template>
   <div>
      <div class="row wrapper border-bottom white-bg page-heading">
         <div class="col-sm-4">
            <h2>Gift</h2>
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
                          <button type="button" class="btn btn-primary pull-right btn-sm" data-toggle="tooltip" data-placement="top" @click="create" style="margin-left:10px">
                          <i class="fa fa-save"></i> Save
                          </button>
                          <router-link v-bind:to="{path: '/gift/index'}" class="btn btn-sm btn-default pull-right">
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
            gift: {
               name: '',
               content: '',
               link:   '',
               documentation_link: '',
            }
         }
      },

      methods: {
         create: function() {
            let uri = 'http://localhost:8000/api/gifts/';
            Axios.post(uri, this.gift).then((response) => {
               this.$router.push({name: 'GiftIndex'})
            })
         }
      }
   }
</script>
