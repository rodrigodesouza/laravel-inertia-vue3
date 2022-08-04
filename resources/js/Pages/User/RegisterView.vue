<template>
    <MenuComponent />
    <div class="container-body">
        <h1>Register user</h1>
        <form @submit.prevent="form.post($route('register.store'), {
                onSuccess: () => form.reset('password'),
            })"
        >
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
            <div class="mb-3">
                <label for="file" class="form-label">Imagem</label>
                <input type="file" class="form-control" id="file" @input="form.file = $event.target.files[0]">
                <div v-if="form.errors.file" class="text-danger">{{ form.errors.file }}</div>
            </div>
            <div class="progress mb-4" v-if="form.progress">
                <div class="progress-bar" role="progressbar" :style="`width:${form.progress.percentage}%`"
                :aria-valuenow="form.progress.percentage" aria-valuemin="0" aria-valuemax="100"
                >
                </div>
            </div>
            <button type="submit" class="btn btn-primary" :disabled="form.processing">
                Register
                <span v-if="form.processing" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            </button>
        </form>
    </div>
</template>
<script lang="ts">
import Navbar from "../../components/Navbar.vue";
import MenuComponent from "../../components/MenuComponent.vue";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    name: 'RegisterView',
    props: [],
    components: {
    Navbar,
        MenuComponent
    },
    setup(props) {
        // useForm: auxiliar de formulário
        const form = useForm({
            name: null,
            email: null,
            password: null,
            file: null,
        })

        return { form }
    }
}
</script>
