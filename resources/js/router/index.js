import Vue from "vue";
import VueRouter from "vue-router";

import store from "../store";

import Dashboard from "../pages/Dashboard.vue";
import PageNotFound from "../pages/PageNotFound.vue";
import ExampleComponent from "../components/ExampleComponent.vue";
import Login from "../views/Login";
import Register from "../views/Register";
import { CHECK_AUTH } from "../store/actions.type";

Vue.use(VueRouter);

const router = new VueRouter({
    // mode: 'history',
    routes: [
        {
            path: "/",
            name: "home",
            component: ExampleComponent,
            meta: {
                requiresAuth: false,
                hideForAuth: false
            }
        },
        {
            path: "/login",
            name: "login",
            component: Login,
            meta: {
                requiresAuth: false,
                hideForAuth: true
            }
        },
        {
            path: "/register",
            name: "register",
            component: Register,
            meta: {
                requiresAuth: false,
                hideForAuth: true
            }
        },
        {
            path: "/cars",
            name: "cars",
            component: Dashboard,
            meta: {
                requiresAuth: true
            }
        }
    ]
});

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !store.getters.isAuthenticated) {
        next("/login");
    } else if (to.meta.hideForAuth && store.getters.isAuthenticated) {
        next("/");
    } else {
        next();
    }
});

router.beforeEach((to, from, next) =>
    Promise.all([store.dispatch(CHECK_AUTH)]).then(next)
);

export default router;
