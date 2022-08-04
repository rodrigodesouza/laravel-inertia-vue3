<template>
    <App>
        <h1>Dashboard!</h1>
    </App>
</template>
<script lang="ts">
import Navbar from "../components/Navbar.vue";
import App from "./Layout/App.vue";

export default {
    name: 'DashboardView',
    props: ['message'],
    components: {
        Navbar,
        App
    },
}
</script>
