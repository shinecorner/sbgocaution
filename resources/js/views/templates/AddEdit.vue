<template>
<div class="pt-4">
<v-container fluid grid-list-xl pt-0>
    <v-layout row wrap>
        <app-card colClasses="xs12 md12">
               <v-card flat>
                <v-card-text>
                    <v-form @submit.stop.prevent="validateForm" ref="form">
                        <template>
                            <v-layout row pb-5>
                                <v-flex md4>
                                    <v-layout column>
                                        <v-flex sm4 md4 lg4>
                                            <v-text-field
                                                outline
                                                v-model="templateData.name"
                                                :label="$t('general.NAME')"
                                                hide-details
                                                :data-vv-as="$t('general.NAME')"
                                                data-vv-name="name"
                                                v-validate="'required'"
                                                :error="errors.has('name')"
                                                required
                                            ></v-text-field>
                                        </v-flex>
                                        <v-flex sm4 md4 lg4>
                                            <v-text-field
                                                outline
                                                :label="$t('template.TEMPLATE_KEY')"
                                                v-model="templateData.template_key"
                                                hide-details
                                                :readonly="$route.name == 'template_edit'"
                                                :data-vv-as="$t('template.TEMPLATE_KEY')"
                                                data-vv-name="template_key"
                                                v-validate="'required|checkTemplateKey'"
                                                :error="errors.has('template_key')"
                                                ></v-text-field>
                                        </v-flex>
                                        <v-flex sm4 md4 lg4 >
                                            <v-text-field v-if="$route.name == 'template_create'"
                                                outline
                                                v-model="templateData.section"
                                                :label="$t('template.SECTION')"
                                                :data-vv-as="$t('template.SECTION')"
                                                data-vv-name="section"
                                                v-validate="'required'"
                                                :error="errors.has('section')"
                                                required
                                            ></v-text-field>
                                            <v-autocomplete v-else
                                                :items="sections"
                                                outline
                                                hide-details
                                                v-model="templateData.section"
                                                :label="$t('template.SECTION')"
                                                :data-vv-as="$t('template.SECTION')"
                                                data-vv-name="section"
                                                v-validate="'required'"
                                                :error="errors.has('section')"
                                            >
                                            </v-autocomplete>
                                        </v-flex>
                                        <v-flex sm4 md4 lg4>
                                            <v-autocomplete :items="selecttypes"
                                                outline
                                                v-model="templateData.type"
                                                hide-details
                                                :label="$t('template.filter.SELECT_TYPE')"
                                                :data-vv-as="$t('template.filter.SELECT_TYPE')"
                                                data-vv-name="selecttype"
                                                v-validate="'required'"
                                                :error="errors.has('selecttype')"
                                            >
                                            </v-autocomplete>
                                        </v-flex>
                                        <v-flex sm4 md4 lg4>
                                            <v-switch
                                                color="success"
                                                v-model="templateData.status"
                                                :label="$t('general.STATUS')"
                                               >
                                            </v-switch>
                                        </v-flex>
                                    </v-layout>
                                </v-flex>
                                <v-flex md8>
                                    <quill-editor class="editor-content"
                                        v-model="templateData.template_desc"
                                        ref="myQuillEditor"
                                        :data-vv-as="$t('template.TEMPLATE_DESC')"
                                        data-vv-name="template_desc"
                                        v-validate="'required'"
                                        :error="errors.has('template_desc')"
                                    >
                                    </quill-editor>
                                </v-flex>
                            </v-layout>
                           </template>
                    </v-form>
                </v-card-text>
            </v-card>
        </app-card>
    </v-layout>
</v-container>
    <delete-confirmation
        :show_confirm_delete="show_confirm_delete"
        :headerText="$t('general.DELETE_CONFIRM_MSG',{'name': $t('template.TEMPLATE')})"
        :bodyText="$t('general.DELETE_CONFIRM_MSG',{'name': $t('template.TEMPLATE')})"
        @deleteEntity="deleteEntityHandler"
        @closeConfirm="show_confirm_delete = false"
    >
    </delete-confirmation>
</div>
</template>
<script>
    import api from "Api";
    import {AddEdit} from "Helpers/AddEdit";
    export default {
        mixins: [AddEdit],
        created() {
            this.$store.dispatch("setHeaderTitle", 'template.TEMPLATE');
            let that = this;
            if(this.$route.name == 'template_edit') {
                api.get('/api/templates/' + this.$route.params.template_id).then(function (response) {
                    that.templateData = response.data.data;
                });
            }
            else {
                api.get('/api/templates').then(function (response) {
                    response.data.data.map(key => {
                        that.template_keys.push(key.template_key);
                    })
                });
            }
            Vue.prototype.$eventHub.$on('saveTemplate', (payload) => {that.validateForm(payload)});
            Vue.prototype.$eventHub.$on('saveAndCloseTemplate', (payload) => {that.validateForm(payload)});
            Vue.prototype.$eventHub.$on('toggleEditDialogTemplate', this.deleteConfirm);
            this.$validator.extend('checkTemplateKey', {
                getMessage(field, val) {
                    return 'Template Key already exist.'
                },
                validate(value, field) {
                    that.temp_key = value ? value.toLowerCase().trim().replace(/\s+/g, " ").split(' ').join('_') : '';
                    if(that.template_keys.includes(that.temp_key)) {
                        return false;
                    }
                    else {
                        return true;
                    }
                }
            })
        },
        beforeDestroy() {
            Vue.prototype.$eventHub.$off('saveTemplate');
            Vue.prototype.$eventHub.$off('saveAndCloseTemplate');
        },
        data: function() {
            return {
                templateData:{
                    name:'',
                    template_key:'',
                    template_desc:'',
                    section: '',
                    status: 0,
                    type: '',
                },
                selecttypes:[
                    {text: this.$t('template.filter.PDF'), value: 'pdf'},
                    {text: this.$t('template.filter.EMAIL'), value: 'email'},
                ],
                template_keys: [],
                temp_key: '',
                confirmDeleteDialog: false
            };
        },
        methods: {
            validateForm(event_type='save') {
                this.$validator.validateAll().then((result) => {
                    if (!result) {
                        Vue.prototype.$eventHub.$emit('fireError', this.$validator.errors.all());
                        return;
                    }
                    else{
                        this.templateData.template_key = this.temp_key;
                        if(this.$route.name == "template_edit") {
                            api.put('/api/templates/' + this.$route.params.template_id, this.templateData).then(response => {
                                Vue.prototype.$eventHub.$emit('fireSuccess', response.data.message);
                                if(event_type == 'save_and_close'){
                                    this.$router.push('/templates');
                                }
                            })
                        }
                        else if(this.$route.name == "template_create"){
                            api.post('/api/templates', this.templateData).then(response => {
                                Vue.prototype.$eventHub.$emit('fireSuccess', response.data.message);
                                if(event_type == 'save_and_close'){
                                    this.$router.push('/templates');
                                }
                            })
                        }
                    }
                });
            },
            deleteEntityHandler(){
                // let that = this;
                // that.loading = true;
                // api.delete('/api/templates/'+this.$route.params.template_id).then(response => {
                //     Vue.prototype.$eventHub.$emit('fireSuccess', response.data.message);
                //     that.show_confirm_delete = false;
                //     that.loading = false;
                //     that.$router.push('/templates');
                // })
            }
        },
        computed: {
            editor() {
                return this.$refs.myQuillEditor.quill;
            },
            sections: function(){
                let section = [];
                if(this.$store.getters.serverHelpers.sections){
                    _.forOwn(this.$store.getters.serverHelpers.sections, function(title, key) {
                        section.push({'value': title, 'text': title})
                    });
                }
                return section;
            },
        },
    }
</script>

<style scoped>
    .editor-content
    {
        max-height: 300px !important;
    }
</style>

