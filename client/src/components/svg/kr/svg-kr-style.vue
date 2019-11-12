<template>
  <keep-alive>
    <component v-bind:is="getComponentStyle"></component>
  </keep-alive>
</template>

<script>
export default {
  name: 'SvgKrStyle',
  components: {
    SvgKimnamyun: () => import("./svg-kimnamyun"),
    SvgEunyoung: () => import("./svg-eunyoung"),
    SvgGoyang: () => import("./svg-goyang"),
    SvgFlowerroad: () => import("./svg-flowerroad"),
    SvgInklipquid: () => import("./svg-inklipquid"),
    SvgOtenjoy: () => import("./svg-otenjoy"),
    SvgDovemayo: () => import("./svg-dovemayo"),
    SvgSdmisaeng: () => import("./svg-sdmisaeng"),
    SvgHsgyoul: () => import("./svg-hsgyoul"),
    SvgJeju: () => import("./svg-jeju")
  },
  props: [
    'idstyle'
  ],
  computed: {
    getComponentStyle: function () {
      if (this.idstyle == 'idstyle-kr-0')
        return `SvgKimnamyun`
      else if (this.idstyle == 'idstyle-kr-1')
        return `SvgEunyoung`
      else if (this.idstyle == 'idstyle-kr-2')
        return `SvgGoyang`
      else if (this.idstyle == 'idstyle-kr-3')
        return `SvgFlowerroad`
      else if (this.idstyle == 'idstyle-kr-4')
        return `SvgInklipquid`
      else if (this.idstyle == 'idstyle-kr-5')
        return `SvgOtenjoy`
      else if (this.idstyle == 'idstyle-kr-6')
        return `SvgDovemayo`
      else if (this.idstyle == 'idstyle-kr-7')
        return `SvgSdmisaeng`
      else if (this.idstyle == 'idstyle-kr-8')
        return `SvgHsgyoul`
      else if (this.idstyle == 'idstyle-kr-9')
        return `SvgJeju`
    }
  }
}
</script>

<style lang="scss" scoped>

</style>