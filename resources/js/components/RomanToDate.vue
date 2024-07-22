<template>
    <div class="flex items-center justify-center mx-auto py-8">
        <div class="bg-gray-50 shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full md:w-1/2 lg:w-1/3">
            <h1 class="text-2xl font-semibold text-gray-600">Convert a Roman to Date</h1>
            <form @submit.prevent="handleSubmit" class="mt-4">
                <input
                    :value="dateInput"
                    placeholder="Enter Roman numerals (e.g. XII-XII-MMXXIV)"
                    class="border p-2 rounded w-full"
                    @input="updateDateInput"
                />
                <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">Convert</button>
            </form>
            <div class="mt-4">
                <p v-if="convertedDate" class="shadow-lg border rounded px-8 pt-6 pb-8">Converted Date: {{ convertedDate }}</p>
                <p v-if="errorMessage" class="text-red-500">{{ errorMessage }}</p>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props: {
        romanToDateData: Object
    },
    data() {
        return {
            dateInput: this.romanToDateData.dateInput || '',
            convertedDate: this.romanToDateData.convertedDate || '',
            errorMessage: this.romanToDateData.errorMessage || ''
        };
    },
    watch: {
        romanToDateData: {
            handler(newData) {
                this.dateInput = newData.dateInput || '';
                this.convertedDate = newData.convertedDate || '';
                this.errorMessage = newData.errorMessage || '';
            },
            deep: true
        }
    },
    methods: {
        updateDateInput(event) {
            this.dateInput = event.target.value;
        },
        handleSubmit() {
            axios.post('/api/converter', { roman: this.dateInput })
                .then(response => {
                    const { result, error } = response.data;
                    this.convertedDate = result;
                    this.errorMessage = error || '';
                    this.$emit('update-roman-to-date', {
                        dateInput: this.dateInput,
                        convertedDate: this.convertedDate,
                        errorMessage: this.errorMessage
                    });
                })
                .catch(error => {
                    this.errorMessage = error.response.data.message;
                    this.convertedDate = '';
                });
        }
    }
};
</script>

<style scoped>
/* Add any styles if needed */
</style>
