export const category = {
    namespaced: true,
    state() {
        return {
            newCategory: {},
        };
    },
    mutations: {
        addNewCategory(state, category) {
            state.newCategory = category;
        },
        resetNewCategory(state) {
            state.newCategory = {};
        },
    },
};
