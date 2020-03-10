<template>
    <div class="container" v-if="cars">
        <div class="row" v-for="cars in groupedCars" :key="cars.name">
            <div class="col-md-3 col-sm-6" v-for="car in cars" :key="car.name">
                <car class="animated fadeIn" :car="car"></car>
            </div>
            <div class="col w-100"></div>
        </div>
    </div>
    <div v-else class="spinner-grow" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import car from "../components/Car";

import axios from "axios";

export default {
    name: "Cars",
    components: {
        car
    },
    mounted() {
        this.$store.dispatch("GET_CARS");

        window.Echo.channel("search").listen(".searchResults", e => {
            this.$store.commit("SET_CARS", e.cars);
        });
    },
    computed: {
        groupedCars() {
            return _.chunk(this.cars, 4);
        },
        ...mapGetters(["cars"])
    }
};
</script>
