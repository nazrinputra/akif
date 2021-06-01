<template>
    <breeze-authenticated-layout>
        <template #title>
            - Show Role
        </template>
        <template #header>
            <inertia-link
                :href="route('roles.index')"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                View existing role
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('roles.index')" :active="false">
                Roles
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Role
            </span>
        </template>

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
                            :value="role.name"
                            disabled
                        />
                    </div>

                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <breeze-button
                            v-if="
                                !role.deleted_at &&
                                    hasAnyPermission(['delete_roles'])
                            "
                            @click="destroy(role)"
                            type="button"
                        >
                            Delete
                        </breeze-button>
                        <inertia-link
                            v-if="
                                !role.deleted_at &&
                                    hasAnyPermission(['edit_roles'])
                            "
                            class="ml-auto btn btn-secondary"
                            as="button"
                            :href="route('roles.edit', role)"
                        >
                            Edit
                        </inertia-link>
                    </div>
                </form>
            </div>
        </div>

        <div
            v-if="crews.length > 0"
            class="mt-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Crews</th>
                </tr>
                <tr
                    v-for="crew in crews"
                    :key="crew.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('crews.show', crew)"
                        >
                            {{ crew.name }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 flex items-center"
                            :href="route('crews.show', crew)"
                            tabindex="-1"
                        >
                            <i class="fas fa-eye"></i>
                        </inertia-link>
                    </td>
                </tr>
            </table>
        </div>

        <div
            v-if="role.permissions.length > 0"
            class="mt-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap" id="accordionPermission">
                <tr
                    class="text-left font-bold"
                    id="headingPermission"
                    data-toggle="collapse"
                    data-target="#collapsePermission"
                    aria-expanded="true"
                    aria-controls="collapsePermission"
                >
                    <th class="px-3 py-3 hover:bg-gray-100" colspan="2">
                        Permissions
                    </th>
                </tr>
                <tr
                    v-for="permission in role.permissions"
                    :key="permission.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100 collapse"
                    id="collapsePermission"
                    aria-labelledby="headingPermission"
                    data-parent="#accordionPermission"
                >
                    <td class="border-t">
                        <span
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                        >
                            {{ toTitle(permission.name) }}
                        </span>
                    </td>
                </tr>
            </table>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeButton from "@/Components/Button";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeButton
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object,
        role: Object,
        crews: Object
    },

    methods: {
        destroy(role) {
            this.$inertia.delete(route("roles.destroy", role));
        },
        restore(role) {
            this.$inertia.put(route("roles.restore", role));
        },
        toTitle(string) {
            return string
                .split("_")
                .map(word => {
                    return word.slice(0, 1).toUpperCase() + word.slice(1);
                })
                .join(" ");
        }
    }
};
</script>
