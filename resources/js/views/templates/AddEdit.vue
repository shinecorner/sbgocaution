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
                                                v-model="name"
                                                label="Name"
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
                                                v-model="template_key"
                                                hide-details
                                                :readonly="$route.name == 'template_edit'"
                                                :rules="[ checkTemplateKey ]"
                                                :data-vv-as="$t('template.TEMPLATE_KEY')"
                                                data-vv-name="template_key"
                                                v-validate="'required'"
                                                :error="errors.has('template_key')"
                                                ></v-text-field>
                                            <span class="text-danger" v-if="tempkey_error">Template Key already exist!!!</span>
                                        </v-flex>
                                        <v-flex sm4 md4 lg4 >
                                            <v-text-field v-if="$route.name == 'template_create'"
                                                outline
                                                v-model="section"
                                                :label="$t('template.SECTION')"
                                                :no-data-text="$t('general.NO_RESULTS_TEXT_DROPDOWN')"
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
                                                            v-model="section"
                                                            :label="$t('template.SECTION')"
                                                            :no-data-text="$t('general.NO_RESULTS_TEXT_DROPDOWN')"
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
                                                v-model="selecttype"
                                                hide-details
                                                :label="$t('template.filter.SELECT_TYPE')"
                                                :no-data-text="$t('general.NO_RESULTS_TEXT_DROPDOWN')"
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
                                                v-model="status"
                                                :label="$t('general.STATUS')"
                                               >
                                            </v-switch>
                                        </v-flex>
                                    </v-layout>
                                </v-flex>
                                <v-flex md8>
                                    <quill-editor class="editor-content"
                                        v-model="template_desc"
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
<delete-confirmation v-if="confirmDeleteDialog" :toggleConfirm="deleteConfirm"></delete-confirmation>
</div>
</template>
<script>
    import api from "Api";
    import DeleteConfirmation from "../../components/Crm/Template/DeleteConfirmation";
    export default {
        components: {DeleteConfirmation},
        created() {
            this.$store.dispatch("setHeaderTitle", 'template.TEMPLATE');
            let that = this;
            if(this.$route.name == 'template_edit') {
                api.get('/api/templates/' + this.$route.params.template_id).then(function (response) {
                    var templateData = response.data.data;
                    that.name = templateData.name
                    that.template_key = templateData.template_key,
                    that.section = templateData.section,
                    that.status = templateData.status == 1 ? true : false,
                    that.selecttype = templateData.type,
                    that.template_desc = templateData.template_desc
                });
            }
            else {
                api.get('/api/templates').then(function (response) {
                    response.data.data.map(key => {
                        that.template_keys.push(key.template_key);
                    })
                });
            }
            Vue.prototype.$eventHub.$on('saveTemplate', this.validateForm);
            Vue.prototype.$eventHub.$on('toggleEditDialogTemplate', this.deleteConfirm);
        },
        beforeDestroy() {
            Vue.prototype.$eventHub.$off('saveTemplate');
        },
        data: function() {
            return {
                name:'',
                template_key:'',
                template_desc:'',
                section: '',
                status:false,
                selecttype: '',
                selecttypes:[
                    {text: this.$t('template.filter.PDF'), value: 'pdf'},
                    {text: this.$t('template.filter.EMAIL'), value: 'email'},
                ],
                template_keys: [],
                temp_key: '',
                tempkey_error: false,
                confirmDeleteDialog: false
            };
        },
        methods: {
            validateForm() {
                if(this.$refs.form.validate()) {
                    this.$validator.validateAll().then((result) => {
                        if (!result) {
                            Vue.prototype.$eventHub.$emit('fireError', this.$validator.errors.all());
                            return;
                        }
                        else{
                            if(this.$route.name == "template_edit") {
                                let formData = {
                                    name: this.name,
                                    section: this.section,
                                    status: this.status == true ? 1 : 0,
                                    template_desc: this.template_desc,
                                    type: this.selecttype
                                }
                                api.put('/api/templates/' + this.$route.params.template_id, formData).then(response => {
                                    Vue.prototype.$eventHub.$emit('fireSuccess', response.data.message);
                                })
                            }
                            else if(this.$route.name == "template_create"){
                                let formData = {
                                    name: this.name,
                                    section: this.section,
                                    status: this.status == true ? 1 : 0,
                                    template_desc: this.template_desc,
                                    template_key:this.temp_key,
                                    type: this.selecttype
                                }
                                api.post('/api/templates', formData).then(response => {
                                    Vue.prototype.$eventHub.$emit('fireSuccess', response.data.message);
                                })
                            }
                        }
                        Vue.prototype.$eventHub.$emit('checkError', result);
                    });
                }
            },
            checkTemplateKey(){
                this.temp_key = this.template_key ? this.template_key.toLowerCase().trim().replace(/\s+/g, " ").split(' ').join('_') : '';
                if(this.template_keys.includes(this.temp_key)) {
                    this.tempkey_error = true;
                    return 'Template key already Exist!!!';
                }
                else {
                    this.tempkey_error = false;
                    return true;
                }
            },
            deleteConfirm(){
                this.confirmDeleteDialog = !this.confirmDeleteDialog;
            },
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

