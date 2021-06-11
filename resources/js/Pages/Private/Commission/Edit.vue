<template>
    <breeze-authenticated-layout>
        <template #title>
            - Edit Health
        </template>
        <template #header>
            <inertia-link
                :href="route('healths.show', health)"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                Edit existing health condition
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('healths.index')" :active="false">
                Healths
            </breeze-nav-link>
            <breeze-nav-link
                :href="route('healths.show', health)"
                :active="false"
            >
                Health
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
                    @submit.prevent="form.put(route('healths.update', health))"
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
                placeholder="Search crew..."
                class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                v-model="formCrew.query"
            />
        </div>

        <div
            v-if="formCrew.query && crews.length == 0"
            class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            Oops, we could not find any matching crews.
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
                        <td class="border-t w-px md:table-cell hidden pr-3">
                            <breeze-button
                                v-if="
                                    !health.crews.some(
                                        data => data.id === crew.id
                                    )
                                "
                                type="button"
                                @click="linkCrew(crew)"
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
            v-if="health.crews.length > 0"
            class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Linked Crew Name</th>
                </tr>
                <tr
                    v-for="crew in health.crews"
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
                    <td class="border-t w-px md:table-cell hidden pr-3">
                        <breeze-button
                            type="button"
                            @click="unlinkCrew(crew)"
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
        health: Object
    },

    setup() {
        const form = useForm({
            name: null,
            description: null
        });

        return { form };
    },

    created() {
        this.loadData();
    },

    methods: {
        loadData() {
            this.form.name = this.health.name;
            this.form.description = this.health.description;
        },
        linkCrew(crew) {
            this.$inertia.post(
                route("crew.link"),
                {
                    health_id: this.health.id,
                    crew_id: crew.id
                },
                {
                    onSuccess: () => {
                        this.formCrew.query = "";
                        this.crews = [];
                        this.flash.success =
                            "Crew linked successfully to health condition.";
                    }
                }
            );
        },
        unlinkCrew(crew) {
            this.$inertia.post(
                route("crew.unlink"),
                {
                    health_id: this.health.id,
                    crew_id: crew.id
                },
                {
                    onSuccess: () => {
                        this.flash.warning =
                            "Crew unlinked from health condition. <a href='" +
                            route("crews.show", crew) +
                            " 'style='color:#92400e;text-decoration:underline;'>View crew</a>";
                    }
                }
            );
        }
    },

    data() {
        return {
            formCrew: {
                query: null
            },
            crews: []
        };
    },

    watch: {
        formCrew: {
            deep: true,
            handler: throttle(function() {
                if (this.formCrew.query && this.formCrew.query != "") {
                    axios
                        .get(route("crews.healths"), {
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
        }
    }
};
</script>
