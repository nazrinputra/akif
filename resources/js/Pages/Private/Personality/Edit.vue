<template>
    <breeze-authenticated-layout>
        <template #title>
            - Edit Personality
        </template>
        <template #header>
            <inertia-link
                :href="route('personalities.show', personality)"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Edit existing personality
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link
                :href="route('personalities.index')"
                :active="false"
            >
                Personalities
            </breeze-nav-link>
            <breeze-nav-link
                :href="route('personalities.show', personality)"
                :active="false"
            >
                Personality
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
                        form.put(route('personalities.update', personality))
                    "
                >
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
                        <label for="color">Color</label>
                        <select
                            v-model="form.color"
                            @change="form.clearErrors('color')"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.color
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            required
                        >
                            <option value="" disabled>Select Color</option>
                            <option value="Green">Green</option>
                            <option value="Yellow">Yellow</option>
                            <option value="Red">Red</option>
                            <option value="Black">Black</option>
                        </select>
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.color
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
                placeholder="Search customer..."
                class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                v-model="formCustomer.query"
            />
        </div>

        <div
            v-if="formCustomer.query && customers.length == 0"
            class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            Oops, we could not find any matching customers.
        </div>

        <transition name="fade">
            <div
                v-if="customers.length > 0"
                class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="px-3 py-3">Customer Name</th>
                    </tr>
                    <tr
                        v-for="customer in customers"
                        :key="customer.id"
                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                    >
                        <td
                            class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                        >
                            {{ customer.name }}
                        </td>
                        <td class="border-t w-px md:table-cell hidden pr-3">
                            <breeze-button
                                v-if="
                                    !personality.customers.some(
                                        data => data.id === customer.id
                                    )
                                "
                                type="button"
                                @click="linkCustomer(customer)"
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
            v-if="personality.customers.length > 0"
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Linked Customer Name</th>
                </tr>
                <tr
                    v-for="customer in personality.customers"
                    :key="customer.id"
                    class="hover:bg-gray-100 focus-within:bg-gray-100"
                >
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit;"
                            class="px-3 py-3 flex items-center focus:text-indigo-500"
                            :href="route('customers.show', customer)"
                        >
                            {{ customer.name }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden pr-3">
                        <breeze-button
                            type="button"
                            @click="unlinkCustomer(customer)"
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
        personality: Object
    },

    setup() {
        const form = useForm({
            name: null,
            color: "",
            description: null
        });

        return { form };
    },

    created() {
        this.loadData();
    },

    methods: {
        loadData() {
            this.form.name = this.personality.name;
            this.form.color = this.personality.color;
            this.form.description = this.personality.description;
        },
        linkCustomer(customer) {
            this.$inertia.post(
                route("personality.link"),
                {
                    customer_id: customer.id,
                    personality_id: this.personality.id
                },
                {
                    onSuccess: () => {
                        this.formCustomer.query = "";
                        this.personalities = [];
                        this.flash.success =
                            "Customer linked successfully to personality. <a href='" +
                            route("customers.show", customer) +
                            " 'style='color:#fff;text-decoration:underline;'>View customer</a>";
                    }
                }
            );
        },
        unlinkCustomer(customer) {
            this.$inertia.post(
                route("personality.unlink"),
                {
                    personality_id: this.personality.id,
                    customer_id: customer.id
                },
                {
                    onSuccess: () => {
                        this.flash.warning =
                            "Customer unlinked from personality. <a href='" +
                            route("customers.show", customer) +
                            " 'style='color:#92400e;text-decoration:underline;'>View customer</a>";
                    }
                }
            );
        }
    },

    data() {
        return {
            formCustomer: {
                query: null
            },
            customers: []
        };
    },

    watch: {
        formCustomer: {
            deep: true,
            handler: throttle(function() {
                if (this.formCustomer.query && this.formCustomer.query != "") {
                    axios
                        .get(route("customers.search"), {
                            params: {
                                query: this.formCustomer.query
                            }
                        })
                        .then(response => {
                            this.customers = response.data;
                        });
                } else {
                    this.customers = [];
                }
            }, 150)
        }
    }
};
</script>
