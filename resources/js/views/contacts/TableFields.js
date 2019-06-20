export const TableFields = {
    data(){        
        return {
            fields: [ 
                {name: "prettycheck", title: '', titleClass: "chkbox_column", dataClass: "chkbox_column"},
                {title: () => this.$i18n.t('contact.ID'), name: "c_contactformate", titleClass: 'contact_id_title', dataClass: 'contact_id_data'},
                {title: "", name: "c_edit", dataClass: 'edit_data', titleClass: 'edit_column'},
                {title: () => this.$i18n.t('general.NAME'), name: "c_name"},
                {title: () => this.$i18n.t('general.ADDRESS'), name: "c_address"},
                {title: () => this.$i18n.t('contact.TOTAL_INVOICES'), name: "c_invoices"},
                {title: "", name: "c_statusdropdown", dataClass: 'statusdropdown_column', titleClass: 'statusdropdown_column'},
                {title: () => this.$i18n.t('general.STATUS'), name: "c_status", dataClass: 'status_policy_column', titleClass: 'status_policy_column'},
                {title: "", name: "c_userlink", dataClass: 'userid_link'},
                //{ title: "", name: "c_action" },
                {title: "", name: "c_addpolicy", dataClass: 'add_policy_btn'},
            ]
        }
    }    
}