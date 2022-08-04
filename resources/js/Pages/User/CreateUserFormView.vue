<template>
    <App>
        <h1>{{ user?.id ? 'Edit' : 'Create' }} User</h1>
        <form @submit.prevent="form.post($route('users.store'), {onSuccess: () => form.reset('password'),})">
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputName" v-model="form.name">
                <div v-if="form.errors.name" class="text-danger">{{ form.errors.name }}</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" v-model="form.email">
                <div v-if="form.errors.email" class="text-danger">{{ form.errors.email }}</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" v-model="form.password">
                <div v-if="form.errors.password" class="text-danger">{{ form.errors.password }}</div>
            </div>
            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                {{ form.progress.percentage }}%
            </progress>
            <button type="submit" class="btn btn-primary" :disabled="form.processing">Register</button>
        </form>
    </App>
</template>
<script lang="ts">
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-vue3";
import { reactive } from "vue";
import Navbar from "../../components/Navbar.vue";
import App from "../Layout/App.vue";
// import MenuComponent from '../components/MenuComponent.vue'
export default {
    name: 'CreateUserFormView',
    props: [],
    components: {
        Navbar,
        App
    },
    setup(props) {
        // useForm: auxiliar de formulário
        const form = useForm({
            name: null,
            email: null,
            password: null
        })

        return { form };
    }
}
</script>
