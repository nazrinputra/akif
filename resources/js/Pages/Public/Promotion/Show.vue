<template>
    <breeze-customer-layout>
        <template #title> - {{ promotion.name }} </template>
        <div class="container p-4">
            <div
                class="row featurette pt-5 mt-4 shadow px-2 p-3 mb-5 bg-white rounded"
            >
                <div class="col-md-6">
                    <h1 class="featurette-heading ">
                        {{ promotion.name }}
                    </h1>
                    <h4>
                        Starting from RM{{ (promotion.price / 100).toFixed(2) }}
                    </h4>
                    <h5>
                        <span class="text-muted">
                            Frequency: {{ promotion.frequency }} <br />
                            Duration: {{ promotion.duration }} <br
                        /></span>
                    </h5>
                    <p class="lead">
                        {{ promotion.description }}
                    </p>
                    <span class="text-sm"
                        >*Price varies according to car sizes and
                        conditions</span
                    >
                </div>
                <!-- <div class="col-md-5">
                    <svg
                        class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        width="500"
                        height="500"
                        xmlns="http://www.w3.org/2000/svg"
                        role="img"
                        aria-label="Placeholder: 500x500"
                        preserveAspectRatio="xMidYMid slice"
                        focusable="false"
                    >
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#eee" />
                        <text x="50%" y="50%" fill="#aaa" dy=".3em">
                            500x500
                        </text>
                    </svg>
                </div> -->
                <div id="accordion" class="col-md-6 pb-4">
                    <div
                        class="card"
                        v-for="(service, index) in promotion.services"
                        v-bind:key="service.id"
                    >
                        <div class="card-header" :id="'header' + index">
                            <h5 class="mb-0">
                                <button
                                    class="btn btn-link"
                                    data-toggle="collapse"
                                    :data-target="'#body' + index"
                                    aria-expanded="true"
                                    :aria-controls="'body' + index"
                                >
                                    {{ service.name }}
                                </button>
                            </h5>
                        </div>

                        <div
                            :id="'body' + index"
                            class="collapse"
                            :aria-labelledby="'header' + index"
                            data-parent="#accordion"
                        >
                            <div class="card-body">
                                {{ service.description }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </breeze-customer-layout>
</template>

<script>
import BreezeCustomerLayout from "@/Layouts/Customer";

export default {
    components: {
        BreezeCustomerLayout
    },

    props: {
        auth: Object,
        errors: Object,
        flash: Object,
        promotion: Object
    }
};
</script>
