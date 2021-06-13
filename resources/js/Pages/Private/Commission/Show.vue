<template>
    <breeze-authenticated-layout>
        <template #title> - Show Commission </template>
        <template #header>
            <inertia-link
                :href="route('commissions.index')"
                class="btn btn-secondary"
            >
                <i class="fas fa-chevron-left"></i>
            </inertia-link>
            <h6 class="pt-2.5 mx-auto">View existing commission</h6>
        </template>
        <template #nav>
            <breeze-nav-link :href="route('commissions.index')" :active="false">
                Commissions
            </breeze-nav-link>
            <span
                class="
                    inline-flex
                    items-center
                    px-1
                    pt-1
                    border-b-2 border-indigo-400
                    text-sm
                    font-medium
                    leading-5
                    text-gray-900
                    focus:outline-none
                    focus:border-indigo-700
                    transition
                    duration-150
                    ease-in-out
                "
            >
                Commission
            </span>
        </template>

        <div
            class="
                p-6
                bg-white
                border-b border-gray-200
                max-w-7xl
                shadow
                sm:rounded-lg
            "
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Car Details</th>
                    <th class="px-3 py-3">Visit Time</th>
                </tr>
                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit"
                            class="
                                px-3
                                py-3
                                flex
                                items-center
                                focus:text-indigo-500
                            "
                            :href="route('queues.show', commission.queue)"
                        >
                            {{
                                commission.queue.car.model +
                                " - " +
                                commission.queue.car.plate_no
                            }}
                        </inertia-link>
                    </td>
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit"
                            class="
                                px-3
                                py-3
                                flex
                                items-center
                                focus:text-indigo-500
                            "
                            :href="route('queues.show', commission.queue)"
                        >
                            {{ readableForHumans(commission.queue.created_at) }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit"
                            class="px-3 flex items-center"
                            :href="route('queues.show', commission.queue)"
                            tabindex="-1"
                        >
                            <i class="fas fa-eye"></i>
                        </inertia-link>
                    </td>
                </tr>
            </table>
        </div>

        <div
            class="
                mt-3
                p-6
                bg-white
                border-b border-gray-200
                max-w-7xl
                shadow
                sm:rounded-lg
            "
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Product Name</th>
                    <th
                        class="px-3 py-3"
                        v-if="commission.claimable.custom_price"
                    >
                        Product Price (RM)
                    </th>
                </tr>
                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit"
                            class="
                                px-3
                                py-3
                                flex
                                items-center
                                focus:text-indigo-500
                            "
                            :href="
                                commission.claimable_type ==
                                'App\\Models\\Package'
                                    ? route(
                                          'packages.show',
                                          commission.claimable
                                      )
                                    : route(
                                          'services.show',
                                          commission.claimable
                                      )
                            "
                        >
                            {{ commission.claimable.name }}
                        </inertia-link>
                    </td>
                    <td
                        class="border-t"
                        v-if="commission.claimable.custom_price"
                    >
                        <inertia-link
                            style="color: inherit; text-decoration: inherit"
                            class="
                                px-3
                                py-3
                                flex
                                items-center
                                focus:text-indigo-500
                            "
                            :href="
                                commission.claimable_type ==
                                'App\\Models\\Package'
                                    ? route(
                                          'packages.show',
                                          commission.claimable
                                      )
                                    : route(
                                          'services.show',
                                          commission.claimable
                                      )
                            "
                        >
                            {{
                                commission.claimable_type ==
                                "App\\Models\\Package"
                                    ? (
                                          commission.queue
                                              .package_custom_price / 100
                                      ).toFixed(2)
                                    : getServiceCommission(
                                          commission.claimable_id
                                      )
                            }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit"
                            class="px-3 flex items-center"
                            :href="
                                commission.claimable_type ==
                                'App\\Models\\Package'
                                    ? route(
                                          'packages.show',
                                          commission.claimable
                                      )
                                    : route(
                                          'services.show',
                                          commission.claimable
                                      )
                            "
                            tabindex="-1"
                        >
                            <i class="fas fa-eye"></i>
                        </inertia-link>
                    </td>
                </tr>
            </table>
        </div>

        <div
            v-if="commission.user"
            class="
                mt-3
                p-6
                bg-white
                border-b border-gray-200
                max-w-7xl
                shadow
                sm:rounded-lg
            "
        >
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                    <th class="px-3 py-3">Crew Name</th>
                </tr>
                <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                    <td class="border-t">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit"
                            class="
                                px-3
                                py-3
                                flex
                                items-center
                                focus:text-indigo-500
                            "
                            :href="route('crews.show', commission.user)"
                        >
                            {{ commission.user.name }}
                        </inertia-link>
                    </td>
                    <td class="border-t w-px md:table-cell hidden">
                        <inertia-link
                            style="color: inherit; text-decoration: inherit"
                            class="px-3 flex items-center"
                            :href="route('crews.show', commission.user)"
                            tabindex="-1"
                        >
                            <i class="fas fa-eye"></i>
                        </inertia-link>
                    </td>
                </tr>
            </table>
        </div>

        <div v-if="!commission.user" class="input-group pt-3">
            <input
                type="text"
                id="search"
                placeholder="Search crew..."
                class="
                    col
                    rounded-md
                    shadow-sm
                    border-gray-300
                    focus:border-indigo-300
                    focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                "
                v-model="formCrew.query"
            />
        </div>

        <div
            v-if="!commission.user && !formCrew.query && crews.length == 0"
            class="
                mb-3
                p-6
                bg-white
                border-b border-gray-200
                max-w-7xl
                shadow
                sm:rounded-lg
            "
        >
            This commission is not linked to any detailer.
            <span
                @click="viewAllDetailers"
                class="text-blue-500 text-decoration-none cursor-pointer"
            >
                View all detailers?
            </span>
        </div>

        <div
            v-if="formCrew.query && crews.length == 0"
            class="
                mb-3
                p-6
                bg-white
                border-b border-gray-200
                max-w-7xl
                shadow
                sm:rounded-lg
            "
        >
            Oops, we could not find any matching crews.
        </div>

        <transition name="fade">
            <div
                v-if="crews.length > 0"
                class="
                    mb-3
                    p-6
                    bg-white
                    border-b border-gray-200
                    max-w-7xl
                    shadow
                    sm:rounded-lg
                "
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
                            class="
                                border-t
                                pl-3
                                py-3
                                flex
                                items-center
                                focus:text-indigo-500
                            "
                        >
                            {{ crew.name }}
                        </td>
                        <td class="border-t w-px md:table-cell hidden pr-3">
                            <breeze-button
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
            class="
                mt-3
                p-6
                bg-white
                border-b border-gray-200
                max-w-7xl
                shadow
                sm:rounded-lg
            "
        >
            <div class="container">
                <form>
                    <div class="mt-3 p-3">
                        <label for="value">Commission Value (RM)</label>
                        <input
                            type="number"
                            step=".05"
                            id="value"
                            class="
                                w-full
                                rounded-md
                                shadow-sm
                                border-gray-300
                                focus:border-indigo-300
                                focus:ring
                                focus:ring-indigo-200
                                focus:ring-opacity-50
                            "
                            :value="(commission.value / 100).toFixed(2)"
                            disabled
                        />
                    </div>
                    <div
                        class="
                            mt-3
                            p-3
                            bg-gray-50
                            border-t border-gray-100
                            row
                            justify-between
                        "
                    ></div>
                </form>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import BreezeNavLink from "@/Components/NavLink";
import BreezeButton from "@/Components/Button";
import moment from "moment-timezone";
import throttle from "lodash/throttle";

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeNavLink,
        BreezeButton,
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object,
        commission: Object,
    },

    data() {
        return {
            formCrew: {
                query: null,
            },
            crews: [],
        };
    },

    watch: {
        formCrew: {
            deep: true,
            handler: throttle(function () {
                if (this.formCrew.query && this.formCrew.query != "") {
                    axios
                        .get(route("crews.healths"), {
                            params: {
                                query: this.formCrew.query,
                            },
                        })
                        .then((response) => {
                            this.crews = response.data;
                        });
                } else {
                    this.crews = [];
                }
            }, 150),
        },
    },

    methods: {
        readableForHumans(date) {
            return moment(date)
                .tz("Asia/Kuala_Lumpur")
                .format("MMMM Do YYYY, HH:mm:ss");
        },
        getServiceCommission(service_id) {
            let service = this.commission.queue.services.filter(function (
                service
            ) {
                return service.id === service_id;
            })[0];
            return (service.pivot.custom_price / 100).toFixed(2);
        },
        viewAllDetailers() {
            axios.get(route("detailers.all")).then((response) => {
                this.crews = response.data;
            });
        },
        linkCrew(crew) {
            alert("Not yet (link " + crew.name + ")");
        },
    },
};
</script>
