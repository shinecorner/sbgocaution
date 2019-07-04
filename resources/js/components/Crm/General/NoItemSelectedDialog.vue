<template>
<v-dialog v-model="show_no_item_dialog" max-width="500" @keydown.esc="$emit('closeDialog')" class="delDialog" persistent>
    <v-card class="deleteDialog-card">
        <v-card-title class="deleteDialog-headline">
            {{ $t('general.NO_SELECT_ITEM') }}
            <v-menu bottom left>
                <v-btn icon slot="activator" @click="$emit('closeDialog')">
                    <v-icon>close</v-icon>
                </v-btn>
            </v-menu>
        </v-card-title>
        <v-card-text>{{ $t('general.NO_SELECT_ITEM') }}</v-card-text>
    </v-card>
</v-dialog>
</template>
<script>
    export default{
        props: ['show_no_item_dialog']        
    }
</script>
