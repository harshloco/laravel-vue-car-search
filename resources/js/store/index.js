import Vue from "vue";
import Vuex from "vuex";

import auth from "./auth.module";

import createPersistedState from "vuex-persistedstate";
import createMutationsSharer from "vuex-shared-mutations";

import actions from "./actions";
import mutations from "./mutations";
import getters from "./getters";
import state from "./state";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        auth
    },
    plugins: [
        createPersistedState(),
        createMutationsSharer({ predicate: ["logout", "setUser"] })
    ],
    state,
    mutations,
    getters,
    actions
});
