<template>
   <div class="">
      <nav class="navbar-default navbar-static-side" role="navigation">
         <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
               <li class="nav-header">
                  <div class="dropdown profile-element">
                     <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#}">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                     </ul>
                  </div>
                  <div class="logo-element">45+</div>
               </li>
               <li>
                  <router-link v-bind:to="{path: '/dashboard'}">
                     <i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span>
                  </router-link>
               </li>
               <li>
                  <router-link v-bind:to="{path: '/blog/index'}">
                     <i class="fa fa-newspaper-o"></i> <span class="nav-label">Blog</span>
                  </router-link>
               </li>
               <li>
                  <router-link v-bind:to="{path: '/displayPicture/index'}">
                     <i class="fa fa-image"></i> <span class="nav-label">Display Picture</span>
                  </router-link>
               </li>
               <li>
                  <router-link v-bind:to="{path: '/gift/index'}">
                     <i class="fa fa-gift"></i> <span class="nav-label">Gift</span>
                  </router-link>
               </li>
               <li>
                  <router-link v-bind:to="{path: '/podcast/index'}">
                     <i class="fa fa-podcast"></i> <span class="nav-label">Podcast</span>
                  </router-link>
               </li>
               <li>
                  <router-link v-bind:to="{path: '/subscribe/index'}">
                     <i class="fa fa-users"></i> <span class="nav-label">Subscribe</span>
                  </router-link>
               </li>
               <li>
                  <router-link v-bind:to="{path: '/video/index'}">
                     <i class="fa fa-youtube-play"></i> <span class="nav-label">Video</span>
                  </router-link>
               </li>
            </ul>
        </div>
    </nav>
      <div id="page-wrapper" class="gray-bg">
         <div class="row border-bottom">
            <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
               <div class="navbar-header">
                  <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                  <form role="search" class="navbar-form-custom" action="search_results.html">
                     <div class="form-group">
                        <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                     </div>
                  </form>
               </div>
               <ul class="nav navbar-top-links navbar-right">
                  <li>
                     <a v-on:click="logout"><i class="fa fa-sign-out"></i> Logout</a>
                  </li>
               </ul>
            </nav>
         </div>
         <router-view></router-view>
         <br>
         <div class="footer">
             <div class="pull-right">
                <strong>lazyCode - <i class="fa fa-code"></i> dengan <i class="fa fa-heart" style="color:red"></i> </strong>
             </div>
             <div>
                 <strong>Copyright</strong> 2017-2018
             </div>
         </div>
      </div>
   </div>
</template>

<script>
   export default {
      methods:{
         logout () {
            axios.post('http://localhost:8000/logout/').then((res) => {
               window.location.replace('/');
            }).catch((err) => {
               console.log(err)
            })
         }
      }
   }
</script>
