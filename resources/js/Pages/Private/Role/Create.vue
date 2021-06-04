<template>
    <breeze-authenticated-layout>
        <template #title>
            - Create Role
        </template>
        <template #header>
            <inertia-link
                :href="route('roles.index')"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Add new role
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
                <form @submit.prevent="submit">
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

                    <div class="mt-3 p-3">
                        <label for="search">Permissions (optional)</label>
                        <div class="input-group">
                            <input
                                type="text"
                                id="searchPermission"
                                placeholder="Search permission..."
                                class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="formPermission.query"
                            />
                        </div>

                        <div
                            v-if="
                                formPermission.query && permissions.length == 0
                            "
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
                                        <th class="px-3 py-3">
                                            Permission Name
                                        </th>
                                    </tr>
                                    <tr
                                        v-for="permission in permissions"
                                        :key="permission.id"
                                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                                    >
                                        <td
                                            class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                                        >
                                            {{ toTitle(permission.name) }}
                                        </td>
                                        <td
                                            class="border-t w-px md:table-cell hidden pr-3"
                                        >
                                            <breeze-button
                                                v-if="
                                                    !selectedPermissions.some(
                                                        data =>
                                                            data.id ===
                                                            permission.id
                                                    )
                                                "
                                                type="button"
                                                @click="
                                                    selectPermission(permission)
                                                "
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
                            v-if="selectedPermissions.length > 0"
                            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                        >
                            <table class="w-full whitespace-nowrap">
                                <tr class="text-left font-bold">
                                    <th class="px-3 py-3">
                                        Selected Permissions Name
                                    </th>
                                </tr>
                                <tr
                                    v-for="(permission,
                                    index) in selectedPermissions"
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
                                    <td
                                        class="border-t w-px md:table-cell hidden pr-3"
                                    >
                                        <breeze-button
                                            type="button"
                                            @click="removePermission(index)"
                                            tabindex="-1"
                                        >
                                            <i class="fas fa-times"></i>
                                        </breeze-button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="mt-3 p-3">
                        <label for="search">Crews (optional)</label>
                        <div class="input-group">
                            <input
                                type="text"
                                id="searchCrew"
                                placeholder="Search crew..."
                                class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="formCrew.query"
                            />
                        </div>

                        <div
                            v-if="formCrew.query && crews.length == 0"
                            class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                        >
                            Oops, we could not find any crews without a role.
                        </div>

                        <transition name="fade">
                            <div
                                v-if="crews.length > 0"
                                class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                            >
                                <table class="w-full whitespace-nowrap">
                                    <tr class="text-left font-bold">
                                        <th class="px-3 py-3">Crew Name</th>
                                    </tr>
                                    <tr
                                        v-for="crew in crews"
                                        :key="crew.id"
                                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                                    >
                                        <td
                                            class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                                        >
                                            {{ crew.name }}
                                        </td>
                                        <td
                                            class="border-t w-px md:table-cell hidden pr-3"
                                        >
                                            <breeze-button
                                                v-if="
                                                    !selectedCrews.some(
                                                        data =>
                                                            data.id === crew.id
                                                    )
                                                "
                                                type="button"
                                                @click="selectCrew(crew)"
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
                            v-if="selectedCrews.length > 0"
                            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                        >
                            <table class="w-full whitespace-nowrap">
                                <tr class="text-left font-bold">
                                    <th class="px-3 py-3">
                                        Selected Crew Name
                                    </th>
                                </tr>
                                <tr
                                    v-for="(crew, index) in selectedCrews"
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
                                    <td
                                        class="border-t w-px md:table-cell hidden pr-3"
                                    >
                                        <breeze-button
                                            type="button"
                                            @click="removeCrew(index)"
                                            tabindex="-1"
                                        >
                                            <i class="fas fa-times"></i>
                                        </breeze-button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <inertia-link
                            :href="route('roles.index')"
                            class="btn btn-secondary"
                        >
                            Back
                        </inertia-link>
                        <breeze-button
                            :class="{
                                'opacity-25': form.processing
                            }"
                            :disabled="form.processing"
                        >
                            Submit
                        </breeze-button>
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
        flash: Object
    },

    setup() {
        const form = useForm({
            name: null,
            permissions: [],
            crews: []
        });

        return { form };
    },

    data() {
        return {
            formCrew: {
                query: null
            },
            crews: [],
            selectedCrews: [],
            formPermission: {
                query: null
            },
            permissions: [],
            selectedPermissions: []
        };
    },

    watch: {
        formCrew: {
            deep: true,
            handler: throttle(function() {
                if (this.formCrew.query && this.formCrew.query != "") {
                    axios
                        .get(route("crews.roles"), {
                            params: {
                                query: this.formCrew.query
                            }
                        })
                        .then(response => {
                            this.crews = response.data;
                        });
                } else {
                    this.crews = [];
                }
            }, 150)
        },
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
    },

    methods: {
        selectCrew(crew) {
            this.formCrew.query = "";
            this.crews = [];
            this.selectedCrews.push(crew);
        },
        removeCrew(index) {
            this.selectedCrews.splice(index, 1);
        },
        selectPermission(permission) {
            this.formPermission.query = "";
            this.permissions = [];
            this.selectedPermissions.push(permission);
        },
        removePermission(index) {
            this.selectedPermissions.splice(index, 1);
        },
        submit() {
            if (this.selectedPermissions.length > 0) {
                this.form.permissions = this.selectedPermissions.map(
                    permission => permission.id
                );
            }
            if (this.selectedCrews.length > 0) {
                this.form.crews = this.selectedCrews.map(crew => crew.id);
            }
            this.form.post(route("roles.store"));
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
