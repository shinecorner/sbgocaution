    <template>
    <v-container search-content>
        <v-form ref="filterForm" @keyup.native.enter="$emit('filterData')" @submit.prevent="$emit('filterData')">
            <v-layout row wrap>
                <v-flex xs12 sm6 md6 lg2 xl2>
                    <keyword-search></keyword-search>
                </v-flex>
                <v-flex xs12 sm6 md4 lg2 xl2>
                    <city></city>
                </v-flex>
                <v-flex xs12 sm6 md4 lg2 xl2>
                    <realestate-agency></realestate-agency>
                </v-flex>
                <v-flex xs12 sm6 md4 lg2 xl2>
                    <status></status>
                </v-flex>
                <v-flex xs12 sm6 md4 lg2 xl2>
                    <policy-count></policy-count>
                </v-flex>
            </v-layout>
        </v-form>
        <v-layout row wrap>
            <v-flex shrink d-inline-block>
                <v-btn type="submit" color="success left" @click.prevent="$emit('filterData')"><v-icon>search</v-icon>{{$t('general.filter.SEARCH')}}</v-btn>
                <v-btn color="success left" @click="resetData">{{$t('general.filter.RESET')}}</v-btn>
            </v-flex>
            <v-flex shrink d-inline-block>
                <v-select class="perpage_selectbox left" v-bind:items="perPageItems"  v-model.number="perPage" menu-props="bottom" ></v-select>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
import globalFunction from "Helpers/helpers";
import {TableFilter} from "Helpers/TableFilter"
import City from "Components/Crm/HouseOwner/City";
import PolicyCount from "Components/Crm/General/PolicyNumber";
import RealestateAgency from "Components/Crm/HouseOwner/RealestateAgency";
import Status from "Components/Crm/HouseOwner/Status";

export default{
    mixins: [globalFunction, TableFilter],
    components: {
        City,
        Status,
        RealestateAgency,
        PolicyCount
    }
}
</script>
