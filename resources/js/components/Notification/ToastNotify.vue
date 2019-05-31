<template>
    <div class="app-msg">
        <vue-snotify></vue-snotify>    
    </div>    
</template>
<script>
import { SnotifyPosition, SnotifyToast, SnotifyToastConfig } from 'vue-snotify';
import "vue-snotify/styles/material.css";

export default {    
    data() {
        return {
            
        };
    },    
    methods: {
        fireError(msgHTML){
            this.$snotify.html(`<div class="snotifyToast__title">`+this.$t('message.general.ERROR')+`</div> <div class="snotifyToast__body"> `+ msgHTML +` <div class="snotify-icon snotify-icon--error"></div>`,{
                timeout: 2000,
                showProgressBar: true,
                closeOnClick: true,
                pauseOnHover: true,
                type: 'error'
            });
        },
        fireSuccess(msgHTML){
            this.$snotify.html(`<div class="snotifyToast__title">`+this.$t('message.general.SUCCESS')+`</div> <div class="snotifyToast__body"> `+ msgHTML +` <div class="snotify-icon snotify-icon--success"></div>`,{
                timeout: 2000,
                showProgressBar: true,
                closeOnClick: true,
                pauseOnHover: true,
                type: 'success'
            });
        }
    },
    mounted(){
        Vue.prototype.$eventHub.$on('fireError', this.fireError);
        Vue.prototype.$eventHub.$on('fireSuccess', this.fireSuccess);
    }
};
</script>
<style scoped>
.app-msg >>> .snotify{
    width: 480px;
}
.app-msg >>> .snotifyToast__title {
    font-size: 22px;
    line-height: 22px;
    margin: 0 0 5px 22px;
    color: #fff;
    
}
.app-msg >>> .snotifyToast__body{
    font-size: 14px;
}
.app-msg >>> .snotifyToast__body ul{
    
}
</style>