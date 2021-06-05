<template>
    <div class="mt-3 p-3">
        <label for="oku_card">OKU Card</label>
        <select
            v-model="form.oku_card"
            @change="form.clearErrors('oku_card')"
            class="w-full rounded-md shadow-sm"
            :class="
                form.errors.oku_card
                    ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                    : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
            "
            required
        >
            <option value="" disabled>Select OKU Status</option>
            <option :value="1">Yes</option>
            <option :value="0">No</option>
        </select>
        <span class="text-red-700 mt-2 text-sm">{{
            form.errors.oku_card
        }}</span>
    </div>
</template>

<script>
export default {
    props: ["form"]
};
</script>
