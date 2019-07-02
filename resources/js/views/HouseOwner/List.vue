<template>
    <div class="houseownerlist">
        <!--<page-title-bar></page-title-bar>-->
        <app-section-loader :status="loading"></app-section-loader>
        <v-container fluid grid-list-xl py-0>
            <v-layout row wrap>
                <app-card
                    :fullBlock="true"
                    colClasses="xl12 lg12 md12 sm12 xs12"
                >
                    <!--<filters @filterData="onFilterData" @resetData="onResetFilter" @changePage="changePageHandler"></filters>-->
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
                                  api-url="api/houseowners"
                                  :http-fetch="houseownerlistFetch"
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
                            <template slot="name" slot-scope="props">
                                <span class="primary-text" v-if="props.rowData.name">{{ props.rowData.name }}</span>
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
                            <template slot="address" slot-scope="props">
                                <span class="primary-text" v-if="props.rowData.address">{{ props.rowData.address }}</span>
                            </template>
                            <template slot="city" slot-scope="props">
                                <span class="primary-text" v-if="props.rowData.city">{{ props.rowData.city }}</span>
                            </template>
                            <template slot="cip" slot-scope="props">
                                <span class="primary-text" v-if="props.rowData.city">{{ props.rowData.zip }}</span>
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
    import { Vuetable, VuetablePagination, VuetablePaginationInfo, VuetablePaginationDropdown} from 'vuetable-2';
    import globalFunction from "Helpers/helpers";
    import {TableData} from "Helpers/TableData";

    export default {
        mixins: [globalFunction, TableData],
        components: {
            Vuetable,
            VuetablePagination,
            VuetablePaginationInfo,
        },
        data() {
            return {
                fields: [
                    {name: "prettycheck",   title: '', titleClass: "chkbox_column", dataClass: "chkbox_column"},
                    { title: () => this.$i18n.t('general.NAME'), name: "name" },
                    { title: "", name: "edit", dataClass: 'edit_data', titleClass:'edit_column' },
                    { title: () => this.$i18n.t('general.STATUS'), name: "status"},
                    { title: () => this.$i18n.t('general.ADDRESS'), name: "address" },
                    { title: () => this.$i18n.t('houseowner.CITY'), name: "city" },
                    { title: () => this.$i18n.t('general.CIP'), name: "cip" }
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
            },
        },
        methods: {
            houseownerlistFetch(apiUrl,httpOptions){
                return api.get(apiUrl, httpOptions);
            }
        },
        created() {
            this.$store.dispatch("setHeaderTitle", 'houseowner.HOUSEOWNERS');
        }
    };
</script>
<style scoped>
    .houseownerlist >>> .v-datatable{
        table-layout: fixed;
        min-width: 1100px;
    }
    .houseownerlist >>> .list-table-container table.v-table thead th:nth-child(1), .houseownerlist >>> .list-table-container table.v-table tbody td:nth-child(1){
        width: 40px;
    }
    .houseownerlist >>> .list-table-container table.v-table thead th:nth-child(2), .houseownerlist >>> .list-table-container table.v-table tbody td:nth-child(2){
        width: 150px;
    }
    .houseownerlist >>> .list-table-container table.v-table thead th:nth-child(3), .houseownerlist >>> .list-table-container table.v-table tbody td:nth-child(3){
        width: 40px;
    }
    .houseownerlist >>> .list-table-container table.v-table thead th:nth-child(4), .houseownerlist >>> .list-table-container table.v-table tbody td:nth-child(4){
        width: 18%;
        padding-left: 25px;
    }
    .houseownerlist >>> .list-table-container table.v-table thead th:nth-child(5), .houseownerlist >>> .list-table-container table.v-table tbody td:nth-child(5){
        width: 20%;
    }
    .houseownerlist >>> .list-table-container table.v-table thead th:nth-child(6), .houseownerlist >>> .list-table-container table.v-table tbody td:nth-child(6){
        width: 150px;
    }
    .houseownerlist >>> .list-table-container table.v-table thead th:nth-child(7), .houseownerlist >>> .list-table-container table.v-table tbody td:nth-child(7){
        width: 200px;
    }
</style>
