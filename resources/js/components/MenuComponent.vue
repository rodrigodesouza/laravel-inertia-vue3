<template>
    <ul class="nav">
        <li class="nav-item">
            <Link :href="$route('home')" class="nav-link">Home</Link>
        </li>
        <li class="nav-item">
            <Link :href="$route('register')" class="nav-link">Register</Link>
        </li>
        <li class="nav-item">
            <Link :href="$route('login')" class="nav-link">Login</Link>
        </li>

        <li class="nav-item">
            <Link :href="$route('dashboard')" class="nav-link">Dashboard</Link>
        </li>
    </ul>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3'
export default {
    components: {
        Link
    },
    setup(props) {

    }
}
</script>
