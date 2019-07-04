<template>
    <div class="pt-4">
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
                                            <v-flex xs12 sm12 md12 lg12 xl12>
                                                <v-checkbox v-model="selected" label="John" value="John"></v-checkbox>                                                
                                            </v-flex>
                                        </v-layout>                                                                                                                                                                                                                   
                                </v-form>
                            </v-card-text>
                        </v-card>                                             
                </app-card>
            </v-layout>			
        </v-container>
    </div>
</template>

<script>
import api from "Api";
import { mapState } from "vuex";
export default {
	data() {
            return {
                user: {},
                loading: false
            }
	},
	computed: {
		
	},
	created() {
                let that = this;
                
		api.get('/api/users/'+this.$route.params.id).then(function(response){
                    that.user = response.data.data;
                });
                that.$store.dispatch("setHeaderTitle", 'role.EDIT_ROLE');
                Vue.prototype.$eventHub.$on('saveUser', this.validateForm);
                Vue.prototype.$eventHub.$on('deleteUser', this.deleteEntity);
	},
	methods: {
            validateForm() {
                let that = this;
                that.loading = true;
                this.$validator.validateAll().then((result) => {
                  if (result) {                    
                    api.put('/api/users/'+this.$route.params.id,{name: that.user.name}).then(response => {
                        that.loading = false;
                        Vue.prototype.$eventHub.$emit('fireSuccess', response.data.message);
                    })
                  }
                  else{
                    Vue.prototype.$eventHub.$emit('fireError', this.$validator.errors.all());
                    return;
                  }
                });
            },
            deleteEntity(){
                let that = this;
                that.loading = true;
                api.delete('/api/users/'+this.$route.params.id).then(response => {
                    Vue.prototype.$eventHub.$emit('fireSuccess', response.data.message);
                    that.loading = false;
                    that.$router.push('/roles');
                })            
            }
	}
};
</script>
