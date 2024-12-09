import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'

export default createStore({
    state: {
        loggedIn: false,
        user: null,
        token: null,
        lastLoginTime: null
    },
    
    getters: {
        isAuthenticated: state => state.loggedIn && state.token !== null,
        getUser: state => state.user,
        getSessionInfo: state => ({
            lastLogin: state.lastLoginTime,
            isActive: state.loggedIn
        })
    },

    mutations: {
        SET_AUTH_STATE(state, payload) {
            state.loggedIn = payload.loggedIn
            state.user = payload.user || null
            state.token = payload.token || null
            state.lastLoginTime = payload.loggedIn ? new Date().toISOString() : null
        },

        CLEAR_AUTH_STATE(state) {
            state.loggedIn = false
            state.user = null
            state.token = null
            state.lastLoginTime = null
        }
    },

    actions: {
        async login({ commit }, credentials) {
            try {
                // Aquí iría la lógica real de autenticación con tu API
                const response = await mockAuthRequest(credentials)
                
                commit('SET_AUTH_STATE', {
                    loggedIn: true,
                    user: response.user,
                    token: response.token
                })
                
                return Promise.resolve(response)
            } catch (error) {
                commit('CLEAR_AUTH_STATE')
                return Promise.reject(error)
            }
        },

        logout({ commit }) {
            try {
                // Aquí iría la lógica de cierre de sesión con tu API
                commit('CLEAR_AUTH_STATE')
                return Promise.resolve()
            } catch (error) {
                return Promise.reject(error)
            }
        }
    },

    plugins: [
        createPersistedState({
            paths: ['loggedIn', 'user', 'token', 'lastLoginTime'],
            storage: window.sessionStorage // Usa sessionStorage en lugar de localStorage
        })
    ]
})

// Función auxiliar para simular una petición de autenticación
function mockAuthRequest(credentials) {
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve({
                user: { id: 1, name: 'Usuario' },
                token: 'jwt-token-example'
            })
        }, 300)
    })
}
