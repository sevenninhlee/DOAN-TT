<template>
  <keep-alive>
    <component v-bind:is="getComponentStyle"></component>
  </keep-alive>
</template>

<script>
export default {
  name: 'SvgJpStyle',
  components: {
    SvgAsobi: () => import("./svg-asobi"),
    SvgCrayon: () => import("./svg-crayon"),
    SvgRiipop: () => import("./svg-riipop"),
    SvgRiit: () => import("./svg-riit"),
    SvgSjitsp: () => import("./svg-sjitsp"),
    SvgGeneilate: () => import("./svg-geneilate"),
    SvgGeneiantique: () => import("./svg-geneiantique")
  },
  props: [
    'idstyle'
  ],
  computed: {
    getComponentStyle: function () {
      if (this.idstyle == 'idstyle-jp-0')
        return `SvgAsobi`
      else if (this.idstyle == 'idstyle-jp-1')
        return `SvgCrayon`
      else if (this.idstyle == 'idstyle-jp-2')
        return `SvgRiipop`
      else if (this.idstyle == 'idstyle-jp-3')
        return `SvgRiit`
      else if (this.idstyle == 'idstyle-jp-4')
        return `SvgSjitsp`
      else if (this.idstyle == 'idstyle-jp-5')
        return `SvgGeneilate`
      else if (this.idstyle == 'idstyle-jp-6')
        return `SvgGeneiantique`
    }
  }
}
</script>

<style lang="scss" scoped>

</style>