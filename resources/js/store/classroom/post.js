export const post = {
    namespaced: true,
    state: {
        newPosts: 0,
    },
    mutations: {
        incrementPostsCount(state)
        {
            state.newPosts++;
        }
    },
    actions: {
        newPostAdded(context)
        {
            context.commit('incrementPostsCount');
        }
    }
};

