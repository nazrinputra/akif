<template>
    <breeze-authenticated-layout>
        <template #title>
            - Show Crew
        </template>
        <template #header>
            <inertia-link
                :href="route('crews.index')"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                View existing crew
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('crews.index')" :active="false">
                Crews
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Crew
            </span>
        </template>
        <breeze-trashed-message
            v-if="crew.deleted_at"
            class="mb-6"
            @restore="restore(crew)"
        >
            This crew has been deleted.
        </breeze-trashed-message>
        <div
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <form>
                    <div class="mt-3 p-3">
                        <label for="name">Name</label>
                        <input
                            type="text"
                            id="name"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="crew.name"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="phone_no">Phone No</label>
                        <input
                            type="number"
                            id="phone_no"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="crew.phone_no"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="email">Email</label>
                        <input
                            type="email"
                            id="email"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="crew.email"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="role_id">Role</label>
                        <input
                            type="text"
                            id="store"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="crew.roles[0].name"
                            disabled
                        />
                    </div>
                    <div class="mt-3 p-3">
                        <label for="store_id">Store</label>
                        <input
                            type="text"
                            id="store"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            :value="crew.store.name"
                            disabled
                        />
                    </div>

                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-start"
                    >
                        <breeze-button
                            v-if="
                                !crew.deleted_at &&
                                    hasAnyPermission(['delete_crews'])
                            "
                            @click="destroy(crew)"
                            type="button"
                        >
                            Delete
                        </breeze-button>
                        <inertia-link
                            v-if="
                                !crew.deleted_at &&
                                    hasAnyPermission(['edit_crews'])
                            "
                            class="ml-auto btn btn-secondary"
                            as="button"
                            :href="route('crews.edit', crew)"
                        >
                            Edit
                        </inertia-link>
                    </div>
                </form>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeButton from "@/Components/Button";
import BreezeTrashedMessage from "@/Components/TrashedMessage";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeButton,
        BreezeTrashedMessage
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object,
        crew: Object
    },

    methods: {
        destroy(crew) {
            this.$inertia.delete(route("crews.destroy", crew));
        },
        restore(crew) {
            this.$inertia.put(route("crews.restore", crew));
        }
    }
};
</script>
