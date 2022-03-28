export const student = {
    namespaced: true,
    state: {
        newStudents: 0
    },
    mutations: {
        incrementStudents(state)
        {
            state.newStudents++;
        }
    },
    actions: {
        newStudentAdded(context)
        {
            context.commit('incrementStudents')
        }
    }
}
