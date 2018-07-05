<template>
   <div class="container">
      <br><br>
      <center>
         <div class="row">
            <strong>
               <router-link v-bind:to="{path: '/'}"  style="color:#636b6f">
                  /ajatdarojat45
               </router-link>
               /Catatan
            </strong>
         </div>
         <div class="row">
            <h1>
               <strong><u>Catatan</u></strong>
            </h1>
         </div>
      </center>
      <br>
      <div class="row">
         <div class="col-lg-1 col-md-1">

         </div>
         <div class="col-lg-9 col-md-9">
         <center>
            <div class="col-lg-4 col-md-4 m-b-md" v-for="(blog, index) in blogs" :key="blog.id">
               <strong>
                  <!-- <a href="" style="color:#636b6f"><p style="font-size: 20px; ">{{blog.title}}</p></a> -->
                  <router-link v-bind:to="{name: 'BlogDetail', params: {slug: blog.slug}}">
                     <p style="font-size: 20px; color:#636b6f;">{{blog.title | subStr }}</p>
                  </router-link>
                  <p>{{blog.created_at}}</p>
               </strong>
            </div>
         </center>
         </div>
      </div>
      <p>
         <center>
            <strong> lazyCode - <i class="fa fa-code"></i> dengan <i class="fa fa-heart" style="color:red"></i></strong><br>
         </center>
      </p>
   </div>
</template>

<script>
    export default {
      mounted() {
         this.fetchData()
      },
      data(){
         return{
            blogs: [],
         }
      },

      methods:{
         fetchData () {
            axios.get('http://localhost:8000/blog/')
               .then((res) => {
                  this.blogs = res.data;
                  console.log(res.data)
               })
               .catch((err) => {
                  console.log(err)
               })
         },
      },

      filters: {
        	subStr: function(string) {
          	return string.substring(0,22) + '...';
         }
      }
}
</script>
<style>
      html,
      body {
         background-color: #fff;
         color: #636b6f;
         font-family: 'Raleway', sans-serif;
         font-weight: 100;
         height: ;
         margin: 0;
      }

      .full-height {
         height: 100vh;
      }

      .flex-center {
         align-items: center;
         /* display: flex; */
         justify-content: center;
      }

      .position-ref {
         position: relative;
      }

      .top-right {
         position: absolute;
         right: 10px;
         top: 18px;
      }

      .content {
         /* text-align: center; */
      }

      .title {
         font-size: 30px;
      }

      .links>a {
         color: #636b6f;
         padding: 0 25px;
         font-size: 15px;
         font-weight: 600;
         letter-spacing: .1rem;
         text-decoration: none;
         text-transform: ;
      }

      .m-b-md {
         margin-bottom: 50px;
      }
   </style>
