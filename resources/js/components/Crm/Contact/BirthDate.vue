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
            :label="$t('general.filter.CREATE_FROM')"                      
            persistent-hint
            prepend-icon="event"
            @input="changeDate"
            v-on="on"
          ></v-text-field>
        </template>
        <v-date-picker v-model="date" no-title @input="is_popup = false"></v-date-picker>
      </v-menu>   
</template>

<script>
export default{
    data() {
        return {
            date: new Date().toISOString().substr(0, 10),
            dateFormatted: this.formatDate(new Date().toISOString().substr(0, 10)),
            is_popup: false,
        }
    },
    computed: {
        computedDateFormatted () {
            return this.formatDate(this.date)
        }
    },
    watch: {
        date (val) {
            this.dateFormatted = this.formatDate(this.date)
        },
    },
    methods:{
        changeDate: function(val){
            if(val.length == 10){
                this.date = this.parseDate(this.dateFormatted);
            }            
        },
        formatDate (date) {
            if (!date) return null

            const [year, month, day] = date.split('-')
            return `${day}.${month}.${year}`
        },
        parseDate (date) {
            if (!date) return null
            console.log(date);
            const [day, month, year] = date.split('.')
            return `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`
        }, 
    }
};
</script>
