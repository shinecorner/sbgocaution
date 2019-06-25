import KeywordSearch from "Components/Crm/General/KeywordSearch";
export const FilterMixins =  {
    components: {
        KeywordSearch
    },
    data() {
        return {   
            isResetForm: false,
            perPageItems: process.env.MIX_PER_PAGE_OPTIONS.split(',').map(Number),
            perPage: ((this.$store.getters.serverHelpers.hasOwnProperty('configs') && this.$store.getters.serverHelpers.configs['crm.items_per_page'])? parseInt(this.$store.getters.serverHelpers.configs['crm.items_per_page']) : 20),            
        }
    },
    watch:{        
        perPage: function(newVal, oldVal){
            this.changePerPageOption(newVal);
        }
    },
    methods: {
        changePerPageOption: function(val){
            this.$emit('changePage', val);
        },
        resetData: function(event){  
            this.$store.dispatch("clearInputItems");
            this.$refs.filterForm.reset();
            this.isResetForm = true;            
            this.$emit('resetData');
        }
    }
}