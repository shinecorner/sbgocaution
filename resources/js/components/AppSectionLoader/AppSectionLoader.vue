<template>	
        <v-dialog v-model="status" fullscreen full-width>
        <v-container fluid fill-height style="background-color: rgba(255, 255, 255, 0.5);">
          <v-layout justify-center align-center>
            <v-progress-circular
              indeterminate
              :size="70"
              color="primary">
            </v-progress-circular>
          </v-layout>
        </v-container>
      </v-dialog>
</template>

<script>
export default {
  props: ["status"]
};
</script>
