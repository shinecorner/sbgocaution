<template>
    <div class="privatelandlordlist">
        <!--<page-title-bar></page-title-bar>-->
        <app-section-loader :status="loading"></app-section-loader>
        <v-container fluid grid-list-xl py-0>
            <v-layout row wrap>
                <app-card
                    :fullBlock="true"
                    colClasses="xl12 lg12 md12 sm12 xs12"
                >
                </app-card>
            </v-layout>
            <v-layout row wrap>
                <app-card
                    :fullBlock="true"
                    colClasses="xl12 lg12 md12 sm12 xs12"
                >
                    <div class="v-table__overflow list-table-container">
                        <vuetable ref="vuetable"
                                  :no-data-template="noDataMessage"
                                  api-url="api/privatelandlords"
                                  :http-fetch="privatelandlordFetch"
                                  :fields="fields"
                                  :css="css.table"
                                  :transform="transform"
                                  pagination-path="pagination"
                                  data-path="mydata"
                                  :append-params="moreParams"
                                  :per-page="perPage"
                                  track-by="id"
                                  @vuetable:pagination-data="onPaginationData"
                                  @vuetable:loading="onLoading"
                                  @vuetable:loaded="onLoaded"
                        >
                            <template slot="prettycheck" slot-scope="props">
                                <v-checkbox color="indigo" v-model="checkedRows" :key="'check_'+props.rowData.id" :value="props.rowData.id"></v-checkbox>
                            </template>
                            <template slot="c_name" slot-scope="props">
                                    <span class="salute_icon left">
                                        <template v-if="props.rowData.salutation === 'company'">
                                            <v-tooltip top>
                                                <font-awesome-icon :icon="['far', 'building']" slot="activator"/>
                                                <span>{{$t('general.COMPANY')}}</span>
                                            </v-tooltip>
                                        </template>
                                        <template v-else-if="props.rowData.salutation === 'mr'">
                                            <v-tooltip top>
                                                <font-awesome-icon :icon="['fas', 'mars']" slot="activator"/>
                                                <span>{{$t('general.MR')}}</span>
                                            </v-tooltip>
                                        </template>
                                        <template v-else-if="props.rowData.salutation === 'mrs'">
                                            <v-tooltip top>
                                                <font-awesome-icon :icon="['fas', 'venus']" slot="activator"/>
                                                <span>{{$t('general.MRS')}}</span>
                                            </v-tooltip>
                                        </template>
                                    </span>
                                <span class="primary-text left ml-1">{{ props.rowData.first_name + ' ' + props.rowData.last_name}}</span><br/>
                                <span class="grey--text secondary-text fs-12 d-block">{{ props.rowData.created_at }}</span>
                                <div class="column_icon_container">
                                    <v-tooltip top v-if="props.rowData.is_duplicate">
                                        <v-icon color="orange darken-2" size="18" slot="activator">zmdi-alert-triangle</v-icon>
                                        <span>{{props.rowData.is_duplicate}}</span>
                                    </v-tooltip>
                                    <v-tooltip top v-if="props.rowData.language_flag">
                                        <img class="contact_flag" height="12" :src="props.rowData.language_flag" slot="activator"/>
                                        <span>{{props.rowData.language}}</span>
                                    </v-tooltip>
                                </div>
                            </template>
                            <template slot="c_edit" slot-scope="props">
                                <v-tooltip top v-if="props.rowData.id">
                                    <a href="#" slot="activator">
                                        <v-avatar size="26" class="round-badge-success">
                                            <v-icon color="white" small>zmdi zmdi-edit</v-icon>
                                        </v-avatar>
                                    </a>
                                    <span>{{ $t('general.EDIT') }}</span>
                                </v-tooltip>
                            </template>
                            <template slot="c_contactformate" slot-scope="props">
                                <span class="primary-text" v-if="props.rowData.address">{{ props.rowData.address }}</span>
                                <span class="primary-text secondary-text">{{ props.rowData.zip }} {{ props.rowData.city }}</span>
                            </template>
                            <template slot="c_details" slot-scope="props">
                                <span class="primary-text" v-if="props.rowData.phone">{{ props.rowData.phone }}</span>
                                <span class="grey--text secondary-text">{{ props.rowData.email }} </span>
                            </template>
                            <template slot="c_invoices" slot-scope="props">
                                <span class="amount-div">{{ props.rowData.invoice_total}}</span>
                                <span class="grey--text fs-12 secondary-text fw-normal d-block">{{props.rowData.count_policies}}&nbsp;{{ $t('contact.TOTAL_POLICIES') }}</span>
                                <span class="grey--text fs-12 secondary-text fw-normal d-block">{{props.rowData.count_invoices}}&nbsp;{{ $t('contact.TOTAL_INVOICES') }}</span>
                            </template>
                            <template slot="c_policy" slot-scope="props">
                                <policy-count :policy_count_detail="props.rowData.count_policy_by_status"></policy-count>
                            </template>
                        </vuetable>
                    </div>
                    <div class="layout row wrap pagination-container">
                        <v-flex sm6></v-flex>
                        <v-flex sm6>
                            <vuetable-pagination ref="pagination"
                                                 :css="css.pagination"
                                                 @vuetable-pagination:change-page="onChangePage"
                            ></vuetable-pagination>
                        </v-flex>
                    </div>
                </app-card>
            </v-layout>
        </v-container>
    </div>
</template>

<script>
    import api from "Api";
    import { mapGetters } from "vuex";
    import { Vuetable, VuetablePagination, VuetablePaginationInfo, VuetablePaginationDropdown} from 'vuetable-2';
    import globalFunction from "Helpers/helpers";
    import PolicyCount from "Components/Crm/General/PolicyCount";
   // import Filters from "./Filters";

    export default {
        mixins: [globalFunction],
        components: {
            Vuetable,
            VuetablePagination,
            VuetablePaginationInfo,
            PolicyCount
            //Filters
        },
        watch: {
            selectedLocale: function(newVal, oldVal){
                this.$refs.vuetable.refresh();
                this.reinitializeFields();
            }
        },
        data() {
            return {
                noDataMessage: this.$i18n.t('general.DATA_LOADING'),
                loading: true,
                currentPerPage: '',
                perPage: ((this.$store.getters.serverHelpers.hasOwnProperty('configs') && this.$store.getters.serverHelpers.configs['crm.items_per_page'])? parseInt(this.$store.getters.serverHelpers.configs['crm.items_per_page']) : 20),
                moreParams: {},
                paginationComponent: 'vuetable-pagination',
                httpOptions: { headers: { Authorization: 'Bearer '+localStorage.getItem('accessToken') } },
                checkedRows: [],
                fields: [
                    {name: "prettycheck",   title: '', titleClass: "chkbox_column", dataClass: "chkbox_column"},
                    { title: this.$t('general.NAME'), name: "c_name" },
                    { title: "", name: "c_edit", dataClass: 'edit_data', titleClass:'edit_column' },
                    { title: this.$t('privatelandlord.PRIVATE_HOUSEOWNER_NUM'), name: "c_contactformate", titleClass: 'contact_id_title',dataClass: 'contact_id_data' },
                    { title: this.$t('privatelandlord.CONTACT_DETAILS'), name: "c_details" },
                    { title: this.$t('privatelandlord.INVOICES'), name: "c_invoices" },
                    { title: this.$t('general.POLICIES'), name: "c_policy" }
                ],
                css: {
                    table: {
                        tableClass: 'v-datatable v-table theme--light',
                        loadingClass: 'loading',
                        ascendingIcon: 'glyphicon glyphicon-chevron-up',
                        descendingIcon: 'glyphicon glyphicon-chevron-down',
                        handleIcon: 'glyphicon glyphicon-menu-hamburger',
                    },
                    pagination: {
                        infoClass: 'v-datatable__actions__pagination',
                        wrapperClass: 'v-datatable__actions',
                        activeClass: 'btn-primary',
                        disabledClass: 'disabled',
                        pageClass: 'btn btn-border',
                        linkClass: 'btn btn-border',
                        icons: {
                            first: '',
                            prev: '',
                            next: '',
                            last: '',
                        },
                    }
                },
            }
        },
        computed:{
            ...mapGetters(["selectedLocale"]),
            language_filter_option:function(){
                let that = this;
                let language_option = [];
                let mix_lang = process.env.MIX_LANGUAGE_OPTIONS.split(',');
                _.forEach(mix_lang, function(title, key) {
                    language_option.push({'title': title, 'text': that.tConverted('general.language.'+title)})
                });
                return language_option;
            },
        },
        methods: {
            reinitializeFields(){
                this.$nextTick(()=>{
                    this.$refs.vuetable.fields[1].title = this.$t('general.NAME');
                    this.$refs.vuetable.fields[3].title = this.$t('privatelandlord.PRIVATE_HOUSEOWNER_NUM');
                    this.$refs.vuetable.fields[4].title = this.$t('privatelandlord.CONTACT_DETAILS');
                    this.$refs.vuetable.fields[5].title = this.$t('privatelandlord.INVOICES');
                    this.$refs.vuetable.fields[6].title = this.$t('general.POLICIES');
                    this.$refs.vuetable.normalizeFields();
                });
            },
            changePageHandler(val){
                this.perPage = val;
            },
            privatelandlordFetch(apiUrl,httpOptions){
                return api.get(apiUrl, httpOptions);
            },
            onPaginationData (paginationData) {
                this.$refs.pagination.setPaginationData(paginationData)
            },
            onChangePage (page) {
                this.$refs.vuetable.changePage(page)
            },

            onLoading() {
                this.loading = true;
                if(this.currentPerPage !== this.perPage){
                    this.currentPerPage = this.perPage;
                    this.$refs.vuetable.currentPage = 1;
                }
            },
            onLoaded() {
                this.loading = false;
            },
            transform: function(data) {
                if(data.data.length == 0){
                    this.noDataMessage = this.$i18n.t('general.NO_MORE_ENTRIES');
                }
                let transformed = {}
                let pg_meta = data.meta
                let pg_links = data.links

                transformed.pagination = {
                    total: pg_meta.total,
                    per_page: pg_meta.per_page,
                    current_page: pg_meta.current_page,
                    last_page: pg_meta.last_page,
                    next_page_url: pg_links.next ? pg_links.next : null,
                    prev_page_url: pg_links.prev ? pg_links.prev : null,
                    from: pg_meta.from,
                    to: pg_meta.to,
                }
                transformed.mydata = [];
                transformed.mydata = data.data
                return transformed
            },
        },
        created() {
            this.currentPerPage = this.perPage;
            this.$store.dispatch("setHeaderTitle", 'privatelandlord.PRIVATE_LANDLORDS');
        },
        destroyed(){
            this.$store.dispatch("clearInputItems");
        }
    };
</script>
<style scoped>
    .privatelandlordlist >>> .v-datatable{
        table-layout: fixed;
        min-width: 1100px;
    }
    .privatelandlordlist >>> .list-table-container table.v-table thead th:nth-child(1), .privatelandlordlist >>> .list-table-container table.v-table tbody td:nth-child(1){
        width: 40px;
    }
    .privatelandlordlist >>> .list-table-container table.v-table thead th:nth-child(2), .privatelandlordlist >>> .list-table-container table.v-table tbody td:nth-child(2){
        width: 150px;
    }
    .privatelandlordlist >>> .list-table-container table.v-table thead th:nth-child(3), .privatelandlordlist >>> .list-table-container table.v-table tbody td:nth-child(3){
        width: 40px;
    }
    .privatelandlordlist >>> .list-table-container table.v-table thead th:nth-child(4), .privatelandlordlist >>> .list-table-container table.v-table tbody td:nth-child(4){
        width: 18%;
        padding-left: 25px;
    }
    .privatelandlordlist >>> .list-table-container table.v-table thead th:nth-child(5), .privatelandlordlist >>> .list-table-container table.v-table tbody td:nth-child(5){
        width: 20%;
    }
    .privatelandlordlist >>> .list-table-container table.v-table thead th:nth-child(6), .privatelandlordlist >>> .list-table-container table.v-table tbody td:nth-child(6){
        width: 150px;
    }
    .privatelandlordlist >>> .list-table-container table.v-table thead th:nth-child(7), .privatelandlordlist >>> .list-table-container table.v-table tbody td:nth-child(7){
        width: 200px;
    }
</style>
