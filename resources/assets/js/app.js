require('./bootstrap');

window.Vue        =  require('vue');
window.VueRouter  =  require('vue-router').default;
window.VueAxios   =  require('vue-axios').default;
window.Axios      =  require('axios').default;
window.Editor     =  require('@tinymce/tinymce-vue').default;

let AppLayout= require('./components/App.vue');
let AppLayout2= require('./components/App2.vue');

// posts
const Listposts   =  Vue.component('Listposts', require('./components/Listposts.vue'));
const Addpost     =  Vue.component('Addpost', require('./components/Addposts.vue'));
const Editpost    =  Vue.component('Editpost', require('./components/Editposts.vue'));
const Deletepost  =  Vue.component('Deletepost', require('./components/Deleteposts.vue'));
const Viewpost    =  Vue.component('Viewpost', require('./components/Viewposts.vue'));
// Dashboard
const Dashboard   =  Vue.component('Dashboard', require('./components/Dashboard.vue'));
// blog
const BlogEdit    =  Vue.component('BlogEdit', require('./components/blogs/Edit.vue'));
const BlogShow    =  Vue.component('BlogShow', require('./components/blogs/Show.vue'));
const BlogIndex   =  Vue.component('BlogIndex', require('./components/blogs/Index.vue'));
const BlogCreate  =  Vue.component('BlogCreate', require('./components/blogs/Create.vue'));
const BlogDelete  =  Vue.component('BlogDelete', require('./components/blogs/Delete.vue'));
// displayPicture
const DisplayPictureIndex        =  Vue.component('DisplayPictureIndex', require('./components/DisplayPictures/Index.vue'));
const DisplayPictureCreate       =  Vue.component('DisplayPictureCreate', require('./components/DisplayPictures/Create.vue'));
const DisplayPictureDelete       =  Vue.component('DisplayPictureDelete', require('./components/DisplayPictures/Delete.vue'));
const DisplayPictureToggleStat   =  Vue.component('DisplayPictureToggleStat', require('./components/DisplayPictures/ToggleStat.vue'));
// gift
const GiftEdit    =  Vue.component('GiftEdit', require('./components/gifts/Edit.vue'));
const GiftShow    =  Vue.component('GiftShow', require('./components/gifts/Show.vue'));
const GiftIndex   =  Vue.component('GiftIndex', require('./components/gifts/Index.vue'));
const GiftCreate  =  Vue.component('GiftCreate', require('./components/gifts/Create.vue'));
const GiftDelete  =  Vue.component('GiftDelete', require('./components/gifts/Delete.vue'));
// podcasts
const PodcastEdit    =  Vue.component('PodcastEdit', require('./components/podcasts/Edit.vue'));
const PodcastShow    =  Vue.component('PodcastShow', require('./components/podcasts/Show.vue'));
const PodcastIndex   =  Vue.component('PodcastIndex', require('./components/podcasts/Index.vue'));
const PodcastCreate  =  Vue.component('PodcastCreate', require('./components/podcasts/Create.vue'));
const PodcastDelete  =  Vue.component('PodcastDelete', require('./components/podcasts/Delete.vue'));
// subscribes
const SubscribeIndex   =  Vue.component('SubscribeIndex', require('./components/subscribes/Index.vue'));
// videos
const VideoEdit    =  Vue.component('VideoEdit', require('./components/videos/Edit.vue'));
const VideoShow    =  Vue.component('VideoShow', require('./components/videos/Show.vue'));
const VideoIndex   =  Vue.component('VideoIndex', require('./components/videos/Index.vue'));
const VideoCreate  =  Vue.component('VideoCreate', require('./components/videos/Create.vue'));
const VideoDelete  =  Vue.component('VideoDelete', require('./components/videos/Delete.vue'));

// public
const Home           =  Vue.component('Home', require('./components/publics/Home.vue'));
const Gift           =  Vue.component('Gift', require('./components/publics/gifts/Index.vue'));
// blog
const Blog           =  Vue.component('Blog', require('./components/publics/blogs/Index.vue'));
const BlogDetail     =  Vue.component('BlogDetail', require('./components/publics/blogs/Detail.vue'));
// login
// const Login          =  Vue.component('Login', require('./components/publics/Login.vue'));
// podcast
const Podcast        =  Vue.component('Podcast', require('./components/publics/podcasts/Index.vue'));
const PodcastDetail  =  Vue.component('PodcastDetail', require('./components/publics/podcasts/Detail.vue'));
// subscribe
const Subscribe      =  Vue.component('Subscribe', require('./components/publics/Subscribe.vue'));
// video
const Video          =  Vue.component('Video', require('./components/publics/videos/Index.vue'));
const VideoDetail    =  Vue.component('VideoDetail', require('./components/publics/videos/Detail.vue'));

// registering Modules
Vue.use(VueRouter,VueAxios, axios, Editor);

const routes = [
   {
      name: 'Listposts',
      path: '/list',
      component: Listposts
   },
   {
      name: 'Addpost',
      path: '/add-post',
      component: Addpost
   },
   {
      name: 'Editpost',
      path: '/edit/:id',
      component: Editpost
   },
   {
      name: 'Deletepost',
      path: '/post-delete',
      component: Deletepost
   },
   {
      name: 'Viewpost',
      path: '/view/:id',
      component: Viewpost
   },
   // dashboard
   {
      name: 'Dashboard',
      path: '/dashboard',
      component: Dashboard
   },
   // blogs
   {
      name: 'BlogIndex',
      path: '/blog/index',
      component: BlogIndex
   },
   {
      name: 'BlogCreate',
      path: '/blog/create',
      component: BlogCreate
   },
   {
      name: 'BlogDelete',
      path: '/blog/delete/:id',
      component: BlogDelete
   },
   {
      name: 'BlogEdit',
      path: '/blog/edit/:id',
      component: BlogEdit
   },
   {
      name: 'BlogShow',
      path: '/blog/show/:id',
      component: BlogShow
   },
   // displayPicture
   {
      name: 'DisplayPictureIndex',
      path: '/displayPicture/index',
      component: DisplayPictureIndex
   },
   {
      name: 'DisplayPictureCreate',
      path: '/displayPicture/create',
      component: DisplayPictureCreate
   },
   {
      name: 'DisplayPictureDelete',
      path: '/displayPicture/delete/:id',
      component: DisplayPictureDelete
   },
   {
      name: 'DisplayPictureToggleStat',
      path: '/displayPicture/toggleStat/:id',
      component: DisplayPictureToggleStat
   },
   // gifts
   {
      name: 'GiftIndex',
      path: '/gift/index',
      component: GiftIndex
   },
   {
      name: 'GiftCreate',
      path: '/gift/create',
      component: GiftCreate
   },
   {
      name: 'GiftDelete',
      path: '/gift/delete/:id',
      component: GiftDelete
   },
   {
      name: 'GiftEdit',
      path: '/gift/edit/:id',
      component: GiftEdit
   },
   {
      name: 'GiftShow',
      path: '/gift/show/:id',
      component: GiftShow
   },
   // podcasts
   {
      name: 'PodcastIndex',
      path: '/podcast/index',
      component: PodcastIndex
   },
   {
      name: 'PodcastCreate',
      path: '/podcast/create',
      component: PodcastCreate
   },
   {
      name: 'PodcastDelete',
      path: '/podcast/delete/:id',
      component: PodcastDelete
   },
   {
      name: 'PodcastEdit',
      path: '/podcast/edit/:id',
      component: PodcastEdit
   },
   {
      name: 'PodcastShow',
      path: '/podcast/show/:id',
      component: PodcastShow
   },
   // subscribes
   {
      name: 'SubscribeIndex',
      path: '/subscribe/index',
      component: SubscribeIndex
   },
   // Video
   {
      name: 'VideoIndex',
      path: '/video/index',
      component: VideoIndex
   },
   {
      name: 'VideoCreate',
      path: '/video/create',
      component: VideoCreate
   },
   {
      name: 'VideoDelete',
      path: '/video/delete/:id',
      component: VideoDelete
   },
   {
      name: 'VideoEdit',
      path: '/video/edit/:id',
      component: VideoEdit
   },
   {
      name: 'VideoShow',
      path: '/video/show/:id',
      component: VideoShow
   },
   // publics
   // Home
   {
      name: 'Home',
      path: '/',
      component: Home
   },
   // blogs
   {
      name: 'Blog',
      path: '/blog',
      component: Blog
   },
   {
      name: 'BlogDetail',
      path: '/blog/:slug',
      component: BlogDetail
   },
   // gifts
   {
      name: 'Gift',
      path: '/gift',
      component: Gift
   },
   // podcast
   {
      name: 'Podcast',
      path: '/podcast',
      component: Podcast
   },
   {
      name: 'PodcastDetail',
      path: '/podcast/:slug',
      component: PodcastDetail
   },
   // subscribe
   {
      name: 'Subscribe',
      path: '/subscribe',
      component: Subscribe
   },
   // videos
   {
      name: 'Video',
      path: '/video',
      component: Video
   },
   {
      name: 'VideoDetail',
      path: '/video/:slug',
      component: VideoDetail
   },
];

const router = new VueRouter({ mode: 'history', routes: routes});
new Vue(
   Vue.util.extend(
      { router },
      AppLayout
   ),
).$mount('#app');

new Vue(
   Vue.util.extend(
      { router },
      AppLayout2
   )
).$mount('#app2');
