import { createWebHistory, createRouter } from "vue-router"

import Login from "../Pages/Login.vue"
import Register from "../Pages/Register.vue"
import Store from "../Pages/Store.vue"
import Pos from "../Pages/Pos.vue"
import Transection from "../Pages/Transection.vue"
import Report from "../Pages/Report.vue"

export const routes = [
    {
        name: "Login Page1",
        path: "/",
        component: Login
    },
    {
        name: "Login Page",
        path: "/login",
        component: Login
    },
    {
        name: "Register Page",
        path: "/register",
        component: Register
    },
    {
        name: "Store Page",
        path: "/store",
        component: Store
    },
    {
        name: "POS Page",
        path: "/pos",
        component: Pos
    },
    {
        name: "Transection Page",
        path: "/transection",
        component: Transection
    },
    {
        name: "Report Page",
        path: "/report",
        component: Report
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
    scrollBehavior(){
        window.scrollTo(0,0)
    }
});

// router.beforeEach((to, from, next) => {
//     console.log(window.Laravel.isLoggin)
//     if(window.Laravel.isLoggin){
//       next();
//     }else{
     
//       //location.reload();
//       window.location.href = "/login"
//     }
//   });

export default router