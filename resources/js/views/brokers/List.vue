<template>
    <div class="brokerlist">
        <!--<page-title-bar></page-title-bar>-->
        <app-section-loader :status="loading"></app-section-loader>
        <v-container fluid grid-list-xl py-0>
            <v-layout row wrap>
                <app-card
                    :fullBlock="true"
                    colClasses="xl12 lg12 md12 sm12 xs12"
                >
                    <filters @filterData="onFilterData" @resetData="onResetFilter" @changePage="changePageHandler"></filters>
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
                                  api-url="api/brokers"
                                  :http-fetch="brokerFetch"
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
                            <template slot="broker_id" slot-scope="props">
                                <span class="primary-text">{{ props.rowData.real_broker_num }}</span>
                                <span class="grey--text secondary-text fs-12 d-block">{{ props.rowData.created_at }}</span>
                            </template>
                            <template slot="edit" slot-scope="props">
                                <v-tooltip top v-if="props.rowData.id">
                                    <a href="#" slot="activator">
                                        <v-avatar size="26" class="round-badge-success">
                                            <v-icon color="white" small>zmdi zmdi-edit</v-icon>
                                        </v-avatar>
                                    </a>
                                    <span>{{ $t('general.EDIT') }}</span>
                                </v-tooltip>
                            </template>
                            <template slot="company" slot-scope="props">
                                <span class="primary-text">{{ props.rowData.company_name }}</span>
                            </template>
                            <template slot="name" slot-scope="props">
                                <span class="primary-text left ml-1">{{ props.rowData.first_name + ' ' + props.rowData.last_name}}</span>
                            </template>
                            <template slot="address" slot-scope="props">
                                <span class="primary-text" v-if="props.rowData.address">{{ props.rowData.address }}</span>
                                <span class="grey--text fs-12 secondary-text fw-normal d-block">{{ props.rowData.zip }} {{ props.rowData.city }}</span>
                            </template>
                            <template slot="policies" slot-scope="props">
                                <v-chip small color="grey" text-color="white">{{props.rowData.count_policies}}</v-chip>
                            </template>
                            <template slot="website" slot-scope="props">
                                <span class="primary-text"><a :href="props.rowData.website">{{props.rowData.website}}</a></span>
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
    import { Vuetable, VuetablePagination, VuetablePaginationInfo} from 'vuetable-2';
    import globalFunction from "Helpers/helpers";
    import {TableData} from "Helpers/TableData";
    import Filters from "./Filters";
    export default {
        mixins: [globalFunction, TableData],
        components: {
            Vuetable,
            VuetablePagination,
            VuetablePaginationInfo,
            Filters
        },
        data() {
            return {
               fields: [
                    {name: "prettycheck",   title: '', titleClass: "chkbox_column", dataClass: "chkbox_column"},
                    { title: () => this.$i18n.t('broker.ID'), name: "broker_id", titleClass: 'broker_id_title',dataClass: 'broker_id_data' },
                    { title: "", name: "edit", dataClass: 'edit_data', titleClass:'edit_column' },
                    { title: () => this.$i18n.t('general.COMPANY'), name: "company", titleClass: 'company_title',dataClass: 'company_data' },
                    { title: () => this.$i18n.t('general.NAME'), name: "name" },
                    { title: () => this.$i18n.t('general.ADDRESS'), name: "address" },
                    { title: () => this.$i18n.t('general.POLICIES'), name: "policies" },
                    { title: () => this.$i18n.t('broker.WEBSITE'), name: "website" },
                ],
            }
        },
        computed:{
            language_filter_option:function(){
                let that = this;
                let language_option = [];
                let mix_lang = process.env.MIX_LANGUAGE_OPTIONS.split(',');
                _.forEach(mix_lang, function(title, key) {
                    language_option.push({'title': title, 'text': that.tConverted('general.language.'+title)})
                });
                return language_option;
            }
        },
        methods: {
            brokerFetch(apiUrl,httpOptions){
                return api.get(apiUrl, httpOptions);
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
            }
        },
        created() {
            this.$store.dispatch("setHeaderTitle", 'broker.BROKERS');
        }
     };
</script>
<style scoped>
    .brokerlist >>> .v-datatable{
        table-layout: fixed;
        min-width: 1100px;
    }
    .brokerlist >>> .list-table-container table.v-table thead th:nth-child(1), .brokerlist >>> .list-table-container table.v-table tbody td:nth-child(1){
        width: 40px;
    }
    .brokerlist >>> .list-table-container table.v-table thead th:nth-child(2), .brokerlist >>> .list-table-container table.v-table tbody td:nth-child(2){
        width: 120px;
    }
    .brokerlist >>> .list-table-container table.v-table thead th:nth-child(3), .brokerlist >>> .list-table-container table.v-table tbody td:nth-child(3){
        width: 40px;
    }
    .brokerlist >>> .list-table-container table.v-table thead th:nth-child(4), .brokerlist >>> .list-table-container table.v-table tbody td:nth-child(4){
        width: 13%;
        padding-left: 10px;
    }
    .brokerlist >>> .list-table-container table.v-table thead th:nth-child(5), .brokerlist >>> .list-table-container table.v-table tbody td:nth-child(5){
        width: 16%;
    }
    .brokerlist >>> .list-table-container table.v-table thead th:nth-child(6), .brokerlist >>> .list-table-container table.v-table tbody td:nth-child(6){
        width: 17%;
    }
    .brokerlist >>> .list-table-container table.v-table thead th:nth-child(7), .brokerlist >>> .list-table-container table.v-table tbody td:nth-child(7){
        width: 170px;
    }
    .brokerlist >>> .list-table-container table.v-table thead th:nth-child(8), .brokerlist >>> .list-table-container table.v-table tbody td:nth-child(8){
        width: 150px;
        border-right: none;
    }
</style>
