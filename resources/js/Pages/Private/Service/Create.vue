<template>
    <breeze-authenticated-layout>
        <template #title>
            - Create Service
        </template>
        <template #header>
            <inertia-link
                :href="route('services.index')"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Add new service
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('services.index')" :active="false">
                Services
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Service
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
                        <label for="price">Price</label>
                        <input
                            type="number"
                            placeholder="Price"
                            id="price"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.price
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.price"
                            @keydown="form.clearErrors('price')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.price
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="description">Description</label>
                        <textarea
                            rows="7"
                            id="description"
                            placeholder="Description"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.description
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.description"
                            @keydown="form.clearErrors('description')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.description
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="search">Package (optional)</label>
                        <div v-if="!pkg" class="input-group">
                            <input
                                type="text"
                                id="search"
                                placeholder="Search package..."
                                class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="formPackage.query"
                            />
                        </div>

                        <div
                            v-if="formPackage.query && packages.length == 0"
                            class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                        >
                            Oops, we could not find any matching packages.
                        </div>

                        <transition name="fade">
                            <div
                                v-if="packages.length > 0"
                                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                            >
                                <table class="w-full whitespace-nowrap">
                                    <tr class="text-left font-bold">
                                        <th class="px-3 py-3">Package Name</th>
                                    </tr>
                                    <tr
                                        v-for="pkg in packages"
                                        :key="pkg.id"
                                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                                    >
                                        <td
                                            class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                                        >
                                            {{ pkg.name }}
                                        </td>
                                        <td
                                            class="border-t w-px md:table-cell hidden pr-3"
                                        >
                                            <breeze-button
                                                @click="selectPackage(pkg)"
                                                type="button"
                                            >
                                                <i class="fas fa-check"></i>
                                            </breeze-button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </transition>

                        <transition name="fade">
                            <div
                                v-if="pkg"
                                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                            >
                                <table class="w-full whitespace-nowrap">
                                    <tr class="text-left font-bold">
                                        <th class="px-3 py-3">
                                            Selected Package Name
                                        </th>
                                    </tr>
                                    <tr
                                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                                    >
                                        <td
                                            class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                                        >
                                            {{ pkg.name }}
                                        </td>
                                        <td
                                            class="border-t w-px md:table-cell hidden pr-3"
                                        >
                                            <breeze-button
                                                @click="clearPackage()"
                                                type="button"
                                            >
                                                <i class="fas fa-times"></i>
                                            </breeze-button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </transition>
                    </div>
                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <inertia-link
                            :href="route('services.index')"
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
            price: null,
            description: null,
            package_id: null
        });

        return { form };
    },

    data() {
        return {
            formPackage: {
                query: null
            },
            packages: [],
            pkg: null
        };
    },

    watch: {
        formPackage: {
            deep: true,
            handler: throttle(function() {
                if (this.formPackage.query && this.formPackage.query != "") {
                    axios
                        .get(route("packages.search"), {
                            params: {
                                query: this.formPackage.query
                            }
                        })
                        .then(response => {
                            this.packages = response.data;
                        });
                } else {
                    this.packages = [];
                }
            }, 150)
        }
    },

    methods: {
        selectPackage(pkg) {
            this.pkg = pkg;
            this.formPackage.query = "";
            this.packages = [];
        },
        clearPackage() {
            this.pkg = null;
        },
        submit() {
            if (this.pkg) {
                this.form.package_id = this.pkg.id;
            }
            this.form.post(route("services.store"));
        }
    }
};
</script>
