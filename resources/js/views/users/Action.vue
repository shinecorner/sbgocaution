<template>            
    <div v-if="route.name == 'user_list'" class="top-actions">        
        <v-btn small color="success left" @click="addUser"><v-icon>zmdi-plus-circle</v-icon>&nbsp;{{$t('general.NEW')}}</v-btn>
        <v-btn small @click="toggleDeleteDialog"><v-icon>zmdi-close-circle</v-icon>&nbsp;{{$t('general.DELETE')}}</v-btn>
    </div>
    <div v-else-if="route.name == 'user_edit'" class="top-actions">
        <v-btn small color="success left" @click="saveUser"><v-icon>zmdi-plus-circle</v-icon>&nbsp;{{$t('general.SAVE')}}</v-btn>
        <v-btn small color="success left" @click="saveAndCloseUser"><v-icon>zmdi-plus-circle</v-icon>&nbsp;{{$t('general.SAVE_AND_CLOSE')}}</v-btn>
        <v-btn small @click="toggleDeleteDialog"><v-icon>zmdi-close-circle</v-icon>&nbsp;{{$t('general.DELETE')}}</v-btn>
        <router-link :to="{ name: 'user_list'}">
            <v-btn small><v-icon>zmdi-close-circle</v-icon>&nbsp;{{$t('general.CLOSE')}}</v-btn>
        </router-link>
    </div>
    <div v-else-if="route.name == 'user_create'" class="top-actions">
        <v-btn small color="success left" @click="saveUser"><v-icon>zmdi-plus-circle</v-icon>&nbsp;{{$t('general.SAVE')}}</v-btn>
        <v-btn small color="success left" @click="saveAndCloseUser"><v-icon>zmdi-plus-circle</v-icon>&nbsp;{{$t('general.SAVE_AND_CLOSE')}}</v-btn>
    </div>    
</template>
<script>
import { mapState  } from "vuex";
export default {
        props: {},
        data() {            
            return {};
        },
        computed: mapState([           
            'route'
        ]),
        beforeDestroy() {                        
            Vue.prototype.$eventHub.$off('toggleDialogUser');
            Vue.prototype.$eventHub.$off('toggleEditDialogUser');
        },
        methods: {
            addUser: function(){
                this.$router.push({name: 'user_create'});
            },
            saveUser: function(){
                Vue.prototype.$eventHub.$emit('saveUser','save'); 
            },
            saveAndCloseUser: function(){
                Vue.prototype.$eventHub.$emit('saveAndCloseUser','save_and_close'); 
            },            
            createUser: function(){
                Vue.prototype.$routerObj.push("/users/create");
            },
            toggleDeleteDialog() {
                if (this.route.name == 'user_list'){
                    Vue.prototype.$eventHub.$emit('toggleDialogUser');
                }
                else if(this.route.name == 'user_edit')
                {
                    Vue.prototype.$eventHub.$emit('toggleEditDialogUser');
                }
            }
        },
        components: {
            
        }
    }
</script>