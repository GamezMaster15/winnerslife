import axios from 'axios'
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
            const url = 'https://campusiutirlaempresarial.com/api/public/api/loginUser';
            try {
                const respuesta = await axios.post(url, credentials);          

                if(respuesta.status === 200 && respuesta.data.data.correo_user && respuesta.data.access_token) {
                    commit('SET_AUTH_STATE', {
                        loggedIn: true,
                        correo_user: respuesta.data.data.correo_user,
                        token: respuesta.data.access_token
                    })                       
                    return respuesta;
                }
                
            } catch (error) {
                commit('CLEAR_AUTH_STATE')
                return error
            }
        },

        async register({ commit }, registerForm) {
            const url = 'https://campusiutirlaempresarial.com/api/public/api/register';
            const datosUsuario = {
                nombre_user: registerForm.nombre_user,
                apellido_user: registerForm.apellido_user,
                ci_user: registerForm.ci_user,
                correo_user: registerForm.correo_user,
                password_user: registerForm.password_user,
                status_user: 'activo'
            };
            try {
                const respuesta = await axios.post(url, datosUsuario);
                console.log('Usuario registrado:', respuesta.data);
                return respuesta;
            } catch (error) {
                console.log(error)
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
