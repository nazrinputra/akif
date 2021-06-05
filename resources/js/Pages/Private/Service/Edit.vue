<template>
    <breeze-authenticated-layout>
        <template #title>
            - Edit Service
        </template>
        <template #header>
            <inertia-link
                :href="route('services.show', service)"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Edit existing service
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('services.index')" :active="false">
                Services
            </breeze-nav-link>
            <breeze-nav-link
                :href="route('services.show', service)"
                :active="false"
            >
                Service
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Edit
            </span>
        </template>

        <div
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <div class="container">
                <form
                    @submit.prevent="
                        form.put(route('services.update', service))
                    "
                >
                    <div class="mt-3 p-3">
                        <label for="name">Name</label>
                        <input
                            type="text"
                            id="name"
                            placeholder="Name"
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
                        <label for="custom_price">Custom Price</label>
                        <select
                            v-model="form.custom_price"
                            @change="form.clearErrors('custom_price')"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.custom_price
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            required
                        >
                            <option value="" disabled
                                >Select Custom Price</option
                            >
                            <option :value="1">Yes</option>
                            <option :value="0">No</option>
                        </select>
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.custom_price
                        }}</span>
                    </div>
                    <div class="mt-3 p-3">
                        <label for="price">Price (RM)</label>
                        <input
                            type="number"
                            placeholder="Price"
                            id="price"
                            step=".01"
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
                        <label for="commission">Commission (RM)</label>
                        <input
                            type="number"
                            placeholder="Commission"
                            id="commission"
                            step=".01"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.commission
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.commission"
                            @keydown="form.clearErrors('commission')"
                            required
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.commission
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
                class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
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
                        <td class="border-t w-px md:table-cell hidden pr-3">
                            <breeze-button
                                v-if="
                                    !service.packages.some(
                                        data => data.id === pkg.id
                                    )
                                "
                                type="button"
                                @click="linkPackage(pkg)"
                                tabindex="-1"
                            >
                                <i class="fas fa-link"></i>
                            </breeze-button>
                        </td>
                    </tr>
                </table>
            </div>
        </transition>

        <div
            v-if="service.packages.length > 0"
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Package Name</th>
                </tr>
                <tr
                    v-for="pkg in service.packages"
                    :key="pkg.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('packages.show', pkg)"
                        >
                            {{ pkg.name }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden pr-3">
                        <breeze-button
                            type="button"
                            @click="unlinkPackage(pkg)"
                            tabindex="-1"
                        >
                            <i class="fas fa-unlink"></i>
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
        service: Object
    },

    setup() {
        const form = useForm({
            name: null,
            custom_price: null,
            price: null,
            commission: null,
            description: null
        });

        return { form };
    },

    created() {
        this.loadData();
    },

    methods: {
        loadData() {
            this.form.name = this.service.name;
            this.form.custom_price = this.service.custom_price;
            this.form.price = (this.service.price / 100).toFixed(2);
            this.form.commission = (this.service.commission / 100).toFixed(2);
            this.form.description = this.service.description;
        },
        linkPackage(pkg) {
            this.$inertia.post(
                route("package.link"),
                {
                    service_id: this.service.id,
                    package_id: pkg.id
                },
                {
                    onSuccess: () => {
                        this.formPackage.query = "";
                        this.packages = [];
                        this.flash.success =
                            "Package linked successfully to service.";
                    }
                }
            );
        },
        unlinkPackage(pkg) {
            this.$inertia.post(
                route("package.unlink"),
                {
                    service_id: this.service.id,
                    package_id: pkg.id
                },
                {
                    onSuccess: () => {
                        this.flash.warning =
                            "Package unlinked from service. <a href='" +
                            route("packages.show", pkg) +
                            " 'style='color:#92400e;text-decoration:underline;'>View package</a>";
                    }
                }
            );
        }
    },

    data() {
        return {
            formPackage: {
                query: null
            },
            packages: []
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
    }
};
</script>
