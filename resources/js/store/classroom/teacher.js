export const teacher = {
    namespaced: true,
    state: {
        newTeachers: 0,
    },
    mutations: {
        incrementTeachers(state) {
            state.newTeachers++;
        },
    },
    actions: {
        newTeacherAdded(context) {
            context.commit("incrementTeachers");
        },
    },
};
