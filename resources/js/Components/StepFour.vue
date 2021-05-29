<template>
    <div class="container">
        <h5>Verify items here</h5>

        <div
            class="mt-3 p-3 bg-gray-50 border-t border-gray-100 row justify-between"
        >
            <breeze-button type="button" @click="back">
                Back
            </breeze-button>
            <breeze-button type="button" @click="next">
                Submit
            </breeze-button>
        </div>
    </div>
</template>

<script>
// import throttle from "lodash/throttle";
import BreezeButton from "@/Components/Button";

export default {
    components: {
        BreezeButton
    },

    // data() {
    //     return {
    //         formPackage: {
    //             query: null
    //         },
    //         packages: [],
    //         pkg: null
    //     };
    // },

    // watch: {
    //     formPackage: {
    //         deep: true,
    //         handler: throttle(function() {
    //             if (this.formPackage.query && this.formPackage.query != "") {
    //                 axios
    //                     .get(route("packages.search"), {
    //                         params: {
    //                             query: this.formPackage.query
    //                         }
    //                     })
    //                     .then(response => {
    //                         this.packages = response.data;
    //                     });
    //             } else {
    //                 this.packages = [];
    //             }
    //         }, 150)
    //     }
    // },

    // methods: {
    //     selectPackage(pkg) {
    //         this.pkg = pkg;
    //         this.formPackage.query = "";
    //         this.packages = [];
    //     },
    //     clearPackage() {
    //         this.pkg = null;
    //     }
    // },

    methods: {
        back() {
            this.$emit("back");
        },
        next() {
            this.$emit("next");
        }
    }
};
</script>
