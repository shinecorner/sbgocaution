<template>
    <v-dialog v-model="dialog" max-width="500" persistent>
        <v-card class="deleteDialog-card">
            <v-card-title class="deleteDialog-headline">
                <span class="deleteDialog-headerfixed">{{$t('template.DELETE_CONFIRM_MSG',{'name': $t(`template.TEMPLATE`)})}}</span>
                <v-menu bottom left>
                    <v-btn icon slot="activator" @click.native="toggleConfirm">
                        <v-icon>close</v-icon>
                    </v-btn>
                </v-menu>
            </v-card-title>
            <v-card-text><span class="deleteDialog-headerfixed">{{$t('template.DELETE_CONFIRM_MSG',{'name': $t(`template.TEMPLATE`)})}}</span></v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="error" flat="flat" @click.native="DeleteTemplate">{{ $t('general.YES') }}</v-btn>
                <v-btn color="warning" flat="flat" @click.native="toggleConfirm">{{ $t('general.NO') }}</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>
<script>
    export default{
        props: ['toggleConfirm'],
        data() {
            return {
                dialog: true,
            }
        },
        methods:{
            DeleteTemplate(){
                Vue.prototype.$eventHub.$emit('deleteTemp');
                this.toggleConfirm();
            }
        }
    }
</script>
