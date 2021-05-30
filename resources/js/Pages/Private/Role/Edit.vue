<template>
    <breeze-authenticated-layout>
        <template #title>
            - Edit Role
        </template>
        <template #header>
            <inertia-link
                :href="route('roles.show', role)"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Edit existing role
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('roles.index')" :active="false">
                Roles
            </breeze-nav-link>
            <breeze-nav-link :href="route('roles.show', role)" :active="false">
                Role
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Edit
            </span>
        </template>

        <div
            class="mt-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <form @submit.prevent="form.put(route('roles.update', role))">
                    <div class="mt-3 p-3">
                        <label for="name">Name</label>
                        <input
                            type="text"
                            placeholder="Name"
                            id="name"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.name
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.name"
                            @keydown="form.clearErrors('name')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.name
                        }}</span>
                    </div>

                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <breeze-button
                            class="ml-auto"
                            :class="{
                                'opacity-25': form.processing
                            }"
                            :disabled="form.processing"
                        >
                            Update
                        </breeze-button>
                    </div>
                </form>
            </div>
        </div>

        <div class="input-group pt-3">
            <input
                type="text"
                id="search"
                placeholder="Search permission..."
                class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                v-model="formPermission.query"
            />
        </div>

        <div
            v-if="formPermission.query && permissions.length == 0"
            class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            Oops, we could not find any matching permissions.
        </div>

        <transition name="fade">
            <div
                v-if="permissions.length > 0"
                class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="px-3 py-3">Permissions</th>
                    </tr>
                    <tr
                        v-for="permission in permissions"
                        :key="permission.id"
                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                    >
                        <td class="border-t">
                            <span
                                class="px-3 py-3 flex items-center focus:text-indigo-500"
                            >
                                {{ toTitle(permission.name) }}
                            </span>
                        </td>
                        <td class="border-t w-px md:table-cell hidden pr-3">
                            <breeze-button
                                v-if="
                                    !role.permissions.some(
                                        data => data.id === permission.id
                                    )
                                "
                                type="button"
                                @click="givePermission(permission)"
                                tabindex="-1"
                            >
                                <i class="fas fa-check"></i>
                            </breeze-button>
                        </td>
                    </tr>
                </table>
            </div>
        </transition>

        <div
            v-if="role.permissions.length > 0"
            class="mt-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Allowed Permissions</th>
                </tr>
                <tr
                    v-for="permission in role.permissions"
                    :key="permission.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <span
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                        >
                            {{ toTitle(permission.name) }}
                        </span>
                    </td>
                    <td class="border-t w-px md:table-cell hidden pr-3">
                        <breeze-button
                            type="button"
                            @click="revokePermission(permission)"
                            tabindex="-1"
                        >
                            <i class="fas fa-times"></i>
                        </breeze-button>
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
import throttle from "lodash/throttle";
import { useForm } from "@inertiajs/inertia-vue3";

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
        role: Object
    },

    setup() {
        const form = useForm({
            name: null,
            phone_no: null
        });

        return { form };
    },

    created() {
        this.loadData();
    },

    methods: {
        loadData() {
            this.form.name = this.role.name;
        },
        toTitle(string) {
            return string
                .split("_")
                .map(word => {
                    return word.slice(0, 1).toUpperCase() + word.slice(1);
                })
                .join(" ");
        },
        revokePermission(permission) {
            this.$inertia.post(
                route("roles.revoke"),
                {
                    role_id: this.role.id,
                    permission_id: permission.id
                },
                {
                    onSuccess: () => {
                        this.flash.warning = "Permission revoked successfully.";
                    }
                }
            );
        },
        givePermission(permission) {
            this.$inertia.post(
                route("roles.give"),
                {
                    role_id: this.role.id,
                    permission_id: permission.id
                },
                {
                    onSuccess: () => {
                        this.formPermission.query = "";
                        this.permissions = [];
                        this.flash.success = "Permission added successfully.";
                    }
                }
            );
        }
    },

    data() {
        return {
            formPermission: {
                query: null
            },
            permissions: []
        };
    },

    watch: {
        formPermission: {
            deep: true,
            handler: throttle(function() {
                if (
                    this.formPermission.query &&
                    this.formPermission.query != ""
                ) {
                    axios
                        .get(route("permissions.search"), {
                            params: {
                                query: this.formPermission.query
                            }
                        })
                        .then(response => {
                            this.permissions = response.data;
                        });
                } else {
                    this.permissions = [];
                }
            }, 150)
        }
    }
};
</script>
