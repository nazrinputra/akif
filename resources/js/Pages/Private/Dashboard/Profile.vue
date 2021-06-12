<template>
    <breeze-authenticated-layout>
        <template #title>
            - Profile
        </template>
        <template #header>
            <inertia-link :href="route('dashboard')" class="btn btn-secondary">
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                View logged in user profile.
            </h6>
        </template>
        <template #nav>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Profile
            </span>
        </template>

        <div
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <breeze-profile
                    :user="auth.user"
                    :stores="stores"
                    :roles="roles"
                    :healths="healths"
                />
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeButton from "@/Components/Button";
import BreezeProfile from "@/Components/Profile/Form";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeButton,
        BreezeProfile
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object,
        stores: Object,
        roles: Object,
        healths: Object
    }
};
</script>
