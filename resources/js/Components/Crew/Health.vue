<template>
    <div>
        <div class="mt-3 p-3">
            <label for="oku_card">OKU Card</label>
            <select
                v-model="form.oku_card"
                @change="form.clearErrors('oku_card')"
                class="w-full rounded-md shadow-sm"
                :class="
                    form.errors.oku_card
                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                "
                :disabled="disabled"
            >
                <option value="" disabled>Select OKU Status</option>
                <option :value="1">Yes</option>
                <option :value="0">No</option>
            </select>
            <span class="text-red-700 mt-2 text-sm">{{
                form.errors.oku_card
            }}</span>
        </div>

        <div class="mt-3 p-3">
            <label for="search">Health Conditions</label>
            <div class="input-group" v-if="!disabled">
                <input
                    type="text"
                    id="search"
                    placeholder="Search health condition..."
                    class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="formHealth.query"
                />
            </div>

            <div
                v-if="formHealth.query && healths.length == 0"
                class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                Oops, we could not find any matching health condition.
                <span
                    @click="viewAllHealths"
                    class="text-blue-500 text-decoration-none cursor-pointer"
                >
                    View all?
                </span>
            </div>

            <transition name="fade">
                <div
                    v-if="healths.length > 0"
                    class="mb-3 p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
                >
                    <table class="w-full whitespace-nowrap">
                        <tr class="text-left font-bold">
                            <th class="px-3 py-3">Health Condition</th>
                        </tr>
                        <tr
                            v-for="health in healths"
                            :key="health.id"
                            class="hover:bg-gray-100 focus-within:bg-gray-100"
                        >
                            <td
                                class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                            >
                                {{ health.name }}
                            </td>
                            <td class="border-t w-px md:table-cell hidden pr-3">
                                <breeze-button
                                    v-if="
                                        !selectedHealths.some(
                                            data => data.id === health.id
                                        )
                                    "
                                    type="button"
                                    @click="selectHealth(health)"
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
                v-if="selectedHealths.length > 0"
                class="p-6 bg-white border-b border-gray-200 max-w-7xl shadow sm:rounded-lg"
            >
                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="px-3 py-3">
                            Selected Health Condition
                        </th>
                    </tr>
                    <tr
                        v-for="(health, index) in selectedHealths"
                        :key="health.id"
                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                    >
                        <td class="border-t">
                            <inertia-link
                                style="color: inherit; text-decoration: inherit;"
                                class="px-3 py-3 flex items-center focus:text-indigo-500"
                                :href="route('healths.show', health)"
                            >
                                {{ health.name }}
                            </inertia-link>
                        </td>
                        <td
                            class="border-t w-px md:table-cell hidden pr-3"
                            v-if="!disabled"
                        >
                            <breeze-button
                                type="button"
                                @click="removeHealth(index)"
                                tabindex="-1"
                            >
                                <i class="fas fa-times"></i>
                            </breeze-button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import BreezeButton from "@/Components/Button";
import throttle from "lodash/throttle";

export default {
    props: ["form", "currentHealths", "disabled"],

    components: {
        BreezeButton
    },

    data() {
        return {
            formHealth: {
                query: null
            },
            healths: [],
            selectedHealths: []
        };
    },

    created() {
        if (this.currentHealths) {
            this.selectedHealths = this.currentHealths;
        }
    },

    watch: {
        formHealth: {
            deep: true,
            handler: throttle(function() {
                if (this.formHealth.query && this.formHealth.query != "") {
                    axios
                        .get(route("healths.search"), {
                            params: {
                                query: this.formHealth.query
                            }
                        })
                        .then(response => {
                            this.healths = response.data;
                        });
                } else {
                    this.healths = [];
                }
            }, 150)
        }
    },

    methods: {
        selectHealth(health) {
            this.formHealth.query = "";
            this.healths = [];
            this.selectedHealths.push(health);
            this.$emit("selectHealth", health);
        },
        removeHealth(index) {
            this.selectedHealths.splice(index, 1);
            this.$emit("removeHealth", index);
        },
        viewAllHealths() {
            axios.get(route("healths.all")).then(response => {
                this.healths = response.data;
            });
        }
    }
};
</script>
