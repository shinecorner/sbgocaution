<!-- Side Structure -->
<template>
  	<div class="sidebar leftbar" :class="sidebarSelectedFilter.class">
    	<vue-perfect-scrollbar class="scroll-area" :settings="settings">
        <v-toolbar flat class="transparent scroll-area navigation">
          <v-list>
				<app-logo></app-logo>
                                <!--<user-block></user-block>-->                                
				<template v-for="(category, key, index) in menus">
					<div :key="key" :class="{ 'first-menu-item': (index === 0) }">	
                                                <div class="sidebar-title px-3">
							<span>{{$t(key)}}</span>
						</div>
						<template v-for="item in category">
							<template v-if="item.items != null">
								<v-list-group
									:key="item.title"									
									append-icon=""
									no-action
									v-model="item.active"
								>
									<v-list-tile slot="activator">
										<v-list-tile-contents
											<v-list-tile-title  v-if="item.items!= null">
												<i class="mr-1 zmdi" :class="item.action"></i>
												<span >{{ textTruncate($t(item.title)) }}</span>
											</v-list-tile-title>											
										</v-list-tile-content>                                                                                
									</v-list-tile>
                                                                        <template v-for="subItem in item.items" v-if="subItem !== null" style="position:relative;">
                                                                                <v-list-tile v-bind:key="subItem.title">
                                                                                    <v-list-tile-content>
											<v-list-tile-title>
                                                                                            <router-link :to="!subItem.exact ? `/${getCurrentAppLayoutHandler() + subItem.path}` : subItem.path"> {{ textTruncate($t(subItem.title)) }}</router-link>                                                                                            
                                                                                        </v-list-tile-title>
                                                                                    </v-list-tile-content>                                                                                                                                                                   
                                                                                </v-list-tile>                                                                                
                                                                        </template>									                                                                       
								</v-list-group>
							</template>	
							<template v-else>
								<v-list-group
									class="not-submenu"
									:key="item.title"									
									append-icon=""
									no-action
									v-model="item.active"
								>
									<v-list-tile slot="activator">
										<v-list-tile-content >
											<v-list-tile-title>
												<router-link :to="!item.exact ? `/${getCurrentAppLayoutHandler() + item.path}` : item.path">
													<i class="mr-1 zmdi" :class="item.action"></i>
													<span>{{ textTruncate($t(item.title)) }}</span>
												</router-link>
											</v-list-tile-title>
										</v-list-tile-content>
                                                                                <span  v-if="item.label === 'contact'">
                                                                                        <span class="sidebar-label ml-2">
                                                                                            <router-link class="d-inline-block" :to="!item.exact ? `/${getCurrentAppLayoutHandler() + item.path}` : item.path">{{((serverHelpers.navbar_contacts_count)? serverHelpers.navbar_contacts_count : '0')}}</router-link>
                                                                                        </span>
                                                                                        <span class="sidebar-label">
                                                                                            <router-link class="d-inline-block" to="/crediweb">{{$t('message.contact.CONTACT_CW')}}</router-link>
                                                                                        </span>
                                                                                </span> 
									</v-list-tile>
									
								</v-list-group>
							</template>	
						</template>
					</div>
				</template>
          </v-list>
        </v-toolbar>
    	</vue-perfect-scrollbar>
  	</div>
</template>

<script>
import UserBlock from "./UserBlock";
import { textTruncate, getCurrentAppLayout } from "Helpers/helpers";
import { mapGetters } from "vuex";
import AppLogo from "Components/AppLogo/AppLogo";

export default {
  data() {
    return {
      settings: {
        maxScrollbarLength: 160
      }
    };
  },
  components: {
    UserBlock,
    AppLogo
  },
  computed: {
    ...mapGetters(["sidebarSelectedFilter", "menus", "serverHelpers"])
  },
  methods: {
    textTruncate(text) {
      return textTruncate(text, 18);
    },
    getCurrentAppLayoutHandler() {
      return getCurrentAppLayout(this.$router);
    }
  }
};
</script>
