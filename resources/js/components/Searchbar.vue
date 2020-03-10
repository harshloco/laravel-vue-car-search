<template>
    <div class="container mt-3">
        <div class="input-group mb-3">
            <input
                v-model="query"
                type="text"
                class="form-control"
                placeholder="Car name or description"
                aria-label="Car name or description"
                aria-describedby="basic-addon2"
            />
            <div class="input-group-append">
                <button
                    class="btn btn-primary"
                    @click="searchCars"
                    @keyup.enter="searchCars"
                    type="button"
                >
                    Search
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import _ from "lodash";
export default {
    name: "Searchbar",
    data() {
        return {
            query: ""
        };
    },
    watch: {
        query: {
            handler: _.debounce(function() {
                this.searchCars();
            }, 100)
        }
    },
    methods: {
        searchCars() {
            this.$store.dispatch("SEARCH_CARS", this.query);
        }
    }
};
</script>

<style scoped></style>
