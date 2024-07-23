import { createStore } from 'vuex';

export default createStore({
    // define the initial state of the application
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
    // mutations are methods used to directly mutate (change) the state above.
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
    // actions are methods used to commit mutations, they can contain asynchronous operations. will commit to the mutations above.
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
