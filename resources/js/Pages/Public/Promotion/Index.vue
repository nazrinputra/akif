<template>
    <breeze-customer-layout>
        <template #title>
            - Promotions
        </template>
        <div class="container pt-5 pb-3">
            <div id="empty" v-if="promotionsCount <= 0">
                <h2
                    class="page-section-heading text-secondary text-center text-uppercase py-4"
                >
                    Oops, we're sorry
                </h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <div class="divider-custom-line"></div>
                </div>
                <h2
                    class="page-section-heading text-secondary text-center text-uppercase py-4"
                >
                    No promotion are available
                </h2>
            </div>
            <div
                v-if="promotionsCount > 0"
                id="myCarousel"
                class="carousel slide shadow"
                data-ride="carousel"
            >
                <ol class="carousel-indicators">
                    <li
                        data-target="#myCarousel"
                        data-slide-to="0"
                        class="active"
                    ></li>
                    <li
                        v-for="(promotion, index) in otherPromotions"
                        v-bind:key="promotion.id"
                        data-target="#myCarousel"
                        :data-slide-to="index"
                    ></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <svg
                            class="bd-placeholder-img"
                            width="100%"
                            height="100%"
                            xmlns="http://www.w3.org/2000/svg"
                            role="img"
                            aria-label=" :  "
                            preserveAspectRatio="xMidYMid slice"
                            focusable="false"
                        >
                            <title></title>
                            <rect width="100%" height="100%" fill="#777" />
                            <text x="50%" y="50%" fill="#777" dy=".3em"></text>
                        </svg>

                        <div class="container">
                            <div class="carousel-caption">
                                <h1>{{ firstPromotion.name }}</h1>
                                <p>
                                    {{ firstPromotion.description }}
                                </p>
                                <p>
                                    <inertia-link
                                        class="btn btn-lg btn-primary"
                                        :href="
                                            route(
                                                'promotions.show',
                                                firstPromotion
                                            )
                                        "
                                        >View more</inertia-link
                                    >
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="carousel-item"
                        v-for="promotion in otherPromotions"
                        v-bind:key="promotion.id"
                    >
                        <svg
                            class="bd-placeholder-img"
                            width="100%"
                            height="100%"
                            xmlns="http://www.w3.org/2000/svg"
                            role="img"
                            aria-label=" :  "
                            preserveAspectRatio="xMidYMid slice"
                            focusable="false"
                        >
                            <title></title>
                            <rect width="100%" height="100%" fill="#777" />
                            <text x="50%" y="50%" fill="#777" dy=".3em"></text>
                        </svg>

                        <div class="container">
                            <div class="carousel-caption">
                                <h1>{{ promotion.name }}</h1>
                                <p>
                                    {{ promotion.description }}
                                </p>
                                <p>
                                    <inertia-link
                                        class="btn btn-lg btn-primary"
                                        :href="
                                            route('promotions.show', promotion)
                                        "
                                        >View promotion</inertia-link
                                    >
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <a
                    class="carousel-control-prev"
                    href="#myCarousel"
                    role="button"
                    data-slide="prev"
                >
                    <span
                        class="carousel-control-prev-icon"
                        aria-hidden="true"
                    ></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a
                    class="carousel-control-next"
                    href="#myCarousel"
                    role="button"
                    data-slide="next"
                >
                    <span
                        class="carousel-control-next-icon"
                        aria-hidden="true"
                    ></span>
                    <span class="sr-only">Next</span>
                </a>
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
        promotionsCount: Number,
        firstPromotion: Object,
        otherPromotions: Object
    }
};
</script>
