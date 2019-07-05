<template>
    <div v-if="route.name == 'role_list'" class="top-actions">        
        <v-btn small color="success left" @click="addRole"><v-icon>zmdi-plus-circle</v-icon>&nbsp;{{$t('general.NEW')}}</v-btn>
        <v-btn small @click="toggleDeleteDialog"><v-icon>zmdi-close-circle</v-icon>&nbsp;{{$t('general.DELETE')}}</v-btn>
    </div>
    <div v-else-if="route.name == 'role_edit'" class="top-actions">
        <v-btn small color="success left" @click="saveRole"><v-icon>zmdi-plus-circle</v-icon>&nbsp;{{$t('general.SAVE')}}</v-btn>
        <v-btn small color="success left" @click="saveAndCloseRole"><v-icon>zmdi-plus-circle</v-icon>&nbsp;{{$t('general.SAVE_AND_CLOSE')}}</v-btn>
        <v-btn small @click="toggleDeleteDialog"><v-icon>zmdi-close-circle</v-icon>&nbsp;{{$t('general.DELETE')}}</v-btn>
        <router-link :to="{ name: 'role_list'}">
            <v-btn small><v-icon>zmdi-close-circle</v-icon>&nbsp;{{$t('general.CLOSE')}}</v-btn>
        </router-link>
    </div>
    <div v-else-if="route.name == 'role_create'" class="top-actions">
        <v-btn small color="success left" @click="saveRole"><v-icon>zmdi-plus-circle</v-icon>&nbsp;{{$t('general.SAVE')}}</v-btn>
        <v-btn small color="success left" @click="saveAndCloseRole"><v-icon>zmdi-plus-circle</v-icon>&nbsp;{{$t('general.SAVE_AND_CLOSE')}}</v-btn>
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
            Vue.prototype.$eventHub.$off('toggleDialogRole');
            Vue.prototype.$eventHub.$off('toggleEditDialogRole');
        },
        methods: {
            addRole: function(){
                this.$router.push({name: 'role_create'});
            },
            saveRole: function(){
                Vue.prototype.$eventHub.$emit('saveRole','save'); 
            },
            saveAndCloseRole: function(){
                Vue.prototype.$eventHub.$emit('saveAndCloseRole','save_and_close'); 
            },            
            createRole: function(){
                Vue.prototype.$routerObj.push("/roles/create");
            },
            toggleDeleteDialog() {
                if (this.route.name == 'role_list'){
                    Vue.prototype.$eventHub.$emit('toggleDialogRole');
                }
                else if(this.route.name == 'role_edit')
                {
                    Vue.prototype.$eventHub.$emit('toggleEditDialogRole');
                }
            }
        },
        components: {
            
        }
    }
</script>