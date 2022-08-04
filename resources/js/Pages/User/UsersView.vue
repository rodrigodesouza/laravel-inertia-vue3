<template>
    <App>
        <h1>
            Users
            <Link :href="$route('users.create')" class="btn btn-primary float-end">Cadastrar</Link>
        </h1>
        <AlertMessage />
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <form class="d-flex mb-2" @submit.prevent="submit">
                    <input class="form-control me-2" type="search" placeholder="Search"
                        aria-label="Search" v-model="form.q" name="search"
                    >
                    <button class="btn btn-success" type="submit">Search</button>
                    <Link :href="$route('users')" class="btn btn-outline-primary ms-2" type="button">Todos</Link>
                </form>
                <div class="alert alert-warning" v-if="$route().params.q">
                    Resultado da busca por: <strong>{{ $route().params.q }}</strong>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <button type="button" class="btn btn-primary">
                    Usuários ativos <span class="badge bg-secondary">{{ active_users }}</span>
                </button>
                <button type="button" class="btn btn-warning ms-4">
                    Usuários inativos <span class="badge bg-secondary">{{ inactive_users }}</span>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody v-if="users.total > 0">
                        <tr v-for="user of users.data" :key="user.id">
                            <th scope="row">{{ user.id }}</th>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>
                                <Link :href="$route('users.edit', user.id)" class="btn btn-primary">Editar</Link>
                                <Link :href="$route('users.delete', user.id)" class="btn btn-danger ms-2"
                                    method="delete" as="button" type="button"
                                >
                                    Deletar
                                </Link>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot v-else>
                        <tr colspan="4">
                            <td>Nenhum resultado encontrado :/</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li v-for="(link, index) of users.links" :key="index"
                    :class="['page-item', (link.active == true ? 'active': ''), (link.url == null ? 'disabled': '')]"
                >
                    <Link :class="'page-link '" :href="link.url" v-html="link.label" :only="['users']"/>
                </li>
            </ul>
        </nav>
    </App>
</template>
<script>
import Navbar from "../../components/Navbar.vue";
import { Link, useForm } from '@inertiajs/inertia-vue3'
import AlertMessage from "../../components/AlertMessage.vue";
import App from "../Layout/App.vue";
import { defineComponent } from "vue";
import { Inertia } from "@inertiajs/inertia";
// import MenuComponent from '../components/MenuComponent.vue'
export default defineComponent({
    name: 'UsersView',
    props: {
      users: Object,
      active_users: Number,
      inactive_users: Number,
    },
    components: {
       Navbar,
        Link,
        AlertMessage,
        App,
    },
    setup(props) {
        const form = useForm({
            q: null,
        })

        function submit() {
            if (form.q) {
                Inertia.visit(route('users', {
                    _query: {q: form.q}
                }), {only: ['users'],}); //Only: devolve apenas o valor de 'users' atualizado
            }
        }

        return { form, submit }
    }
})
</script>
