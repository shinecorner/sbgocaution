import { mapGetters } from "vuex";
import NoItemSelectedDialog from "Components/Crm/General/NoItemSelectedDialog";
import DeleteConfirmation from "Components/Crm/General/DeleteConfirmation";
export const TableData = {
    components: {NoItemSelectedDialog, DeleteConfirmation},
    data(){        
        return {
            noDataMessage: this.$i18n.t('general.DATA_LOADING'),
            loading: true,
            show_no_item_dialog: false,
            show_confirm_delete: false,
            currentPerPage: '',                        
            perPage: ((this.$store.getters.serverHelpers.hasOwnProperty('configs') && this.$store.getters.serverHelpers.configs['crm.items_per_page'])? parseInt(this.$store.getters.serverHelpers.configs['crm.items_per_page']) : 20),
            moreParams: {},
            paginationComponent: 'vuetable-pagination',
            httpOptions: { headers: { Authorization: 'Bearer '+localStorage.getItem('accessToken') } },
            checkedRows: [],
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
        ...mapGetters(["selectedLocale"])
    },
    watch: {
        selectedLocale: function(){
            this.$refs.vuetable.refresh();            
      }
    },
    methods: {
        changePageHandler(val){
            this.perPage = val;
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
        handleLoadError(payload, description) {
            console.log('payload: ' + payload)
        },    
        transform: function(data) {
            if(data.data.length == 0){
                this.noDataMessage = this.$i18n.t('general.NO_MORE_ENTRIES');
            }
            let transformed = {}
            let pg_meta = data.meta
            let pg_links = data.links
            transformed.pagination = {}
            if(pg_meta && pg_links){
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
                this.recordCount = pg_meta.total;
            }            
            transformed.mydata = [];
            transformed.mydata = data.data
            return transformed
        },
        onFilterData(){ 
            let that = this;
            that.moreParams = {};
            _.forOwn(this.$store.getters.inputItems, function(filter_value, filter_name) { 
                that.moreParams['filters['+filter_name+']'] = filter_value;
            });            
            Vue.nextTick(() => this.$refs.vuetable.refresh());
        },
        onResetFilter(){ 
            this.$store.dispatch("clearInputItems");
            this.moreParams = {};        
            Vue.nextTick(() => this.$refs.vuetable.refresh());
        },
        deleteConfirm(){
            this.show_confirm_delete = true;
        },
        toggleDialog(){
            if(this.checkedRows.length >0) {
                this.show_confirm_delete = true;
            }else {
                this.show_no_item_dialog = true;
            }
        },
    },
    created() {
        this.currentPerPage = this.perPage;        
    },    
    destroyed(){
        this.$store.dispatch("clearInputItems");    
    }
}