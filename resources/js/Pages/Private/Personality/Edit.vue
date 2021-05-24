<template>
    <breeze-authenticated-layout>
        <teleport to="title">
            - Edit Personality
        </teleport>
        <template #header>
            <inertia-link
                :href="route('personalities.index')"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">
                View existing personality
            </h6>
        </template>
        <template #nav>
            <breeze-nav-link
                :href="route('personalities.index')"
                :active="false"
            >
                Personalities
            </breeze-nav-link>
            <span
                class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
            >
                Personality
            </span>
        </template>
        <breeze-trashed-message
            v-if="personality.deleted_at"
            class="mb-6"
            @restore="restore(personality)"
        >
            This personality has been deleted.
        </breeze-trashed-message>
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
                            id="name"
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.name
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.name"
                            @keydown="form.clearErrors('name')"
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
                            class="w-full rounded-md shadow-sm"
                            :class="
                                form.errors.description
                                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                            "
                            v-model="form.description"
                            @keydown="form.clearErrors('description')"
                        />
                        <span class="text-red-700 mt-2 text-sm">{{
                            form.errors.description
                        }}</span>
                    </div>
                    <div
                        class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
                    >
                        <inertia-link
                            v-if="!personality.deleted_at"
                            as="button"
                            @click="destroy(personality)"
                            class="btn btn-outline-secondary"
                        >
                            Delete
                        </inertia-link>
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
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeResponsiveNavLink from "@/Components/ResponsiveNavLink";
import BreezeButton from "@/Components/Button";
import BreezeTrashedMessage from "@/Components/TrashedMessage";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeResponsiveNavLink,
        BreezeButton,
        BreezeTrashedMessage
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
            this.form.description = this.personality.description;
        },
        destroy(personality) {
            this.$inertia.delete(route("personalities.destroy", personality));
        },
        restore(personality) {
            this.$inertia.put(route("personalities.restore", personality));
        }
    }
};
</script>