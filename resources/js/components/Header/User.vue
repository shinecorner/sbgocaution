<template>
                    <v-menu 
			bottom
			offset-y
			left
			content-class="userblock-dropdown" 
			nudge-top="-10"
			nudge-right="0"
			transition="slide-y-transition"
                    >
		<v-btn icon large slot="activator">
			<img src="/static/avatars/user-13.jpg" alt="avatar" height="40" width="40" class="img-responsive rounded-circle" />
		</v-btn>
		<div class="dropdown-content">
         <div class="dropdown-top white--text primary">
            <span class="white--text fs-14 fw-bold d-block">John Leider</span>
            <span class="d-block fs-12 fw-normal">info@example.com</span>
         </div>
         <v-list class="dropdown-list">            
               <v-list-tile :to="getMenuLink('/users/user-profile')">
                  <i class="ti-user mr-3 primary--text"></i>
                  <span>{{$t('message.user.EDIT_ACCOUNT')}}</span>
               </v-list-tile>                        
               <v-list-tile @click="logoutUser">
                  <i class="ti-power-off mr-3 error--text"></i>
                  <span>{{$t('message.login.routes.LOGOUT')}}</span>
               </v-list-tile>
            
         </v-list>
      </div>
	</v-menu>
</template>
<script>
   import { getCurrentAppLayout } from "Helpers/helpers";

   export default{
      data() {
         return {
            
         }
      },
      methods: {
         logoutUser() {
            this.$store.dispatch("logoutUserFromFirebase", this.$router);
         },
         getMenuLink(path) {
            return '/' + getCurrentAppLayout(this.$router) +  path;
         }
      }
   }
</script>
