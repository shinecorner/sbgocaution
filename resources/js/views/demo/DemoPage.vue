<template>
	<div>		
		<v-container fluid grid-list-xl py-0>			                        
			<app-card
				:heading="$t('message.validationWithSubmitAndclear')"
				customClasses="mb-30"
				>
                                {{errors}}
				<v-form ref="form" lazy-validation>
					<v-text-field
						label="Name"
						v-model="name"
                                                data-vv-name="name"
						:counter="10"
                                                :error="errors.has('name')"
                                                v-validate="'required|min:4'"                                                
					></v-text-field>                                        
                                        <span v-show="errors.has('name')" class="help is-danger v-messages__message">{{ errors.first('name') }}</span>
					<v-text-field
						label="Age"
						v-model="age"
                                                :error="errors.has('age')"
                                                data-vv-name="age"
                                                v-validate="'required|between:20,30'"
					></v-text-field>
					
					<v-btn
						@click="submit"						
						color="success"
					>
						{{$t("message.submit")}}
					</v-btn>
					<v-btn @click="clear" color="primary">{{$t("message.clear")}}</v-btn>
				</v-form>
			</app-card>
		</v-container>
	</div>
</template>

<script>
export default {
  data() {
    return {           
        name: "",        
        age: "",  
        error_message: ""
    };
  },   
  methods: {
    submit() {
        this.$validator.validateAll();
        if(this.$validator.errors.any()){        
            let msgHTML = '';
            _.forOwn(this.$validator.errors.all(), function(msg, key) { 
                msgHTML += ('<li>' + msg + '<\/li>')
            });            
            Vue.prototype.$eventHub.$emit('fireError', '<ul>' + msgHTML + '<\/ul>');
            Vue.prototype.$eventHub.$emit('fireSuccess', '<ul>' + msgHTML + '<\/ul>');
        }
    },
    clear() {
      this.$refs.form.reset();
    }
  }
};
</script>
