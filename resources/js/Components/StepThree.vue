<template>
    <div class="container">
        <div class="p-3">
            <div v-if="!pkg" class="input-group">
                <input
                    type="text"
                    id="searchPackage"
                    placeholder="Search package..."
                    class="col rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="formPackage.query"
                />
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
                            <td class="border-t w-px md:table-cell hidden pr-3">
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
                        <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                            <td
                                class="border-t pl-3 py-3 flex items-center focus:text-indigo-500"
                            >
                                {{ pkg.name }}
                            </td>
                            <td class="border-t w-px md:table-cell hidden pr-3">
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
            this.$emit("selectPackage", this.pkg);
        },
        clearPackage() {
            this.pkg = null;
            this.$emit("clearPackage");
        },
        back() {
            this.$emit("back");
        },
        next() {
            this.$emit("next");
        }
    }
};
</script>
