<template>
    <div class="p-4 bg-yellow-300 rounded flex items-center justify-between">
        <div class="flex items-center">
            <i class="fas fa-trash mr-3"></i>
            <div class="text-sm font-medium text-yellow-800">
                <slot />
            </div>
        </div>
        <button
            v-if="hasAnyPermission(['restore_deleted'])"
            class="text-sm text-yellow-800 hover:underline"
            tabindex="-1"
            type="button"
            @click="$emit('restore')"
        >
            Restore
        </button>
    </div>
</template>
