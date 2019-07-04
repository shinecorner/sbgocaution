<template>
    <div class="top-actions">
        <div v-if="route.name == 'templates'">
            <v-btn small color="success left" @click="addTemplate"><v-icon>zmdi-plus-circle</v-icon>&nbsp;{{$t('general.NEW')}}</v-btn>
            <v-btn small @click="toggleDeleteDialog"><v-icon>zmdi-close-circle</v-icon>&nbsp;{{$t('general.DELETE')}}</v-btn>
        </div>
        <div v-else-if="route.name == 'template_create'">
            <v-btn small  @click="saveCloseTemplate" color="success left"><v-icon>zmdi-check</v-icon>&nbsp;{{$t('general.SAVE_AND_CLOSE')}}</v-btn>
            <v-btn small  @click="close"><v-icon>zmdi-close-circle</v-icon>&nbsp;{{$t('general.CLOSE')}}</v-btn>
        </div>
        <div v-else-if="route.name == 'template_edit'">
            <v-btn small color="success left" @click="saveCloseTemplate"><v-icon>zmdi-check</v-icon>&nbsp;{{$t('general.SAVE_AND_CLOSE')}}</v-btn>
            <v-btn small @click="saveTemplate"><v-icon>zmdi-edit</v-icon>&nbsp;{{$t('general.SAVE')}}</v-btn>
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
            };
        },
        computed: mapState([
            'route'
        ]),
        beforeDestroy() {
            Vue.prototype.$eventHub.$off('toggleDialogTemplate');
            Vue.prototype.$eventHub.$off('toggleEditDialogTemplate');
        },
        methods: {
            addTemplate: function(){
                this.$router.push({name: 'template_create'})
            },
            saveTemplate: function(){
                Vue.prototype.$eventHub.$emit('saveTemplate', 'save');
            },
            saveCloseTemplate: function(){
                Vue.prototype.$eventHub.$emit('saveAndCloseTemplate', 'save_and_close');
            },
            close(){
                this.$router.push('/templates');
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
