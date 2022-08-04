<template>
    <div v-if="$page.props.success" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $page.props.success }}
    </div>
    <div v-if="$page.props.errors && Object.keys($page.props.errors).length > 0" class="alert alert-danger alert-dismissible fade show" role="alert">
        <p v-for="(error, index) of $page.props.errors" :key="index" class="mb-0">
            {{ error }}
        </p>
    </div>
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
