import { mapGetters } from "vuex";
export const TableFields = {
    data(){        
        return {
            noDataMessage: this.$i18n.t('general.DATA_LOADING'),
            loading: true,
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
    },
    created() {
        this.currentPerPage = this.perPage;        
    },    
    destroyed(){
        this.$store.dispatch("clearInputItems");    
    }
}