import axios from "axios";
let actions = {
    SEARCH_CARS({ commit }, query) {
        let params = {
            query
        };
        axios
            .get(`/api/search`, { params })
            .then(res => {
                //alert(res.data);
                commit("SET_CARS", res.data);
                if (res.data === "ok") console.log("request sent successfully");
            })
            .catch(err => {
                console.log(err);
            });
    },
    GET_CARS({ commit }) {
        axios
            .get("/api/cars")
            .then(res => {
                {
                    commit("SET_CARS", res.data);
                }
            })
            .catch(err => {
                console.log(err);
            });
    }
};

export default actions;
