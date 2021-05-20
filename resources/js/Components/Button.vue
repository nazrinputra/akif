<template>
    <button :type="type" class="btn btn-secondary">
        <slot />
    </button>
</template>

<script>
export default {
    props: {
        type: {
            type: String,
            default: "submit"
        }
    }
};
</script>
