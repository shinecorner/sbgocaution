<template>
    <div class="top-actions">        
        <v-btn small @click="saveSettings" color="success left">{{$t("general.SUBMIT")}}</v-btn>
    </div>
</template>
<script>
export default {
        props: {},
        data() {            
            return {};
        },
        computed: {},
        methods: {
            saveSettings: function(){
                Vue.prototype.$eventHub.$emit('saveSettings'); 
            }
        },
        components: {
            
        }
    }
</script>