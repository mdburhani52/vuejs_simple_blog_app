import Home from './components/Home.vue';
import Blogs from './components/Blogs.vue';
import BlogDetails from './components/BlogDetails.vue';
import Contact from './components/Contact.vue';

export const routes = [
  {path:'/', component:Home},
  {path:'/blogs', component:Blogs},
  {path:'/blogs/blog_details/:blogId', component:BlogDetails},
  {path:'/contact', component:Contact},
]