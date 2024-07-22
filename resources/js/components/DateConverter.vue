<template>
    <div class="flex items-center justify-center">
        <h1 class="text-3xl font-bold mt-5">Date Converter</h1>
    </div>

    <div class="mx-auto container bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <!-- Tabs Header -->
        <div class="flex border-b border-gray-300">
            <button
                class="flex-1 py-2 text-center font-semibold transition-colors"
                :class="{
                   'text-blue-500 border-b-2 border-blue-500': activeTab === 'dateToRoman',
                   'text-gray-600': activeTab !== 'dateToRoman'
                }"
                @click="activeTab = 'dateToRoman'"
            >
                Date to Roman
            </button>
            <button
                class="flex-1 py-2 text-center font-semibold transition-colors"
                :class="{
                  'text-blue-500 border-b-2 border-blue-500': activeTab === 'romanToDate',
                  'text-gray-600': activeTab !== 'romanToDate'
                }"
                @click="activeTab = 'romanToDate'"
            >
                Roman to Date
            </button>
        </div>

        <!-- Tabs Content -->
        <div class="mt-4">
            <div v-if="activeTab === 'dateToRoman'">
                <date-to-roman></date-to-roman>

            </div>
            <div v-if="activeTab === 'romanToDate'">
                <roman-to-date></roman-to-date>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            activeTab: 'dateToRoman',
        };
    },
};
</script>

<style scoped>
/* Additional styles if needed */
</style>
