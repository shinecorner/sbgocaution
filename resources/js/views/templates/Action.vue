<template>
    <div class="top-actions">
        <div v-if="route.path == '/templates'">
            <v-btn small color="success left" @click="addtemplateRoute"><v-icon>zmdi-plus-circle</v-icon>&nbsp;{{$t('general.NEW')}}</v-btn>
            <v-btn small @click="toggleDeleteDialog"><v-icon>zmdi-close-circle</v-icon>&nbsp;{{$t('general.DELETE')}}</v-btn>
        </div>
        <div v-else-if="route.path == '/templates/create'">
            <v-btn small  @click="saveCloseTemplate" color="success left"><v-icon>zmdi-check</v-icon>&nbsp;{{$t('general.SAVE_AND_CLOSE')}}</v-btn>
            <v-btn small  @click="close"><v-icon>zmdi-close-circle</v-icon>&nbsp;{{$t('general.CLOSE')}}</v-btn>
        </div>
        <div v-else>
            <v-btn small color="success left" @click="saveCloseTemplate"><v-icon>zmdi-check</v-icon>&nbsp;{{$t('general.SAVE_AND_CLOSE')}}</v-btn>
            <v-btn small @click="addTemplate"><v-icon>zmdi-edit</v-icon>&nbsp;{{$t('general.SAVE')}}</v-btn>
            <v-btn small @click="toggleDeleteDialog"><v-icon>zmdi-close-circle</v-icon>&nbsp;{{$t('general.DELETE')}}</v-btn>
            <v-btn small @click="close"><v-icon>zmdi-close-circle</v-icon>&nbsp;{{$t('general.CLOSE')}}</v-btn>
        </div>
    </div>
</template>
<script>
    import { mapState  } from "vuex";
export default {
        props: {},
        data() {
            return {
                routeRedirect: null
            };
        },
        computed: mapState([
            // map this.count to store.state.route
            'route'
        ]),
        beforeDestroy() {
            this.routeRedirect = null;
            Vue.prototype.$eventHub.$off('errorCheck');
            Vue.prototype.$eventHub.$off('toggleDialogTemplate');
            Vue.prototype.$eventHub.$off('toggleEditDialogTemplate');
        },
        methods: {
            addtemplateRoute(){
                this.$router.push({name: 'template_create'})
            },
            close(){
                this.$router.push('/templates');
            },
            addTemplate(){
               this.routeRedirect = "save"
               Vue.prototype.$eventHub.$emit('saveTemplate');
            },
            errorCheck(result){
                if(result == true) {
                    if(this.routeRedirect == null){
                      this.$router.push('/templates');}
                }
             },
            saveCloseTemplate(){
                this.routeRedirect = null;
                Vue.prototype.$eventHub.$emit('saveTemplate');
                Vue.prototype.$eventHub.$on('checkError', this.errorCheck);
            },
            toggleDeleteDialog() {
                if (this.route.name == 'templates'){
                    Vue.prototype.$eventHub.$emit('toggleDialogTemplate');
                }
                else if(this.route.name == 'template_edit')
                {
                    Vue.prototype.$eventHub.$emit('toggleEditDialogTemplate');
                }
            }
        },
    }
</script>
