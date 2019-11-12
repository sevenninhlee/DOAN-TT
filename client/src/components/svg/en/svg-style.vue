<template>
  <keep-alive>
    <component v-bind:is="getComponentStyle"></component>
  </keep-alive>
</template>

<script>
export default {
  name: 'SvgStyle',
  components: {
    SvgSaintdelafield: () => import("./svg-saintdelafield"),
    SvgBadhead: () => import("./svg-badhead"),
    SvgBanthers: () => import("./svg-banthers"),
    SvgConnoisseurs: () => import("./svg-connoisseurs"),
    SvgCutepunk: () => import("./svg-cutepunk"),
    SvgElrotex: () => import("./svg-elrotex"),
    SvgGreatvibes: () => import("./svg-greatvibes"),
    SvgKlsweetpineapple: () => import("./svg-klsweetpineapple"),
    SvgMighttype: () => import("./svg-mighttype"),
    SvgPopsregular: () => import("./svg-popsregular"),
    SvgSomethingwild: () => import("./svg-somethingwild")
  },
  props: [
    'idstyle'
  ],
  computed: {
    getComponentStyle: function () {
      if (this.idstyle == 'idstyle-gb-0')
        return `SvgSaintdelafield`
      else if (this.idstyle == 'idstyle-gb-1')
        return `SvgBadhead`
      else if (this.idstyle == 'idstyle-gb-2')
        return `SvgBanthers`
      else if (this.idstyle == 'idstyle-gb-3')
        return `SvgConnoisseurs`
      else if (this.idstyle == 'idstyle-gb-4')
        return `SvgCutepunk`
      else if (this.idstyle == 'idstyle-gb-5')
        return `SvgElrotex`
      else if (this.idstyle == 'idstyle-gb-6')
        return `SvgGreatvibes`
      else if (this.idstyle == 'idstyle-gb-7')
        return `SvgKlsweetpineapple`
      else if (this.idstyle == 'idstyle-gb-8')
        return `SvgMighttype`
      else if (this.idstyle == 'idstyle-gb-9')
        return `SvgPopsregular`
      else if (this.idstyle == 'idstyle-gb-10')
        return `SvgSomethingwild`
    }
  }
}
</script>

<style lang="scss" scoped>

</style>