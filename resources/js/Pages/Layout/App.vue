<template>
    <header>
        <Navbar />
    </header>
    <main class="mt-5">
        <slot />
    </main>
</template>
<script>
import { defineComponent } from "vue";
import Navbar from "../../components/Navbar.vue";

export default defineComponent({
    components: { Navbar }
})
</script>
