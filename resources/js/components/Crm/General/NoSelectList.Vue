<template>
<v-dialog v-model="dialog" max-width="500" class="delDialog" persistent>
    <v-card>
        <v-card-title class="headline">
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
<style scoped>
    .headline {
        font-size: 17px !important;
        font-weight: bolder;
        background-color: #8dbf43;
        color: white;
        justify-content: space-between;
        height: 60px;
        align-content: center;
    }
    .v-card {
        border-radius: 7px;
    }
    .delDialog {
        position: absolute;
        top: 190px;
    }
</style>
