<template>
    <div>
        <div
            v-if="$page.props.flash.success && show"
            class="mb-8 flex items-center justify-between bg-green-500 rounded"
        >
            <div class="flex items-center">
                <svg
                    class="ml-4 mr-2 flex-shrink-0 w-4 h-4 fill-white"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                >
                    <polygon points="0 11 2 9 7 14 18 3 20 5 7 18" />
                </svg>
                <div class="py-4 text-white text-sm font-medium">
                    <span v-html="$page.props.flash.success"></span>
                </div>
            </div>
            <button type="button" class="group mr-2 p-2" @click="show = false">
                <svg
                    class="block w-2 h-2 fill-green-800 group-hover:fill-white"
                    xmlns="http://www.w3.org/2000/svg"
                    width="235.908"
                    height="235.908"
                    viewBox="278.046 126.846 235.908 235.908"
                >
                    <path
                        d="M506.784 134.017c-9.56-9.56-25.06-9.56-34.62 0L396 210.18l-76.164-76.164c-9.56-9.56-25.06-9.56-34.62 0-9.56 9.56-9.56 25.06 0 34.62L361.38 244.8l-76.164 76.165c-9.56 9.56-9.56 25.06 0 34.62 9.56 9.56 25.06 9.56 34.62 0L396 279.42l76.164 76.165c9.56 9.56 25.06 9.56 34.62 0 9.56-9.56 9.56-25.06 0-34.62L430.62 244.8l76.164-76.163c9.56-9.56 9.56-25.06 0-34.62z"
                    />
                </svg>
            </button>
        </div>
        <div
            v-if="$page.props.flash.warning && show"
            class="mb-8 flex items-center justify-between bg-yellow-300 rounded"
        >
            <div class="flex items-center">
                <!-- <svg
                    class="ml-4 mr-2 flex-shrink-0 w-4 h-4 fill-white"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                >
                    <polygon points="0 11 2 9 7 14 18 3 20 5 7 18" />
                </svg> -->
                <svg
                    fill="none"
                    viewBox="0 0 24 24"
                    class="ml-4 mr-2 flex-shrink-0 w-4 h-4 fill-white"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                </svg>
                <div class="py-4 text-yellow-800 text-sm font-medium">
                    <span v-html="$page.props.flash.warning"></span>
                </div>
            </div>
            <button type="button" class="group mr-2 p-2" @click="show = false">
                <svg
                    class="block w-2 h-2 fill-yellow-800 group-hover:fill-white"
                    xmlns="http://www.w3.org/2000/svg"
                    width="235.908"
                    height="235.908"
                    viewBox="278.046 126.846 235.908 235.908"
                >
                    <path
                        d="M506.784 134.017c-9.56-9.56-25.06-9.56-34.62 0L396 210.18l-76.164-76.164c-9.56-9.56-25.06-9.56-34.62 0-9.56 9.56-9.56 25.06 0 34.62L361.38 244.8l-76.164 76.165c-9.56 9.56-9.56 25.06 0 34.62 9.56 9.56 25.06 9.56 34.62 0L396 279.42l76.164 76.165c9.56 9.56 25.06 9.56 34.62 0 9.56-9.56 9.56-25.06 0-34.62L430.62 244.8l76.164-76.163c9.56-9.56 9.56-25.06 0-34.62z"
                    />
                </svg>
            </button>
        </div>
        <div
            v-if="
                ($page.props.flash.error ||
                    Object.keys($page.props.errors).length > 0) &&
                    show
            "
            class="mb-8 flex items-center justify-between bg-red-400 rounded"
        >
            <div class="flex items-center">
                <svg
                    class="ml-4 mr-2 flex-shrink-0 w-4 h-4 fill-white"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm1.41-1.41A8 8 0 1 0 15.66 4.34 8 8 0 0 0 4.34 15.66zm9.9-8.49L11.41 10l2.83 2.83-1.41 1.41L10 11.41l-2.83 2.83-1.41-1.41L8.59 10 5.76 7.17l1.41-1.41L10 8.59l2.83-2.83 1.41 1.41z"
                    />
                </svg>
                <div
                    v-if="$page.props.flash.error"
                    class="py-4 text-white text-sm font-medium"
                >
                    <span v-html="$page.props.flash.error"></span>
                </div>
                <div v-else class="py-4 text-white text-sm font-medium">
                    <span v-if="Object.keys($page.props.errors).length === 1"
                        >There is one form error.</span
                    >
                    <span v-else
                        >There are
                        {{ Object.keys($page.props.errors).length }} form
                        errors.</span
                    >
                </div>
            </div>
            <button type="button" class="group mr-2 p-2" @click="show = false">
                <svg
                    class="block w-2 h-2 fill-red-800 group-hover:fill-white"
                    xmlns="http://www.w3.org/2000/svg"
                    width="235.908"
                    height="235.908"
                    viewBox="278.046 126.846 235.908 235.908"
                >
                    <path
                        d="M506.784 134.017c-9.56-9.56-25.06-9.56-34.62 0L396 210.18l-76.164-76.164c-9.56-9.56-25.06-9.56-34.62 0-9.56 9.56-9.56 25.06 0 34.62L361.38 244.8l-76.164 76.165c-9.56 9.56-9.56 25.06 0 34.62 9.56 9.56 25.06 9.56 34.62 0L396 279.42l76.164 76.165c9.56 9.56 25.06 9.56 34.62 0 9.56-9.56 9.56-25.06 0-34.62L430.62 244.8l76.164-76.163c9.56-9.56 9.56-25.06 0-34.62z"
                    />
                </svg>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            show: true
        };
    },
    watch: {
        "$page.props.flash": {
            handler() {
                this.show = true;
            },
            deep: true
        }
    }
};
</script>
