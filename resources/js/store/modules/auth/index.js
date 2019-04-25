/**
 * Auth Module
 */
import Vue from 'vue'
import webServices from 'WebServices'
import api from '../../../api';
import firebase from 'firebase/app';
import Nprogress from 'nprogress';
import router from '../../../router';
import {
    facebookAuthProvider,
    googleAuthProvider,
    twitterAuthProvider,
    githubAuthProvider
} from '../../../firebase';

const state = {
    user: localStorage.getItem('user'),
    isUserSigninWithAuth0: Boolean(localStorage.getItem('isUserSigninWithAuth0')),
    accessToken: localStorage.getItem('accessToken'),
}

// getters
const getters = {
    getUser: state => {
        return state.user;
    },
    isUserSigninWithAuth0: state => {
        return state.isUserSigninWithAuth0;
    }
}

// actions
const actions = {
    signupUserWithLaravelPassport(context, payload){
        webServices.post('/signup', JSON.stringify(payload.userDetail),{ headers: {'Content-Type':'application/json'}})
        .then(response => {
                if(response.data.response.api_status){
                    context.commit('signUpUser');
                    Nprogress.done();
                    setTimeout(() => {
                        context.commit('signUpUserSuccess', payload);
                    }, 500);
                }else{
                    context.commit('signUpUserFailure', response.data.response);
                }
        })
        .catch(error => {
            console.log(error);
            console.log("Failed");
        })           
    },
     signInWithLaravelPassport(context, payload){
        const { user } = payload;
        context.commit('loginUser');        
        webServices.post('/login', JSON.stringify(user), { headers: {'Content-Type':'application/json'}})
            .then(response => {
                if(response.data.response.api_status){                    
                    const access_token = response.data.response.access_token;
                    Nprogress.done();
                    setTimeout(() => {                        
                        context.commit('loginUserSuccess', {user, access_token});
                    }, 500);
                }else{
                    localStorage.removeItem('accessToken');
                    context.commit('loginUserFailure', response.data.response);
                }
        })
        .catch(error => {
            localStorage.removeItem('accessToken');
            console.log(error);
            console.log("Failed");
        })
     },
    signinUserInFirebase(context, payload) {
        const { user } = payload;
        context.commit('loginUser');
        firebase.auth().signInWithEmailAndPassword(user.email, user.password)
            .then(user => {
                Nprogress.done();
                setTimeout(() => {
                    context.commit('loginUserSuccess', {user});
                }, 500)
            })
            .catch(error => {
                context.commit('loginUserFailure', error);
            });
    },
    logoutUserFromFirebase(context) {
        Nprogress.start();
        firebase.auth().signOut()
            .then(() => {
                Nprogress.done();
                setTimeout(() => {
                    context.commit('logoutUser');
                }, 500)
            })
            .catch(error => {
                context.commit('loginUserFailure', error);
            })
    },
    signinUserWithFacebook(context) {
        context.commit('loginUser');
        firebase.auth().signInWithPopup(facebookAuthProvider).then((result) => {
            Nprogress.done();
            setTimeout(() => {
                const user = result.user;
                context.commit('loginUserSuccess', {user});
            }, 500)
        }).catch(error => {
            context.commit('loginUserFailure', error);
        });
    },
    signinUserWithGoogle(context) {
        context.commit('loginUser');
        firebase.auth().signInWithPopup(googleAuthProvider).then((result) => {
            Nprogress.done();
            setTimeout(() => {
                const user = result.user;
                context.commit('loginUserSuccess', {user});
            }, 500)
        }).catch(error => {
            context.commit('loginUserFailure', error);
        });
    },
    signinUserWithTwitter(context) {
        context.commit('loginUser');
        firebase.auth().signInWithPopup(twitterAuthProvider).then((result) => {
            Nprogress.done();
            setTimeout(() => {
                const user = result.user;
                context.commit('loginUserSuccess', {user});
            }, 500)
        }).catch(error => {
            context.commit('loginUserFailure', error);
        });
    },
    signinUserWithGithub(context) {
        context.commit('loginUser');
        firebase.auth().signInWithPopup(githubAuthProvider).then((result) => {
            Nprogress.done();
            setTimeout(() => {
                const user = result.user;
                context.commit('loginUserSuccess', {user});
            }, 500)
        }).catch(error => {
            context.commit('loginUserFailure', error);
        });
    },
    signupUserInFirebase(context, payload) {
        let { userDetail } = payload;
        context.commit('signUpUser');
        firebase.auth().createUserWithEmailAndPassword(userDetail.email, userDetail.password)
            .then(() => {
                Nprogress.done();
                setTimeout(() => {
                    context.commit('signUpUserSuccess', userDetail);
                }, 500)
            })
            .catch(error => {
               context.commit('signUpUserFailure', error);
            })
    },
    signInUserWithAuth0(context, payload) {
      context.commit('signInUserWithAuth0Success', payload);
    },
    signOutUserFromAuth0(context) {
      context.commit('signOutUserFromAuth0Success');
    },
    sendEmail(context){
        context.commit('sendEmailSuccessfully');
    },
    invalidEmail(context){
        context.commit('invalidEmailSent');
    }
}

// mutations
const mutations = {
    loginUser(state) {
        Nprogress.start();
    },
    loginUserSuccess(state, {user, access_token}) {
        access_token = access_token || '';        
        state.accessToken = access_token;
        state.user = user;          
        localStorage.setItem('user',JSON.stringify(user));
        localStorage.setItem('accessToken', access_token);
        if(access_token){            
            api.defaults.headers.common['Authorization'] = 'Bearer '+ access_token;            
        }
        state.isUserSigninWithAuth0 = false
        router.push("/contacts");
        setTimeout(function(){
            Vue.notify({
                group: 'loggedIn',
                type: 'success',
                text: 'User Logged In Success!'
            });
       },1500);
    },
    loginUserFailure(state, error) {
        Nprogress.done();
        localStorage.removeItem('accessToken');
        Vue.notify({
            group: 'loggedIn',
            type: 'error',
            text: error.message
        });
    },
    logoutUser(state) {
        state.user = null;
        state.accessToken = '';
        localStorage.removeItem('user');
        localStorage.removeItem('accessToken');
        delete axios.defaults.headers.common['Authorization'];
        router.push("/session/login");
    },
    signUpUser(state) {
        Nprogress.start();
    },
    signUpUserSuccess(state, user) {
        state.user = localStorage.setItem('user', user);
        router.push("/default/dashboard/ecommerce");
        Vue.notify({
            group: 'loggedIn',
            type: 'success',
            text: 'Account Created!'
        });
    },
    signUpUserFailure(state, error) {
        Nprogress.done();
         Vue.notify({
            group: 'loggedIn',
            type: 'error',
            text: error.message
        });
    },
    signInUserWithAuth0Success(state, user) {
        state.user = user;
        localStorage.setItem('user',JSON.stringify(user));
        state.isUserSigninWithAuth0 = true;
    },
    signOutUserFromAuth0Success(state) {
        state.user = null
        localStorage.removeItem('user')
    },
    sendEmailSuccessfully(state){
        router.push("/session/login");
         Vue.notify({
            group: 'loggedIn',
            type: 'success',
            text: 'Email Sent Successfully!'
        });
    },
     invalidEmailSent(state){
         Vue.notify({
            group: 'loggedIn',
            type: 'error',
            text: 'Please Enter Valid Email Id!'
        });
     }
}

export default {
    state,
    getters,
    actions,
    mutations
}
