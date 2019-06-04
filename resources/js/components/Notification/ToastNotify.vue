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
        fireError(msg){
            let msgHTML = '';
            if(_.isArray(msg)){                
                _.forOwn(msg, function(message, key) { 
                        msgHTML += ('<li>' + message + '<\/li>')
                    });            
            } else{                
                msgHTML += ('<li>' + msg + '<\/li>')
            }            
            this.$snotify.html(`<div class="snotifyToast__title">`+this.$t('message.general.ERROR')+`</div> <div class="snotifyToast__body"> <ul>`+ msgHTML +` </ul><div class="snotify-icon snotify-icon--error"></div>`,{                
                type: 'error', 
                timeout: 2000               
            });
        },
        
        fireSuccess(msg){                                    
            this.$snotify.html(`<div class="snotifyToast__title">`+this.$t('message.general.SUCCESS')+`</div> <div class="snotifyToast__body"> <ul><li>`+ msg +` </li></ul><div class="snotify-icon snotify-icon--success"></div>`,{                
                type: 'success',
                timeout: 2000
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

.app-msg >>> .snotify-icon{
    top: 30px;
}
</style>