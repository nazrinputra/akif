<template>
    <div>
        <div class="mt-3 p-3">
            <label for="status">Status</label>
            <select
                v-model="form.status"
                @change="form.clearErrors('status')"
                class="w-full rounded-md shadow-sm"
                :class="
                    form.errors.status
                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                "
                required
            >
                <option value="" disabled>Select Status</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Complicated">Complicated</option>
                <option value="Rather Not Say">Rather Not Say</option>
            </select>
            <span class="text-red-700 mt-2 text-sm">{{
                form.errors.status
            }}</span>
        </div>
        <div class="mt-3 p-3">
            <label for="shirt_size">Shirt Size</label>
            <select
                v-model="form.shirt_size"
                @change="form.clearErrors('shirt_size')"
                class="w-full rounded-md shadow-sm"
                :class="
                    form.errors.shirt_size
                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                "
                required
            >
                <option value="" disabled>Select Shirt Size</option>
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
                <option value="XXXL">XXXL</option>
            </select>
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
    </div>
</template>

<script>
export default {
    props: ["form"]
};
</script>
