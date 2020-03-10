<template>
    <div class="card" v-if="car">
        <img
            class="card-img-top"
            src="https://source.unsplash.com/random?sportscar/500*350"
            :alt="car.name"
        />
        <div class="card-body">
            <h5 class="card-title">{{ car.name }}</h5>
            <p class="card-text">{{ car.description }}</p>
            <span class="text-danger font-weight-bold">${{ car.price }}</span>
        </div>
    </div>
</template>

<script>
export default {
    name: "Car",
    props: ["car"]
};
</script>

<style scoped>
.card {
    cursor: pointer;
    margin-bottom: 8px;
}
</style>
