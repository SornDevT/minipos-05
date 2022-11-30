import { createWebHistory, createRouter } from "vue-router"

import Store from "../Pages/Store.vue"
import Pos from "../Pages/Pos.vue"
import Transection from "../Pages/Transection.vue"
import Report from "../Pages/Report.vue"

export const routes = [
    {
        name: "Store Page",
        path: "/",
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
})

export default router