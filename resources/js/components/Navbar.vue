<template>
    <nav class="navbar navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">{{ $page.props.auth.user.name }}</a>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">{{ $page.props.auth.user.name }}</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <Link :class="'nav-link'" aria-current="page" :href="$route('home')">
                                Site
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link :class="'nav-link' + ($route().current() == 'dashboard' ? ' active ' : '')" aria-current="page" :href="$route('dashboard')">
                                Dashboard
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link :class="'nav-link' + ($page.url.startsWith('/users') ? ' active ' : '')"
                                :href="$route('users')"
                            >
                                Usuários
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link" :href="$route('logout')">
                                Sair
                            </Link>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </nav>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3'
export default {
    components: {
        Link,
    }
}
</script>
