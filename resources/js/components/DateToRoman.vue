<template>

    <div class="flex items-center justify-center mx-auto py-8 ">
        <div class="bg-gray-50 shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full md:w-1/2 lg:w-1/3">

            <h1 class="text-2xl font-semibold text-gray-600">Convert a Date to Roman</h1>

            <form @submit.prevent="handleSubmit" class="mt-4">
                <MaskInput
                    type="text"
                    v-model="dateInput"
                    mask="##-##-####"
                    placeholder="Enter date"
                    class="border p-2 rounded w-full"
                />
                <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">Convert</button>
            </form>

            <!--        <div class="mt-4">-->
            <!--            <p v-if="convertedDate">Converted Date: {{ convertedDate }}</p>-->
            <!--            <p v-if="errorMessage" class="text-red-500">{{ errorMessage }}</p>-->
            <!--        </div>-->
        </div>
    </div>

</template>

<script>
export default {
    data() {
        return {
            dateInput: '',
        };
    },
};

</script>


<style scoped>

</style>
