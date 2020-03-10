<template>
    <div class="container">
        <!-- <div class="card card-default">
            <div class="card-header">Dashboard</div>
             <div class="card-body">
                User Dashboard
            </div> 
        </div> -->
        <Searchbar> </Searchbar>
        <Car> </Car>
        <Cars> </Cars>
    </div>
</template>
<script>
import Searchbar from "../components/Searchbar";
import Car from "../components/Car.vue";
import Cars from "../components/Cars.vue";
export default {
    data() {
        return {
            //
        };
    },
    components: {
        Searchbar,
        Car,
        Cars
    }
};
</script>
