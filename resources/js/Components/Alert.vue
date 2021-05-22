<template>
    <div
        class="fixed-top mb-0 alert alert-dismissible fade show text-center"
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
