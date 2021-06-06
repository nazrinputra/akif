<template>
    <div>
        <p class="text-lg mt-3 pt-3">First Emergency Contact</p>
        <div class="p-3">
            <label for="emergency_name_1">Name</label>
            <input
                type="text"
                id="emergency_name_1"
                class="w-full rounded-md shadow-sm"
                placeholder="Name"
                :class="
                    form.errors.emergency_name_1
                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                "
                :disabled="disabled"
                v-model="form.emergency_name_1"
                @keydown="form.clearErrors('emergency_name_1')"
            />
            <span class="text-red-700 mt-2 text-sm">{{
                form.errors.emergency_name_1
            }}</span>
        </div>
        <div class="p-3">
            <label for="emergency_phone_no_1">Phone No</label>
            <input
                type="number"
                id="emergency_phone_no_1"
                class="w-full rounded-md shadow-sm"
                placeholder="Phone No"
                :class="
                    form.errors.emergency_phone_no_1
                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                "
                :disabled="disabled"
                v-model="form.emergency_phone_no_1"
                @keydown="form.clearErrors('emergency_phone_no_1')"
            />
            <span class="text-red-700 mt-2 text-sm">{{
                form.errors.emergency_phone_no_1
            }}</span>
        </div>
        <div class="p-3">
            <label for="emergency_relation_1">Relation</label>
            <input
                type="text"
                id="emergency_relation_1"
                class="w-full rounded-md shadow-sm"
                placeholder="Relation"
                :class="
                    form.errors.emergency_relation_1
                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                "
                :disabled="disabled"
                v-model="form.emergency_relation_1"
                @keydown="form.clearErrors('emergency_relation_1')"
            />
            <span class="text-red-700 mt-2 text-sm">{{
                form.errors.emergency_relation_1
            }}</span>
        </div>
        <p class="mt-3 text-lg">Second Emergency Contact</p>
        <div class="p-3">
            <label for="emergency_name_2">Name</label>
            <input
                type="text"
                id="emergency_name_2"
                class="w-full rounded-md shadow-sm"
                placeholder="Name"
                :class="
                    form.errors.emergency_name_2
                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                "
                :disabled="disabled"
                v-model="form.emergency_name_2"
                @keydown="form.clearErrors('emergency_name_2')"
            />
            <span class="text-red-700 mt-2 text-sm">{{
                form.errors.emergency_name_2
            }}</span>
        </div>
        <div class="p-3">
            <label for="emergency_phone_no_2">Phone No</label>
            <input
                type="number"
                id="emergency_phone_no_2"
                class="w-full rounded-md shadow-sm"
                placeholder="Phone No"
                :class="
                    form.errors.emergency_phone_no_2
                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                "
                :disabled="disabled"
                v-model="form.emergency_phone_no_2"
                @keydown="form.clearErrors('emergency_phone_no_2')"
            />
            <span class="text-red-700 mt-2 text-sm">{{
                form.errors.emergency_phone_no_2
            }}</span>
        </div>
        <div class="p-3">
            <label for="emergency_relation_2">Relation</label>
            <input
                type="text"
                id="emergency_relation_2"
                class="w-full rounded-md shadow-sm"
                placeholder="Relation"
                :class="
                    form.errors.emergency_relation_2
                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                "
                :disabled="disabled"
                v-model="form.emergency_relation_2"
                @keydown="form.clearErrors('emergency_relation_2')"
            />
            <span class="text-red-700 mt-2 text-sm">{{
                form.errors.emergency_relation_2
            }}</span>
        </div>
    </div>
</template>

<script>
export default {
    props: ["form", "disabled"]
};
</script>
