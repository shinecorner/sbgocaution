<template>
    <div class="vld-parent">
        <loading :active.sync="status"         
        loader="dots"
        :is-full-page="fullPage"
        color="#066938"        
        opacity="0.3"
        background-color="#fff"
        ></loading>        
    </div>
</template>
 
<script>
    // Import component
    import Loading from 'vue-loading-overlay';
    // Import stylesheet
    import 'vue-loading-overlay/dist/vue-loading.css';
    
    export default {
        props: ["status"],
        data() {
            return {                
                fullPage: true
            }
        },
        components: {
            Loading
        }
    }
</script> 