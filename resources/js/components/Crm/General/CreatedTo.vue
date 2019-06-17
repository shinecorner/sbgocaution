<template>
    <v-menu
        ref="is_popup"
        v-model="is_popup"
        :close-on-content-click="false"                  
        lazy
        transition="scale-transition"
        offset-y
        full-width
        max-width="290px"
        min-width="290px"
      >
        <template v-slot:activator="{ on }">
          <v-text-field
            v-model="dateFormatted"
            :label="$t('general.filter.CREATE_TO')"                      
            persistent-hint
            prepend-icon="event"
            @input="changeDate"
            @focus="is_popup = true"
            v-on="on"
          ></v-text-field>
        </template>
        <v-date-picker :locale="selectedLocale" v-model="date" no-title @input="is_popup = false"></v-date-picker>
      </v-menu>   
</template>

<script>
import moment from 'moment'
import { mapGetters } from "vuex";
export default{
    props: {
        is_reset_form: {
            type: Boolean,
            default: false
        },
    },
    data() {
        return {
            date: "",
            dateFormatted: "",
            is_popup: false,
        }
    },
    computed: {
        ...mapGetters(["selectedLocale"]),
        computedDateFormatted () {
            return this.formatDate(this.date)
        }
    },
    watch: {
        date (val) {
            this.dateFormatted = this.formatDate(this.date);
            this.$store.dispatch("addInputItem", {fieldname: 'created_to', fieldvalue: this.dateFormatted});
        }, 
        is_reset_form(val){
            if(val === true){
                this.dateFormatted = "";
                this.date = "";
            }
        }
    },
    methods:{
        changeDate: function(val){            
            this.$store.dispatch("deleteInputItem", {fieldname: 'created_to'});
            if((typeof val !== "undefined") && (val.length == 10)){
                if(moment(val,"DD.MM.YYYY").isValid()){
                    this.date = this.parseDate(val);
                    this.$store.dispatch("addInputItem", {fieldname: 'created_to', fieldvalue: val});
                }                
            }            
        },
        formatDate (date) {
            if (!date) return null

            const [year, month, day] = date.split('-')
            return `${day}.${month}.${year}`
        },
        parseDate (date) {
            if (!date) return null            
            const [day, month, year] = date.split('.')
            return `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`
        }, 
    }
};
</script>
