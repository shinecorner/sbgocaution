<template>
<div>
    <v-tooltip top v-for="(invoice_detail,invoice_status, invoice_index) in invoice_count_detail" v-bind:key="invoice_index"> 
        <v-chip slot="activator" small :class="'label-status-' + invoice_detail.class" text-color="white">{{invoice_detail.count}}</v-chip>
        <span>{{$t('general.INVOICES')}}:&nbsp;{{tConverted('invoice.status.'+invoice_status)}}</span>
    </v-tooltip>
</div>
</template>
<script>
import globalFunction from "Helpers/helpers";
export default{
    mixins: [globalFunction],
    props: {               
        invoice_count_detail: {
            type: Object        
        },
    }    
};
</script>
