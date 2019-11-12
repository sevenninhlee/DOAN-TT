<template>
  <div class="contain-svg m-auto">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
      id="childSignSvg" 
      ref="childSignSvg"
      :class="`svg-${paramsData.lang}-${paramsData.idData}`"
      :viewBox="paramsData.type == 'Signature' ? '0 0 812 412' : '0 0 412 412'"
    >
      <title>Signature Name</title>
      <desc>Created with Vue Js.</desc>
      
      <defs></defs>

      <!-- <g v-if="paramsData.lang == 'gb'">
        <svg-style :idstyle="`idstyle-${paramsData.lang}-${paramsData.idData}`" />
      </g>
      <g v-else-if="paramsData.lang == 'kr'">
        <svg-kr-style :idstyle="`idstyle-${paramsData.lang}-${paramsData.idData}`" />
      </g>
      <g v-else>
        <svg-jp-style :idstyle="`idstyle-${paramsData.lang}-${paramsData.idData}`" />
      </g> -->

      <g>
        <text id="svgText" ref="svgText" :x="getXY.setX" :y="getXY.setY" :font-size="getFontSize" dominant-baseline="middle" text-anchor="middle">{{ paramsData.text }}</text>
      </g>
    </svg>
  </div>
</template>

<script>
export default {
  name: "GenerateSvg",
  components: {
    // SvgStyle: () => import('../svg/en/svg-style'),
    // SvgKrStyle: () => import('../svg/kr/svg-kr-style'),
    // SvgJpStyle: () => import('../svg/jp/svg-jp-style')
  },
  props: {
    paramsData: Object
  },
  data() {
    return {
      fonts: {
        family: {
          English: ["Mrs Saint Delafield", "Badhead Typeface", "Banthers", "Connoisseurs", "Cutepunk_Regular", "Elrotex Basic", "GreatVibes-Regular", "KLSweetPineappleRegular", "Mightype Script", "pops_08_REGULAR", "somethingwild-Regular"],
          Korean: ["KimNamyun", "KCC-eunyoung", "Goyang", "SangSangFlowerRoad", "InkLipquid", "OTEnjoystoriesBA", "Dovemayo-Medium", "SDMiSaeng", "HSGyoulnoonkot", "Jeju Hallasan"],
          Japanese: ["AsobiMemogaki-Regular-1-01", "crayon_1-1", "RiiPopkkR", "RiiT_F", "sjis_sp_setofont", "GenEiLateGoN_v2", "GenEiAntiquePv5-M"]
        },
        size: {
          // English
          English: [150, 180, 140, 220, 240, 100, 160, 240, 140, 110, 250],
          // Korean
          Korean: [120, 150, 100, 150, 140, 140, 80, 150, 80, 90],
          // Japanese
          Japanese: [130, 120, 80, 85, 85, 85, 85]
        }
      }
    }
  },
  computed: {
    getXY: function () {
      let setX = 206,
          setY = 221
      if (this.paramsData.type == 'Signature') {
        setX = 406
        return { setX, setY }
      }

      return { setX, setY }
    },
    getFontSize: function () {
      let vm = this,
          fonts = vm.fonts,
          fsize = vm.paramsData.lang == 'gb' ? fonts.size.English[vm.paramsData.idData] : 
                  vm.paramsData.lang == 'kr' ? fonts.size.Korean[vm.paramsData.idData] : 
                                                  fonts.size.Japanese[vm.paramsData.idData]

      if (vm.paramsData.type != 'Signature') return (fsize - (fsize * 20/100)) // get 80% font size
      
      return fsize
    }
  }
}
</script>

<style lang="scss" scoped>
#childSignSvg {
  width: 100%;
  height: auto;
  max-height: 100px;
}

/** English */
.svg-gb-0 {
  font-family: 'Mrs Saint Delafield', 'mrs_saint_delafieldregular';
}
.svg-gb-1 {
  font-family: 'Badhead Typeface', 'badhead_typefaceregular';
}
.svg-gb-2 {
  font-family: 'Banthers', 'banthersregular';
}
.svg-gb-3 {
  font-family: 'Connoisseurs', 'connoisseursregular';
}
.svg-gb-4 {
  font-family: 'Cutepunk_Regular', 'cutepunkregular';
}
.svg-gb-5 {
  font-family: 'Elrotex Basic', 'elrotex_basicregular';
}
.svg-gb-6 {
  font-family: 'GreatVibes-Regular', 'great_vibesregular';
}
.svg-gb-7 {
  font-family: 'KLSweetPineappleRegular', 'klsweetpineapplethinthin';
}
.svg-gb-8 {
  font-family: 'Mightype Script', 'mightype_scriptregular';
}
.svg-gb-9 {
  font-family: 'pops_08_REGULAR', 'popsregular';
}
.svg-gb-10 {
  font-family: 'somethingwild-Regular', 'something_wildregular';
}

/** Korean */
.svg-kr-0 {
  font-family: 'KimNamyun', 'Kim Namyun';
}
.svg-kr-1 {
  font-family: 'KCC-eunyoung', 'KCC-eunyoung-Regular00';
}
.svg-kr-2 {
  font-family: 'Goyang', 'GoyangA1';
}
.svg-kr-3 {
  font-family: 'SangSangFlowerRoad', 'SangSangFlowerRoad';
}
.svg-kr-4 {
  font-family: 'InkLipquid', 'THEFACESHOPA1';
}
.svg-kr-5 {
  font-family: 'OTEnjoystoriesBA', 'OTEnjoystoriesBA';
}
.svg-kr-6 {
  font-family: 'Dovemayo-Medium', 'Dovemayo-Medium';
}
.svg-kr-7 {
  font-family: 'SDMiSaeng', 'Sandoll MiSaeng';
}
.svg-kr-8 {
  font-family: 'HSGyoulnoonkot', 'HSGyoulnoonkot';
}
.svg-kr-9 {
  font-family: 'Jeju Hallasan', 'JejuHallasan';
}

/** Japanese */
.svg-jp-0 {
  font-family: 'AsobiMemogaki-Regular-1-01', 'asobimemogakiregular';
}
.svg-jp-1 {
  font-family: 'crayon_1-1', 'nagurigaki_crayonregular';
}
.svg-jp-2 {
  font-family: 'RiiPopkkR', 'riipopkakuregular';
}
.svg-jp-3 {
  font-family: 'RiiT_F', 'riitegakifuderegular';
}
.svg-jp-4 {
  font-family: 'sjis_sp_setofont', 'setofontsp_sjisregular';
}
.svg-jp-5 {
  font-family: 'GenEiLateGoN_v2';
}
.svg-jp-6 {
  font-family: 'GenEiAntiquePv5-M';
}
</style>