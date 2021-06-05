<template>
    <div>
        <div class="mt-3 p-3">
            <label for="address">Address</label>
            <input
                type="text"
                id="address"
                class="w-full rounded-md shadow-sm"
                :class="
                    form.errors.address
                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                "
                v-model="form.address"
                @keydown="form.clearErrors('address')"
            />
            <span class="text-red-700 mt-2 text-sm">{{
                form.errors.address
            }}</span>
        </div>
        <div class="mt-3 p-3">
            <label for="ic_no">IC No.</label>
            <input
                type="text"
                id="ic_no"
                class="w-full rounded-md shadow-sm"
                :class="
                    form.errors.ic_no
                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                "
                v-model="form.ic_no"
                @keydown="form.clearErrors('ic_no')"
            />
            <span class="text-red-700 mt-2 text-sm">{{
                form.errors.ic_no
            }}</span>
        </div>
        <div class="mt-3 p-3">
            <label for="bank">Bank</label>
            <input
                type="text"
                id="bank"
                class="w-full rounded-md shadow-sm"
                :class="
                    form.errors.bank
                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                "
                v-model="form.bank"
                @keydown="form.clearErrors('bank')"
            />
            <span class="text-red-700 mt-2 text-sm">{{
                form.errors.bank
            }}</span>
        </div>
        <div class="mt-3 p-3">
            <label for="acc_no">Account No.</label>
            <input
                type="number"
                id="acc_no"
                class="w-full rounded-md shadow-sm"
                :class="
                    form.errors.acc_no
                        ? 'border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-100'
                        : 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
                "
                v-model="form.acc_no"
                @keydown="form.clearErrors('acc_no')"
            />
            <span class="text-red-700 mt-2 text-sm">{{
                form.errors.acc_no
            }}</span>
        </div>
    </div>
</template>

<script>
export default {
    props: ["form"]
};
</script>
