<template>
    <div class="mt-3 p-3">
        <label for="name">Name</label>
        <input
            type="text"
            id="name"
            class="w-full rounded-md shadow-sm"
            :class="
                form.errors.name
                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
            "
            v-model="form.name"
            @keydown="form.clearErrors('name')"
        />
        <span class="text-red-700 mt-2 text-sm">{{ form.errors.name }}</span>
    </div>
    <div class="mt-3 p-3">
        <label for="phone_no">Phone No</label>
        <input
            type="number"
            id="phone_no"
            class="w-full rounded-md shadow-sm"
            :class="
                form.errors.phone_no
                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
            "
            v-model="form.phone_no"
            @keydown="form.clearErrors('phone_no')"
        />
        <span class="text-red-700 mt-2 text-sm">{{
            form.errors.phone_no
        }}</span>
    </div>
    <div class="mt-3 p-3">
        <label for="email">Email</label>
        <input
            type="email"
            id="email"
            class="w-full rounded-md shadow-sm"
            :class="
                form.errors.email
                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
            "
            v-model="form.email"
            @keydown="form.clearErrors('email')"
        />
        <span class="text-red-700 mt-2 text-sm">{{ form.errors.email }}</span>
    </div>
    <div class="mt-3 p-3">
        <label for="role_id">Role</label>
        <select
            :disabled="!hasAnyPermission(['edit profile'])"
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
        <span class="text-red-700 mt-2 text-sm">{{ form.errors.role_id }}</span>
    </div>
    <div class="mt-3 p-3">
        <label for="store_id">Store</label>
        <select
            v-model="form.store_id"
            :disabled="!hasAnyPermission(['edit profile'])"
            @change="form.clearErrors('store_id')"
            class="w-full rounded-md shadow-sm"
            :class="
                form.errors.store_id
                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
            "
        >
            <option value="" disabled>Select Store</option>
            <option v-for="store in stores" :key="store.id" :value="store.id">
                {{ store.name }}
            </option>
        </select>
        <span class="text-red-700 mt-2 text-sm">{{
            form.errors.store_id
        }}</span>
    </div>
    <div class="mt-3 p-3">
        <label for="password">Password</label>
        <input
            type="password"
            id="password"
            class="w-full rounded-md shadow-sm"
            :class="
                form.errors.password
                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
            "
            v-model="form.password"
            @keydown="form.clearErrors('password')"
        />
        <span class="text-red-700 mt-2 text-sm">{{
            form.errors.password
        }}</span>
    </div>
    <div class="mt-3 p-3">
        <label for="password_confirmation">Confirm Password</label>
        <input
            type="password"
            id="password_confirmation"
            class="w-full rounded-md shadow-sm"
            :class="
                form.errors.password
                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
            "
            v-model="form.password_confirmation"
            @keydown="form.clearErrors('password')"
        />
        <span class="text-red-700 mt-2 text-sm">{{
            form.errors.password
        }}</span>
    </div>
</template>

<script>
export default {
    props: ["form", "stores", "roles"]
};
</script>
