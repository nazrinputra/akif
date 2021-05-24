<template>
    <breeze-authenticated-layout>
        <teleport to="title">
            - Profile
        </teleport>
        <template #header>
            <inertia-link :href="route('dashboard')" class="btn btn-secondary">
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                View logged in user profile.
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link
                :href="route('profile')"
                :active="route().current('profile')"
            >
                Profile
            </breeze-nav-link>
        </template>

        <template #responsive-nav>
            <breeze-responsive-nav-link
                :href="route('profile')"
                :active="route().current('profile')"
            >
                Profile
            </breeze-responsive-nav-link>
        </template>

        <div
            class="px-6 pb-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="row p-3">
                <div class="col pb-5">
                    <h2>Profile</h2>
                    <p>
                        View, add or edit my profile.
                    </p>
                    <p>{{ user.name }}</p>
                    <p>{{ user.store.name }}</p>
                    <i class="fas fa-tools text-9xl"></i>
                </div>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeResponsiveNavLink
    },

    props: {
        auth: Object,
        errors: Object,
        user: Object
    }
};
</script>
