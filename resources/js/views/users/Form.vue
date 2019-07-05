<template>
    <div class="user-edit pt-4">
        <app-section-loader :status="loading"></app-section-loader>
            <v-container fluid grid-list-xl pt-0>
                <v-layout row wrap>                                                
                    <app-card colClasses="xs12 md12">  
                        <v-tabs
                        left
                        color="cyan"
                        dark
                        icons-and-text>                                    
                        
                        <v-tabs-slider color="yellow"></v-tabs-slider>
                        
                        <v-tab v-for="(icon, index) in tabItems" :href="'#tab-'+index" :key="index">
                            {{icon.text}}
                            <v-icon>{{icon.icon}}</v-icon>
                        </v-tab>

                        <v-tab-item
                          v-for="(icon,index) in tabItems"
                          :value="'tab-' + index"
                          :key="index"
                        >
                        <v-card flat v-if="index=='email'">
                            <v-card-text> 
                                <v-form @submit.stop.prevent="validateForm">                                
                                    <v-layout row wrap>
                                        <v-flex xs12 sm12 md12 lg6 xl6>
                                            <v-text-field                                                
                                                outline                                                
                                                hide-details
                                                :label="$t('general.NAME')"
                                                :data-vv-as="$t('general.NAME')"
                                                v-model="user.name"
                                                data-vv-name="name"
                                                v-validate="'required'"
                                                :error="errors.has('name')"
                                                required></v-text-field>
                                            </v-flex>                                            
                                        </v-layout>                                                                                                                                                                                                                   
                                </v-form>
                            </v-card-text>
                        </v-card> 
                        </v-tab-item>
                    </v-tabs>
                </app-card>
            </v-layout>			
        </v-container>
        <delete-confirmation  
            :show_confirm_delete="show_confirm_delete"
            :headerText="$t('general.DELETE_CONFIRM_MSG',{'name': $t('user.USERS')})"
            :bodyText="$t('general.DELETE_CONFIRM_MSG',{'name': $t('user.USERS')})"
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
                tabItems: {
                    "crm": {
                            icon: "zmdi zmdi-group",
                            text: "CRM"
                    },
                    "email": {
                            icon: "zmdi zmdi-email",
                            text: "Email"
                    }
                },  
                user: {
                    roles: [],
                    permissions: []
                },                
            }
	},
	computed: {
            
	},
	created() {
                let that = this;
                if(this.$route.name == 'user_edit'){
                    api.get('/api/users/'+this.$route.params.id).then(function(response){
                        that.user = response.data.data;                        
                    });                    
                }                
                that.$store.dispatch("setHeaderTitle", 'user.EDIT_ACCOUNT');
                Vue.prototype.$eventHub.$on('saveUser', (payload) => {that.validateForm(payload)});
                Vue.prototype.$eventHub.$on('saveAndCloseUser', (payload) => {that.validateForm(payload)});
                Vue.prototype.$eventHub.$on('toggleEditDialogUser', this.deleteConfirm);
	},
	methods: {
            validateForm(event_type='save') {
                let that = this;
                that.loading = true;
                let formInput = {};
                formInput.name = that.user.name;                
                this.$validator.validateAll().then((result) => {
                  if (result) {
                    if(this.$route.name == 'user_edit'){
                        api.put('/api/users/'+this.$route.params.id, formInput).then(response => {
                            that.loading = false;
                            Vue.prototype.$eventHub.$emit('fireSuccess', response.data.message);
                            if(event_type == 'save_and_close'){
                                that.$router.push('/users');
                            }
                        })
                    }
                    else if(this.$route.name == 'user_create'){
                        api.post('/api/users',formInput).then(response => {
                            that.loading = false;
                            Vue.prototype.$eventHub.$emit('fireSuccess', response.data.message);
                            if(event_type == 'save_and_close'){
                                that.$router.push('/users');
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
                api.delete('/api/users/'+this.$route.params.id).then(response => {
                    Vue.prototype.$eventHub.$emit('fireSuccess', response.data.message);
                    that.show_confirm_delete = false;
                    that.loading = false;
                    that.$router.push('/users');
                })            
            }            
	}
};
</script>
<style scoped>
.user-edit >>> .chkboxlist{
    margin-top: 0px;
    padding-top: 0px;
}
</style>