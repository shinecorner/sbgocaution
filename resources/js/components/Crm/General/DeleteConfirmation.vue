<template>
    <v-dialog v-model="show_confirm_delete" max-width="500" persistent>
        <v-card class="deleteDialog-card">
            <v-card-title class="deleteDialog-headline">
                <span class="deleteDialog-headerfixed">{{headerText}}</span>
                <v-menu bottom left>
                    <v-btn icon slot="activator" @click.native="toggleConfirm">
                        <v-icon>close</v-icon>
                    </v-btn>
                </v-menu>
            </v-card-title>
            <v-card-text><span class="deleteDialog-headerfixed">{{bodyText}}</span></v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="error" flat="flat" @click="$emit('deleteEntity')">{{ $t('general.YES') }}</v-btn>
                <v-btn color="warning" flat="flat" @click="$emit('closeConfirm')">{{ $t('general.NO') }}</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>
<script>
    export default{
        props: ['show_confirm_delete','headerText','bodyText'],
        data() {
            return {
                
            }
        },        
    }
</script>
