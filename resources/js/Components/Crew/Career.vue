<template>
    <div>
        <div class="mt-3 p-3">
            <label for="enrolled_at">Enrolled Date</label>
            <input
                type="date"
                id="enrolled_at"
                class="w-full rounded-md shadow-sm"
                :class="
                    form.errors.enrolled_at
                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                "
                v-model="form.enrolled_at"
                @change="form.clearErrors('enrolled_at')"
                :disabled="disabled"
            />
            <span class="text-red-700 mt-2 text-sm">{{
                form.errors.enrolled_at
            }}</span>
        </div>
        <div class="mt-3 p-3">
            <label for="resigned_at">Resigned Date</label>
            <input
                type="date"
                id="resigned_at"
                class="w-full rounded-md shadow-sm"
                :class="
                    form.errors.resigned_at
                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                "
                v-model="form.resigned_at"
                @change="form.clearErrors('resigned_at')"
                :disabled="disabled"
            />
            <span class="text-red-700 mt-2 text-sm">{{
                form.errors.resigned_at
            }}</span>
        </div>
        <div class="mt-3 p-3">
            <label for="role_id">Role</label>
            <select
                :disabled="!hasAnyPermission(['edit profile']) || disabled"
                v-model="form.role_id"
                @change="form.clearErrors('role_id')"
                class="w-full rounded-md shadow-sm"
                :class="
                    form.errors.role_id
                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                "
                required
            >
                <option value="" disabled>Select Role</option>
                <option v-for="role in roles" :key="role.id" :value="role.id">
                    {{ role.name }}
                </option>
            </select>
            <span class="text-red-700 mt-2 text-sm">{{
                form.errors.role_id
            }}</span>
        </div>
        <div class="mt-3 p-3">
            <label for="store_id">Store</label>
            <select
                v-model="form.store_id"
                :disabled="!hasAnyPermission(['edit profile']) || disabled"
                @change="form.clearErrors('store_id')"
                class="w-full rounded-md shadow-sm"
                :class="
                    form.errors.store_id
                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                "
                required
            >
                <option value="" disabled>Select Store</option>
                <option
                    v-for="store in stores"
                    :key="store.id"
                    :value="store.id"
                >
                    {{ store.name }}
                </option>
            </select>
            <span class="text-red-700 mt-2 text-sm">{{
                form.errors.store_id
            }}</span>
        </div>
    </div>
</template>

<script>
export default {
    props: ["form", "stores", "roles", "disabled"]
};
</script>
