<template>
    <div
        class="mb-0 alert alert-dismissible fade show text-center"
        role="alert"
    >
        <slot />
        <button
            type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Close"
        >
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</template>

<script>
// <template>
// <breeze-announcement class="alert-danger fixed-top">
//     Test announcement
// </breeze-announcement>
// </template>
// import BreezeAnnouncement from '@/Components/Announcement'

// export default {
//     components: {
//         BreezeAnnouncement
//     },
// }
</script>
