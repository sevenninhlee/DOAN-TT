<template>
  <b-button variant="primary" class="ml-3" >{{$t('layout.button')}}</b-button>
  <!-- v-on:click="upgradePlan()" -->
</template>

<script>
export default {
  name: "UpgradePlan",
  methods: {
    upgradePlan() {
      this.$router.push({ path: "/payment/pricing-plan" });
    }
  }
};
</script>
