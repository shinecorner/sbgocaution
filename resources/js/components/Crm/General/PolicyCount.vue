<template>
<div>
        <v-tooltip top v-if="total_policy !== 0" class="total-policies">
            <v-chip slot="activator" small class="label-status-default" text-color="white">{{total_policy}}</v-chip>
            <span>{{$t('policy.POLICY_TOTAL')}}</span>
        </v-tooltip>
        <v-tooltip top v-for="(policy_detail,policy_status, policy_index) in policy_count_detail" v-bind:key="policy_index">
             <v-chip slot="activator" small :class="'label-status-' + policy_detail.class" text-color="white">{{policy_detail.count}}</v-chip>
            <span>{{$t('general.POLICIES')}}:&nbsp;{{tConverted('policy.status.'+policy_status)}}</span>
       </v-tooltip>
</div>
</template>
<script>
import globalFunction from "Helpers/helpers";
export default{
    mixins: [globalFunction],
    props: {
        total_policy: {
            type: Number,
            default: 0,
            required: false
        },
        policy_count_detail: {
            type: Object
        },
    }
};
</script>

<style scoped>

.total-policies {
    margin-right: -3px;
}
</style>
