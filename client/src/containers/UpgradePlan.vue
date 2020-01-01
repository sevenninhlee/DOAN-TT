<template>
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
