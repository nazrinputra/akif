<template>
    <div class="mt-3 p-3">
        <label for="status">Status</label>
        <input
            type="text"
            id="status"
            class="w-full rounded-md shadow-sm"
            :class="
                form.errors.status
                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
            "
            v-model="form.status"
            @keydown="form.clearErrors('status')"
        />
        <span class="text-red-700 mt-2 text-sm">{{ form.errors.status }}</span>
    </div>
    <div class="mt-3 p-3">
        <label for="shirt_size">Shirt Size</label>
        <input
            type="text"
            id="shirt_size"
            class="w-full rounded-md shadow-sm"
            :class="
                form.errors.shirt_size
                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
            "
            v-model="form.shirt_size"
            @keydown="form.clearErrors('shirt_size')"
        />
        <span class="text-red-700 mt-2 text-sm">{{
            form.errors.shirt_size
        }}</span>
    </div>
    <div class="mt-3 p-3">
        <label for="motor_license">Motor License</label>
        <select
            v-model="form.motor_license"
            @change="form.clearErrors('motor_license')"
            class="w-full rounded-md shadow-sm"
            :class="
                form.errors.motor_license
                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
            "
            required
        >
            <option value="" disabled>Select Motor License</option>
            <option :value="1">Yes</option>
            <option :value="0">No</option>
        </select>
        <span class="text-red-700 mt-2 text-sm">{{
            form.errors.motor_license
        }}</span>
    </div>
    <div class="mt-3 p-3">
        <label for="car_license">Car License</label>
        <select
            v-model="form.car_license"
            @change="form.clearErrors('car_license')"
            class="w-full rounded-md shadow-sm"
            :class="
                form.errors.car_license
                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
            "
            required
        >
            <option value="" disabled>Select Car License Status</option>
            <option :value="1">Yes</option>
            <option :value="0">No</option>
        </select>
        <span class="text-red-700 mt-2 text-sm">{{
            form.errors.car_license
        }}</span>
    </div>
</template>

<script>
export default {
    props: ["form"]
};
</script>
