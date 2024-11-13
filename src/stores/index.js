import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'

export default createStore({
    state: {
        loggedIn: false
    },
    mutations: {
        loggedIn (state) {
            state.loggedIn = true
        },
        loggedOut(state) {
            state.loggedIn = false; // Cambia el estado a no autenticado
        }
    },
    actions: {
        mockLogin ({ commit }) {
            commit('loggedIn')
        },
        mockLogout({ commit }) {
            commit('loggedOut'); // Llama a la mutación para cerrar sesión
        }
    },
    plugins: [createPersistedState()]
})
