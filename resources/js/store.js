import { createStore } from 'vuex';

export default createStore({
    state: {
        activeTab: 'dateToRoman',
        dateToRoman: {
            dateInput: '',
            convertedDate: '',
            errorMessage: '',
        },
        romanToDate: {
            dateInput: '',
            convertedDate: '',
            errorMessage: '',
        },
    },
    mutations: {
        setActiveTab(state, tab) {
            state.activeTab = tab;
        },
        setDateToRoman(state, payload) {
            state.dateToRoman = payload;
        },
        setRomanToDate(state, payload) {
            state.romanToDate = payload;
        },
    },
    actions: {
        setActiveTab({ commit }, tab) {
            commit('setActiveTab', tab);
        },
        updateDateToRoman({ commit }, payload) {
            commit('setDateToRoman', payload);
        },
        updateRomanToDate({ commit }, payload) {
            commit('setRomanToDate', payload);
        },
    },
});
