    <template>
    <v-container search-content>
        <v-form ref="filterForm" @keyup.native.enter="$emit('filterData')" @submit.prevent="$emit('filterData')">
            <v-layout row wrap>
                <v-flex xs12 sm6 md6 lg2 xl2>
                    <keyword-search></keyword-search>
                </v-flex>
                <v-flex xs12 sm6 md4 lg2 xl2>
                    <city></city>
                </v-flex>
                <v-flex xs12 sm6 md4 lg2 xl2>
                    <kanton></kanton>
                </v-flex>
                <v-flex xs12 sm6 md4 lg2 xl2>
                    <salutation></salutation>
                </v-flex>
                <v-flex xs12 sm6 md4 lg2 xl2>
                    <language></language>
                </v-flex>
                <v-flex xs12 sm6 md4 lg2 xl2>
                    <policy-number></policy-number>
                </v-flex>
                <v-flex xs12 sm6 md4 lg2 xl2>
                    <policy-accepted-number></policy-accepted-number>
                </v-flex>
            </v-layout>
        </v-form>
        <v-layout row wrap>
            <v-flex shrink d-inline-block>
                <v-btn type="submit" color="success left" @click.prevent="$emit('filterData')"><v-icon>search</v-icon>{{$t('general.filter.SEARCH')}}</v-btn>
                <v-btn color="success left" @click="resetData">{{$t('general.filter.RESET')}}</v-btn>
            </v-flex>
            <v-flex shrink d-inline-block>
                <v-select class="perpage_selectbox left" v-bind:items="perPageItems"  v-model.number="perPage" menu-props="bottom" ></v-select>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
import globalFunction from "Helpers/helpers";
import KeywordSearch from "Components/Crm/General/KeywordSearch";
import Language from "Components/Crm/General/Language";
import Salutation from "Components/Crm/PrivateLandlord/Salutation";
import City from "Components/Crm/PrivateLandlord/City";
import Kanton from "Components/Crm/PrivateLandlord/Kanton";
import PolicyNumber from "Components/Crm/General/PolicyNumber";
import PolicyAcceptedNumber from "Components/Crm/General/PolicyAcceptedNumber";

export default{
    mixins: [globalFunction],
    components: {
        KeywordSearch,
        Salutation,
        Language,
        City,
        Kanton,
        PolicyNumber,
        PolicyAcceptedNumber
    },
    data() {
        return {
            isResetForm: false,
            perPageItems: process.env.MIX_PER_PAGE_OPTIONS.split(',').map(Number),
            perPage: ((this.$store.getters.serverHelpers.hasOwnProperty('configs') && this.$store.getters.serverHelpers.configs['crm.items_per_page'])? parseInt(this.$store.getters.serverHelpers.configs['crm.items_per_page']) : 20)
        }
    },
    watch:{
        perPage: function(newVal, oldVal){
            this.changePerPageOption(newVal);
        }
    },
    computed:{
        contactofferactions: function(){
            if(this.$store.getters.serverHelpers.hasOwnProperty('contactPDF_statuslist')){
                return this.$store.getters.serverHelpers.contactPDF_statuslist;
            }
            else{
                return {};
            }
        },
        diverse: {
            get () {
                if(this.$store.getters.inputItems.hasOwnProperty('diverse')){
                    return this.$store.getters.inputItems.diverse;
                }
                else{
                    return '';
                }
            },
            set (value) {
              this.$store.dispatch("addInputItem", {fieldname: 'diverse', fieldvalue: value});
            }
        },
        duplicate: {
            get () {
                if(this.$store.getters.inputItems.hasOwnProperty('duplicate')){
                    return this.$store.getters.inputItems.duplicate;
                }
                else{
                    return '0';
                }
            },
            set (value) {
                if(value === '0'){
                    this.$store.dispatch("deleteInputItem", {fieldname: 'duplicate'});
                }
                else{
                    this.$store.dispatch("addInputItem", {fieldname: 'duplicate', fieldvalue: value});
                }
            }
        },
        duplicate_email: {
            get () {
                if(this.$store.getters.inputItems.hasOwnProperty('duplicate_email')){
                    return this.$store.getters.inputItems.duplicate_email;
                }
                else{
                    return '0';
                }
            },
            set (value) {
              if(value === '0'){
                    this.$store.dispatch("deleteInputItem", {fieldname: 'duplicate_email'});
                }
                else{
                    this.$store.dispatch("addInputItem", {fieldname: 'duplicate_email', fieldvalue: value});
                }
            }
        },
        incorrect_address: {
            get () {
                if(this.$store.getters.inputItems.hasOwnProperty('incorrect_address')){
                    return this.$store.getters.inputItems.incorrect_address;
                }
                else{
                    return '0';
                }
            },
            set (value) {
              if(value === '0'){
                    this.$store.dispatch("deleteInputItem", {fieldname: 'incorrect_address'});
                }
                else{
                    this.$store.dispatch("addInputItem", {fieldname: 'incorrect_address', fieldvalue: value});
                }
            }
        },
    },
    methods: {
        changePerPageOption: function(val){
            this.$emit('changePage', val);
        },
        resetData: function(event){
            this.$store.dispatch("clearInputItems");
            this.$refs.filterForm.reset();
            this.isResetForm = true;
            //this.perPage = ((this.$store.getters.serverHelpers.hasOwnProperty('configs') && this.$store.getters.serverHelpers.configs['crm.items_per_page'])? parseInt(this.$store.getters.serverHelpers.configs['crm.items_per_page']) : 20);
            this.$emit('resetData');
        }
    }
}
</script>
