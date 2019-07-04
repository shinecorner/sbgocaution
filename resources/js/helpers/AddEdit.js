import DeleteConfirmation from "Components/Crm/General/DeleteConfirmation";
export const AddEdit =  {
    props: [],
    components: {DeleteConfirmation},
    data() {
        return {   
            loading: false,
            show_confirm_delete: false,
        }
    },
    watch:{        

    },
    methods: {
        deleteConfirm(){
                this.show_confirm_delete = true;
        },
    }
}