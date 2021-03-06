<template>
    <div class="templatelist">
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
                                  api-url="api/templates"
                                  :http-fetch="templateFetch"
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
                            <template slot="template_key" slot-scope="props">
                                <span class="primary-text left ml-1">{{ props.rowData.template_key}}</span><br/>
                            </template>
                            <template slot="edit" slot-scope="props">
                                <v-tooltip top v-if="props.rowData.id">
                                    <a v-on:click="editRedirect(props.rowData.id)" slot="activator">
                                        <v-avatar size="26" class="round-badge-success">
                                            <v-icon color="white" small>zmdi zmdi-edit</v-icon>
                                        </v-avatar>
                                    </a>
                                    <span>{{ $t('general.EDIT') }}</span>
                                </v-tooltip>
                            </template>
                            <template slot="name" slot-scope="props">
                                <span class="primary-text" v-if="props.rowData.name">{{ props.rowData.name }}</span>
                            </template>
                            <template slot="section" slot-scope="props">
                                <span class="primary-text">{{ props.rowData.section }}</span>
                            </template>
                            <template slot="status" slot-scope="props">
                                <template v-if="props.rowData.status == 1">
                                    <v-tooltip top>
                                        <font-awesome-icon :icon="['fas','check-circle']" class="published" slot="activator"/>
                                        <span>{{$t('general.PUBLISHED')}}</span>
                                    </v-tooltip>
                                </template>
                                <template v-else>
                                    <v-tooltip top>
                                        <font-awesome-icon :icon="['fas','times-circle']" class="unpublished" slot="activator"/>
                                        <span>{{$t('general.UNPUBLISHED')}}</span>
                                    </v-tooltip>
                                </template>
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
        <delete-confirmation
            :show_confirm_delete="show_confirm_delete"
            :headerText="$t('general.DELETE_CONFIRM_MSG',{'name': $t('role.ROLES')})"
            :bodyText="$t('general.DELETE_CONFIRM_MSG',{'name': $t('role.ROLES')})"
            @deleteEntity="deleteEntityHandler"
            @closeConfirm="show_confirm_delete = false"
        >
        </delete-confirmation>
        <no-item-selected-dialog
            :show_no_item_dialog="show_no_item_dialog"
            @closeDialog="show_no_item_dialog = false">
        </no-item-selected-dialog>
        <!--<delete-dialog v-if="deleteDialog" :toggle="deleteToggle"></delete-dialog>-->
    </div>
</template>

<script>
    import api from "Api";
    import { Vuetable, VuetablePagination, VuetablePaginationInfo, VuetablePaginationDropdown} from 'vuetable-2';
    import globalFunction from "Helpers/helpers";
    import {TableData} from "Helpers/TableData";
    import Filters from "./Filters";
    import {AddEdit} from "Helpers/AddEdit";

    export default {
        mixins: [globalFunction, TableData, AddEdit],
        components: {
            // NoItemSelectedDialog,
            Vuetable,
            VuetablePagination,
            VuetablePaginationInfo,
            Filters,
            // DeleteDialog
        },
        data() {
            return {
                fields: [
                    {name: "prettycheck", title: '', titleClass: "chkbox_column", dataClass: "chkbox_column"},
                    {title: () => this.$i18n.t('template.TEMPLATE_KEY'), name: "template_key"},
                    {title: "", name: "edit", dataClass: 'edit_data', titleClass: 'edit_column'},
                    {title: () => this.$i18n.t('general.NAME'), name: "name"},
                    {title: () => this.$i18n.t('template.SECTION'), name: "section"},
                    {title: () => this.$i18n.t('general.STATUS'), name: "status"}
                ],
                deleteDialog: false,
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
            templateFetch(apiUrl,httpOptions){
               return api.get(apiUrl, httpOptions);
            },
            editRedirect(template_id) {
                this.$router.push({name:'template_edit', params: { template_id: template_id }})
            },
            deleteEntityHandler(){
                // let that = this;
                // that.loading = true;
                // api.delete('/api/templates/'+this.$route.params.template_id).then(response => {
                //     Vue.prototype.$eventHub.$emit('fireSuccess', response.data.message);
                //     that.show_confirm_delete = false;
                //     that.loading = false;
                //     that.$router.push('/templates');
                // })
            },
        },
        created() {
           this.$store.dispatch("setHeaderTitle", 'template.TEMPLATES');
           Vue.prototype.$eventHub.$on('toggleDialogTemplate', this.toggleDialog);
        }
    };
</script>
<style scoped>
    .templatelist >>> .v-datatable{
        table-layout: fixed;
        min-width: 1100px;
    }
    .templatelist >>> .list-table-container table.v-table thead th:nth-child(1), .templatelist >>> .list-table-container table.v-table tbody td:nth-child(1){
        width: 40px;
    }
    .templatelist >>> .list-table-container table.v-table thead th:nth-child(2), .templatelist >>> .list-table-container table.v-table tbody td:nth-child(2){
        width: 220px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .templatelist >>> .list-table-container table.v-table thead th:nth-child(3), .templatelist >>> .list-table-container table.v-table tbody td:nth-child(3){
        width: 40px;
    }
    .templatelist >>> .list-table-container table.v-table thead th:nth-child(4), .templatelist >>> .list-table-container table.v-table tbody td:nth-child(4){
        width: 22%;
        padding-left: 25px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .templatelist >>> .list-table-container table.v-table thead th:nth-child(5), .templatelist >>> .list-table-container table.v-table tbody td:nth-child(5){
        width: 350px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .templatelist >>> .list-table-container table.v-table thead th:nth-child(6), .templatelist >>> .list-table-container table.v-table tbody td:nth-child(6){
        width: 150px;
    }
    .published {
        font-size: 24px;
        color: green;
    }
    .unpublished {
        font-size: 24px;
        color: red;
    }
   </style>
