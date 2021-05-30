<template>
    <div class="container">
        <div class="p-3">
            <div class="input-group">
                <input
                    type="text"
                    id="searchService"
                    placeholder="Search service..."
                    class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="formService.query"
                />
            </div>

            <div
                v-if="formService.query && services.length == 0"
                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                Oops, we could not find any matching services.
                <span
                    @click="viewAll"
                    class="text-blue-500 text-decoration-none cursor-pointer"
                >
                    View all?
                </span>
            </div>

            <transition name="fade">
                <div
                    v-if="services.length > 0"
                    class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                >
                    <table class="w-full whitespace-nowrap">
                        <tr class="text-left font-bold">
                            <th class="px-3 py-3">Service Name</th>
                        </tr>
                        <tr
                            v-for="service in services"
                            :key="service.id"
                            class="hover:bg-gray-100 focus-within:bg-gray-100"
                        >
                            <td
                                class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                            >
                                {{ service.name }}
                            </td>
                            <td class="border-t w-px md:table-cell hidden pr-3">
                                <breeze-button
                                    v-if="
                                        !selectedServices.some(
                                            data => data.id === service.id
                                        )
                                    "
                                    type="button"
                                    @click="selectService(service)"
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
                v-if="selectedServices.length > 0"
                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="px-3 py-3">Selected Service Name</th>
                    </tr>
                    <tr
                        v-for="(service, index) in selectedServices"
                        :key="service.id"
                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                    >
                        <td class="border-t">
                            <inertia-link
                                style="color: inherit; text-decoration: inherit;"
                                class="px-3 py-3 flex items-center focus:text-indigo-500"
                                :href="route('services.show', service)"
                            >
                                {{ service.name }}
                            </inertia-link>
                        </td>
                        <td class="border-t w-px md:table-cell hidden pr-3">
                            <breeze-button
                                type="button"
                                @click="removeService(index)"
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
            <breeze-button type="button" @click="back">
                Back
            </breeze-button>
            <breeze-button type="button" @click="next">
                Next
            </breeze-button>
        </div>
    </div>
</template>

<script>
import throttle from "lodash/throttle";
import BreezeButton from "@/Components/Button";

export default {
    components: {
        BreezeButton
    },

    data() {
        return {
            formService: {
                query: null
            },
            services: [],
            selectedServices: []
        };
    },

    watch: {
        formService: {
            deep: true,
            handler: throttle(function() {
                if (this.formService.query && this.formService.query != "") {
                    axios
                        .get(route("services.search"), {
                            params: {
                                query: this.formService.query
                            }
                        })
                        .then(response => {
                            this.services = response.data;
                        });
                } else {
                    this.services = [];
                }
            }, 150)
        }
    },

    methods: {
        selectService(service) {
            this.formService.query = null;
            this.services = [];
            this.selectedServices.push(service);
            this.$emit("selectService", service);
        },
        removeService(index) {
            this.selectedServices.splice(index, 1);
            this.$emit("removeService", index);
        },
        back() {
            this.$emit("back");
        },
        next() {
            this.$emit("next");
        },
        viewAll() {
            axios.get(route("services.all")).then(response => {
                this.services = response.data;
            });
        }
    }
};
</script>
