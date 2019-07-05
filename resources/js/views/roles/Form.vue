<template>
    <div class="role-edit pt-4">
        <app-section-loader :status="loading"></app-section-loader>
            <v-container fluid grid-list-xl pt-0>
                <v-layout row wrap>                                                
                    <app-card colClasses="xs12 md12">                    
                        <v-card flat>
                            <v-card-text> 
                                <v-form @submit.stop.prevent="validateForm">                                
                                    <v-layout row wrap>
                                        <v-flex xs12 sm12 md12 lg6 xl6>
                                            <v-text-field                                                
                                                outline                                                
                                                hide-details
                                                :label="$t('role.TITLE')"
                                                :data-vv-as="$t('role.TITLE')"
                                                v-model="role.name"
                                                data-vv-name="title"
                                                v-validate="'required'"
                                                :error="errors.has('title')"
                                                required></v-text-field>
                                            </v-flex>
                                            <v-container fluid>                                                
                                                <v-checkbox 
                                                    color="success"
                                                    v-for="(permission, p_id) in permissions"  
                                                    v-bind:key="p_id" 
                                                    class="chkboxlist" 
                                                    v-model="role.permissions" 
                                                    :label="permission" 
                                                    :value="parseInt(p_id)"
                                                ></v-checkbox>
                                            </v-container>
                                        </v-layout>                                                                                                                                                                                                                   
                                </v-form>
                            </v-card-text>
                        </v-card>                                             
                </app-card>
            </v-layout>			
        </v-container>
        <delete-confirmation  
            :show_confirm_delete="show_confirm_delete"
            :headerText="$t('general.DELETE_CONFIRM_MSG',{'name': $t('role.ROLES')})"
            :bodyText="$t('general.DELETE_CONFIRM_MSG',{'name': $t('role.ROLES')})"
            @deleteEntity="deleteEntityHandler"
            @closeConfirm="show_confirm_delete = false"
        >
        </delete-confirmation>
    </div>
</template>

<script>
import api from "Api";
import { mapState } from "vuex";
import {AddEdit} from "Helpers/AddEdit";

export default {
        mixins: [AddEdit],
	data() {
            return {
                role: {
                    permissions: []
                },                
            }
	},
	computed: {
            permissions: function(){
                if(this.$store.getters.serverHelpers.hasOwnProperty('role_permissions')){                    
                    return this.$store.getters.serverHelpers.role_permissions;        
                }
                else{
                    return [];
                }        
            },
	},
	created() {
                let that = this;
                if(this.$route.name == 'role_edit'){
                    api.get('/api/roles/'+this.$route.params.id).then(function(response){
                        that.role = response.data.data;                        
                    });                    
                }                
                that.$store.dispatch("setHeaderTitle", 'role.EDIT_ROLE');
                Vue.prototype.$eventHub.$on('saveRole', (payload) => {that.validateForm(payload)});
                Vue.prototype.$eventHub.$on('saveAndCloseRole', (payload) => {that.validateForm(payload)});
                Vue.prototype.$eventHub.$on('toggleEditDialogRole', this.deleteConfirm);
	},
	methods: {
            validateForm(event_type='save') {
                let that = this;
                that.loading = true;
                let formInput = {};
                formInput.name = that.role.name;
                formInput.permissions = that.role.permissions;
                this.$validator.validateAll().then((result) => {
                  if (result) {
                    if(this.$route.name == 'role_edit'){
                        api.put('/api/roles/'+this.$route.params.id, formInput).then(response => {
                            that.loading = false;
                            Vue.prototype.$eventHub.$emit('fireSuccess', response.data.message);
                            if(event_type == 'save_and_close'){
                                that.$router.push('/roles');
                            }
                        })
                    }
                    else if(this.$route.name == 'role_create'){
                        api.post('/api/roles',formInput).then(response => {
                            that.loading = false;
                            Vue.prototype.$eventHub.$emit('fireSuccess', response.data.message);
                            if(event_type == 'save_and_close'){
                                that.$router.push('/roles');
                            }
                        })
                    }
                  }
                  else{
                    Vue.prototype.$eventHub.$emit('fireError', this.$validator.errors.all());
                    return;
                  }
                });
            },
            deleteEntityHandler(){
                let that = this;
                that.loading = true;
                api.delete('/api/roles/'+this.$route.params.id).then(response => {
                    Vue.prototype.$eventHub.$emit('fireSuccess', response.data.message);
                    that.show_confirm_delete = false;
                    that.loading = false;
                    that.$router.push('/roles');
                })            
            }            
	}
};
</script>
<style scoped>
.role-edit >>> .chkboxlist{
    margin-top: 0px;
    padding-top: 0px;
}
</style>