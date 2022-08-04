<template>
    <MenuComponent />
    <div class="container-body">
        <h1>Login</h1>
        <AlertMessage />
        <form @submit.prevent="submit">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" v-model="form.email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" v-model="form.password">
            </div>
            <button type="submit" class="btn btn-primary" :disabled="form.processing">Login</button>
        </form>
    </div>
</template>
<script lang="ts">
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import Navbar from "../../components/Navbar.vue";
import AlertMessage from "../../components/AlertMessage.vue";
import MenuComponent from "../../components/MenuComponent.vue";
export default {
    name: 'LoginView',
    props: [],
    components: {
        Navbar,
        MenuComponent,
        AlertMessage
    },
    setup(props) {
        const form = reactive({
            first_name: null,
            last_name: null,
            email: null,
        })

        function submit() {
            Inertia.post(route('authenticate'), form)
        }

        return { form, submit }
    }
}
</script>
