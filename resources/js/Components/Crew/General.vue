<template>
    <div>
        <div class="mt-3 p-3">
            <label for="name">Name</label>
            <input
                type="text"
                id="name"
                class="w-full rounded-md shadow-sm"
                placeholder="Name"
                :class="
                    form.errors.name
                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                "
                v-model="form.name"
                @keydown="form.clearErrors('name')"
                :disabled="disabled"
                required
            />
            <span class="text-red-700 mt-2 text-sm">{{
                form.errors.name
            }}</span>
        </div>
        <div class="mt-3 p-3">
            <label for="phone_no">Phone No</label>
            <input
                type="number"
                id="phone_no"
                class="w-full rounded-md shadow-sm"
                placeholder="Phone No"
                :class="
                    form.errors.phone_no
                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                "
                v-model="form.phone_no"
                @keydown="form.clearErrors('phone_no')"
                :disabled="disabled"
                required
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
                placeholder="Email"
                :class="
                    form.errors.email
                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                "
                v-model="form.email"
                @keydown="form.clearErrors('email')"
                :disabled="disabled"
                required
            />
            <span class="text-red-700 mt-2 text-sm">{{
                form.errors.email
            }}</span>
        </div>
        <div
            class="mt-3 p-3"
            v-if="hasAnyPermission(['edit profile']) || !disabled"
        >
            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                class="w-full rounded-md shadow-sm"
                placeholder="Password"
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
        <div
            class="mt-3 p-3"
            v-if="hasAnyPermission(['edit profile']) || !disabled"
        >
            <label for="password_confirmation">Confirm Password</label>
            <input
                type="password"
                id="password_confirmation"
                class="w-full rounded-md shadow-sm"
                placeholder="Confirm Password"
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
    </div>
</template>

<script>
export default {
    props: ["form", "disabled"]
};
</script>
