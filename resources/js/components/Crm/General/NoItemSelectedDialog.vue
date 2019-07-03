<template>
<v-dialog v-model="dialog" max-width="500" class="delDialog" persistent>
    <v-card class="deleteDialog-card">
        <v-card-title class="deleteDialog-headline">
            {{ $t('general.NO_SELECT_ITEM') }}
            <v-menu bottom left>
                <v-btn icon slot="activator" @click.native="toggle">
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
        props: ['toggle'],
        data() {
            return {
                dialog: true,
            }
        }
    }
</script>
