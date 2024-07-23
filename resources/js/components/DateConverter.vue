<template>
    <div class="flex items-center justify-center">
        <h1 class="text-3xl font-bold mt-5">{{ title }}</h1>
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
                @click="setActiveTab('dateToRoman')"
            >
                {{ DateTabTitle }}
            </button>
            <button
                class="flex-1 py-2 text-center font-semibold transition-colors"
                :class="{
                  'text-blue-500 border-b-2 border-blue-500': activeTab === 'romanToDate',
                  'text-gray-600': activeTab !== 'romanToDate'
                }"
                @click="setActiveTab('romanToDate')"
            >
                {{ RomanTabTitle }}
            </button>
        </div>

        <!-- Tabs Content -->
        <div class="mt-4">
            <date-to-roman
                v-if="activeTab === 'dateToRoman'"
                :date-to-roman-data="dateToRomanData"
                @update-date-to-roman="updateDateToRoman"
            ></date-to-roman>
            <roman-to-date
                v-if="activeTab === 'romanToDate'"
                :roman-to-date-data="romanToDateData"
                @update-roman-to-date="updateRomanToDate"
            ></roman-to-date>
        </div>
    </div>
</template>

<script>
import DateToRoman from './DateToRoman.vue';
import RomanToDate from './RomanToDate.vue';

export default {
    components: {
        DateToRoman,
        RomanToDate,
    },
    data() {
        return {
            activeTab: 'dateToRoman',
            title: 'Date Converter',
            DateTabTitle: 'Date to Roman',
            RomanTabTitle: 'Roman to Date',
            dateToRomanData: {
                dateInput: '',
                convertedDate: '',
                errorMessage: ''
            },
            romanToDateData: {
                dateInput: '',
                convertedDate: '',
                errorMessage: ''
            },
        };
    },
    methods: {
        setActiveTab(tab) {
            this.activeTab = tab;
        },
        updateDateToRoman(data) {
            this.dateToRomanData = { ...data };
            this.romanToDateData.dateInput = data.convertedDate; // Auto-fill Roman numeral
        },
        updateRomanToDate(data) {
            this.romanToDateData = { ...data };
            this.dateToRomanData.dateInput = data.convertedDate; // Auto-fill date
        }
    }
};
</script>

<style scoped>

</style>
