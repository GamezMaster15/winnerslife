import axios from 'axios'
import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import { GoogleGenerativeAI } from '@google/generative-ai'

const genAI = new GoogleGenerativeAI("AIzaSyAxNI9DhI4d6_Zm3JLLUXHdJqX2v0xCop0");
const model = genAI.getGenerativeModel({ model: "gemini-1.5-flash" });

export default createStore({
    state: {
        loggedIn: false,
        user: null,
        token: null,
        admin: false,
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
            state.admin = payload.admin
            state.lastLoginTime = payload.loggedIn ? new Date().toISOString() : null
        },

        CLEAR_AUTH_STATE(state) {
            state.loggedIn = false
            state.user = null
            state.token = null
            state.admin = false
            state.lastLoginTime = null
        }
    },

    actions: {
        async login({ commit }, credentials) {       
            console.log(credentials.correo_user);
            console.log(credentials.password_user);
            
            const url = 'https://campusiutirlaempresarial.com/api/public/api/loginUser';
            const urlAdmin = 'https://campusiutirlaempresarial.com/api/public/api/loginAdmin';            
            
            try {
                // Intentar iniciar sesión como usuario
                const respuesta = await axios.post(url, credentials);
                
                if (respuesta.status === 200) {
                    commit('SET_AUTH_STATE', {
                        loggedIn: true,
                        correo_user: respuesta.data.data.correo_user,
                        token: respuesta.data.access_token,
                        admin: false
                    });
                    return respuesta;
                }
        
            } catch (error) {
                // Si falla, intentar iniciar sesión como administrador
                try {
                    const respuestaAdmin = await axios.post(urlAdmin, {
                        correo_admins: credentials.correo_user,
                        password_admins: credentials.password_user
                    });
        
                    if (respuestaAdmin.status === 200) {
                        commit('SET_AUTH_STATE', {
                            loggedIn: true,
                            correo_user: respuestaAdmin.data.data.correo_Admin,
                            token: respuestaAdmin.data.access_token,
                            admin: true
                        });
                        return respuestaAdmin;
                    }
        
                } catch (adminError) {
                    // Si ambos intentos fallan, limpiar el estado y devolver el error
                    commit('CLEAR_AUTH_STATE');
                    return adminError;
                }
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
        },

        async iahelp({commit},data) {
            console.log(data);
            
            const query = `Eres una IA encargada de ayudar a mejorar titulos, solo debes responder con las mejoras del titulo. Solo devuelve un resultado y agregale emojis. texto proporcionado: ${data.ask}`
            try {
                const result = await model.generateContent(query);
                const response = await result.response.text();
                return response
            } catch (error) {
                console.log(error);
                
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
