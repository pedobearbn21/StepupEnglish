<template>
    <v-speed-dial
      v-model="fab"
      :top="top"
      :bottom="bottom"
      :right="right"
      :left="left"
      :direction="direction"
      :transition="transition"
    >
      <template v-slot:activator>
        <v-btn
          v-model="fab"
          fab
        >
          <i  class="fas fa-book fa-2x"></i>
        </v-btn>
      </template>
      <v-btn
        fab
        small
      >
        <trans-component></trans-component>
      </v-btn>
    </v-speed-dial>
</template>

<script>
export default {
    data: () => ({
      direction: 'top',
      fab: false,
      fling: false,
      hover: false,
      tabs: null,
      top: false,
      right: true,
      bottom: true,
      left: false,
      transition: 'slide-y-reverse-transition',
    }),
}
</script>

<style>
#create .v-speed-dial {
    position: absolute;
  }

  #create .v-btn--floating {
    position: relative;
  }
</style>
