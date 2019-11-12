<template>
  <div class="contain-svg m-auto">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
      id="childStampSvg" 
      ref="childStampSvg"
      :class="`svg-${paramsData.lang}-${paramsData.idData}`"
      :viewBox="paramsData.lang == 'gb' ? '0 0 562 412' : '0 0 562 562'"
    >
      <title>Personnel Seal</title>
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

      <g v-if="paramsData.lang == 'gb'">
        <text id="svgText" ref="svgText" x="281" y="206" dominant-baseline="middle" text-anchor="middle" font-size="100">{{paramsData.text}}</text>
      </g>
      <g v-else>
        <svg v-if="paramsData.type=='Personnel'">

          <ellipse cx="281" cy="281" :rx="getEllipseXY.rwidth" :ry="getEllipseXY.rheight" fill="none" stroke-width="10" stroke="#ff0000" mask="url(#image-mask)" />

          <text id="svgText" ref="svgText" x="281" y="281" font-size="120" fill="#ff0000" alignment-baseline="middle" text-anchor="middle" v-html="getDisplayText"></text>

        </svg>
        <svg v-else viewBox="0 0 462 462">

          <defs>
            <path id="circleTextPath"
                  d="M210,340
                    a130,130 0 0,1 0,-270
                    a130,130 0 0,1 0,270Z"
                  transform="rotate(160,200,200)"/>
          </defs>
    
          <g transform="translate(0, 690) scale(0.1,-0.1)" fill="red" stroke="none">
            <!-- Start Default -->
              <!-- Outer Circle -->
              <path d="M2000 6700 c-204 -29 -460 -109 -635 -197 -382 -192 -727 -535 -920
                -917 -91 -179 -170 -436 -199 -648 -21 -147 -21 -417 0 -564 29 -212 108 -469
                199 -648 192 -379 536 -723 915 -915 179 -91 436 -170 648 -199 147 -21 417
                -21 564 0 212 29 469 108 648 199 379 192 723 536 915 915 91 179 170 436 199
                648 21 147 21 417 0 564 -29 212 -108 469 -199 648 -192 379 -536 723 -915
                915 -179 91 -436 170 -648 199 -139 20 -438 20 -572 0z m480 -94 c362 -38 700
                -171 993 -392 105 -79 296 -270 375 -375 534 -709 534 -1657 0 -2366 -79 -105
                -270 -296 -375 -375 -709 -534 -1657 -534 -2366 0 -105 79 -296 270 -375 375
                -534 709 -534 1657 0 2366 79 105 270 296 375 375 398 300 894 442 1373 392z"/>
              <!-- Inner & Text Inside -->  
              <path d="M2175 5800 c-452 -50 -819 -335 -978 -756 -91 -240 -91 -568 0 -808
                121 -321 370 -570 691 -691 240 -91 568 -91 808 0 321 121 570 370 691 691 91
                240 91 568 0 808 -121 321 -370 570 -691 691 -142 53 -371 82 -521 65z m271 
                -95 c55 -8 143 -30 197 -48 105 -37 254 -116 241 -129 -15 -15 -226 -30 -322
                -23 -164 12 -159 13 -177 -16 -10 -16 -13 -36 -9 -52 8 -33 80 -90 116 -91 18
                -1 25 -5 19 -10 -5 -6 -9 -25 -9 -44 0 -25 5 -35 20 -39 19 -5 24 -18 43 -102
                6 -24 5 -24 -56 -18 -34 4 -72 9 -84 13 -28 8 -63 -27 -63 -64 0 -44 91 -119
                130 -109 17 4 20 0 20 -34 0 -38 -1 -39 -33 -39 -19 0 -56 7 -83 15 -69 21
                -100 19 -118 -7 -9 -12 -16 -31 -16 -41 0 -25 101 -124 135 -133 17 -4 59 2
                113 17 79 22 107 24 292 24 177 0 211 -3 252 -19 56 -22 128 -18 158 9 44 40
                32 133 -20 160 -37 19 -74 19 -136 0 -27 -8 -52 -15 -56 -15 -5 0 -8 23 -8 51
                l0 50 55 -6 55 -7 16 37 c21 52 16 65 -41 103 -49 33 -81 38 -127 18 -14 -7
                -13 2 7 61 44 122 33 142 -86 164 -80 15 -95 10 -104 -32 -6 -26 -3 -36 13
                -50 22 -18 26 -35 24 -116 l-2 -53 -48 0 -48 0 4 89 c5 104 6 103 -104 122
                l-69 12 33 14 c46 19 225 36 302 29 36 -4 99 -11 140 -18 l76 -11 49 -63 c117
                -149 191 -322 221 -517 44 -283 -46 -602 -232 -825 l-44 -54 0 122 0 121 22
                -15 c12 -9 42 -16 65 -16 60 0 83 25 83 89 0 42 -4 53 -26 70 -32 25 -74 27
                -115 5 l-31 -15 4 149 c3 136 1 152 -16 171 -24 26 -111 59 -180 67 -48 6 -55
                4 -65 -14 -22 -41 -13 -70 28 -96 23 -15 43 -38 50 -57 7 -21 11 -149 11 -381
                l0 -348 -57 -37 c-188 -120 -448 -180 -668 -154 -120 14 -244 47 -342 91 -69
                32 -204 119 -263 170 -34 30 -34 31 -7 21 16 -6 58 -11 95 -11 121 0 212 64
                248 173 24 72 16 243 -15 312 -26 60 -74 112 -118 131 -20 9 -33 22 -33 32 0
                10 -7 28 -16 40 -12 18 -25 22 -67 22 -68 -1 -122 -26 -175 -84 -76 -82 -109
                -196 -99 -344 l5 -86 -24 39 c-98 158 -164 385 -164 565 0 160 60 384 141 525
                42 74 44 76 50 49 4 -16 7 -70 8 -119 1 -73 -3 -98 -19 -127 -23 -44 -18 -67
                28 -116 35 -37 49 -39 157 -13 86 21 157 50 218 88 l37 23 0 -37 c0 -56 19
                -112 45 -139 20 -20 35 -24 80 -24 31 0 71 7 90 14 l35 15 0 -29 c0 -16 4 -40
                10 -54 8 -23 15 -26 54 -26 33 0 52 6 73 24 l28 24 5 399 c6 443 7 439 -58
                472 -47 24 -153 47 -176 38 -20 -8 -39 -53 -31 -77 3 -10 19 -23 36 -30 51
                -21 59 -43 59 -157 l0 -103 -40 0 -40 0 0 114 0 114 -30 25 c-30 26 -95 51
                -164 63 l-39 7 46 24 c75 37 220 83 315 97 117 19 198 19 316 1z m-704 -154
                c-19 -37 -11 -60 30 -86 21 -13 44 -33 50 -44 6 -12 10 -94 10 -200 l0 -180
                -67 -21 c-37 -11 -93 -23 -124 -27 l-56 -6 -6 69 c-11 114 -8 232 5 240 7 5
                46 9 87 9 82 2 101 14 101 66 0 43 -90 96 -149 87 -17 -2 -28 -1 -25 4 6 9
                144 108 151 108 2 0 -1 -9 -7 -19z m340 -560 c0 -117 -2 -140 -16 -145 -24 -9
                -31 -8 -48 10 -13 12 -16 41 -16 145 l0 129 40 0 40 0 0 -139z m736 -13 c-3
                -29 -6 -61 -6 -70 0 -15 -9 -18 -59 -18 l-58 0 -7 46 c-11 85 -12 83 52 87 31
                2 63 4 71 5 11 2 12 -9 7 -50z m-1102 -603 c34 -37 51 -108 50 -215 0 -74 -5
                -105 -21 -141 -38 -85 -114 -87 -157 -4 -17 33 -21 59 -21 145 0 113 13 172
                46 214 27 34 72 35 103 1z m252 283 c-22 -42 -14 -70 29 -97 23 -14 45 -37 50 
                -51 6 -15 10 -184 10 -398 0 -276 3 -375 12 -384 7 -7 31 -12 55 -12 33 0 50 
                6 72 28 l30 27 3 407 c3 385 2 407 -16 427 -24 26 -111 59 -180 67 -48 6 -55
                4 -65 -14z m452 -130 c-19 -35 -14 -80 10 -87 32 -10 40 -47 29 -128 -21 -146
                -79 -285 -164 -389 -25 -31 -46 -62 -46 -68 0 -36 75 -9 168 63 53 40 136 137
                165 192 l16 30 20 -46 c11 -25 27 -86 35 -134 16 -102 34 -125 95 -125 75 0
                104 55 82 156 -15 66 -80 158 -146 205 -36 26 -45 38 -40 54 3 11 11 60 18
                109 l11 88 -26 23 c-31 26 -119 62 -177 71 -33 5 -41 3 -50 -14z m-180 1850 
                c-70 -35 -102 -88 -102 -168 0 -73 27 -127 82 -163 35 -24 52 -28 108 -28 56 
                0 73 4 108 28 82 54 109 175 57 263 -29 49 -107 94 -165 94 -20 0 -60 -12 -88 -26z"/>
            <!-- End Default -->
          </g>
    
    
          <svg x="40" y="25">
            <text id="circleText" font-size="65px" fill="#ff0000">
              <textPath 
                href="#circleTextPath" 
                aria-label="Company's Name" 
                textLength="942" 
                v-html="getDisplayText"></textPath>
            </text>
          </svg>

        </svg>
      </g>
    </svg>
  </div>
</template>

<script>
export default {
  name: 'GenerateStampSvg',
  components: {
    // SvgStyle: () => import('../svg/en/svg-style'),
    // SvgKrStyle: () => import('../svg/kr/svg-kr-style'),
    // SvgJpStyle: () => import('../svg/jp/svg-jp-style')
  },
  props: {
    paramsData: Object
  },
  computed: {
    getChars: function() {
      return this.paramsData.text.length
    },
    getEllipseXY: function () {
      let rwidth = 100, rheight = 100,
          text = this.paramsData.text.replace(' ', '')
      if (text.length == 1)
        rheight = 100
      else if (text.length == 2)
        rheight = 150
      else if (text.length == 3)
        rheight = 200
      else if (text.length == 4)
        rwidth = 150, rheight = 150
      else if (text.length <= 6)
        rwidth = 200, rheight = 200
      else if (text.length <= 8)
        rwidth = 240, rheight = 240
      else
        rwidth = 270, rheight = 270

      return {
        rwidth,
        rheight
      }
    },
    getDisplayText: function () {
      var vm = this
      let text = vm.paramsData.text.replace(' ', ''),
          tleng = text.length
          
      if (vm.paramsData.type == 'Personnel') {
        if (tleng == 1) {
          return `<tspan x="281" y="296" dominant-baseline="middle" text-anchor="middle">${text}</tspan>`
        }
        else if (tleng == 2) {
          return `<tspan x="281" y="261" dominant-baseline="text-top" text-anchor="middle">${text[0]}</tspan><tspan x="281" y="301" dominant-baseline="hanging" text-anchor="middle">${text[1]}</tspan>`
        }
        else if (tleng == 3) {
          return `<tspan x="281" y="206" dominant-baseline="text-top" text-anchor="middle">${text[0]}</tspan><tspan x="281" y="286" dominant-baseline="middle" text-anchor="middle">${text[1]}</tspan><tspan x="281" y="351" dominant-baseline="hanging" text-anchor="middle">${text[2]}</tspan>`
        }
        else {
          if ((tleng % 2) == 1)
            text = text + (vm.paramsData.lang == 'kr' ? '인' : '印')

          let half_length = Math.ceil(text.length / 2),
            top = text.substr(0,half_length),
            bottom = text.substr(half_length)

          return `<tspan x="281" y="261" dominant-baseline="text-top" text-anchor="middle">${top}</tspan><tspan x="281" y="301" dominant-baseline="hanging" text-anchor="middle">${bottom}</tspan>`
        }
      }
      else {        
        let half_length = Math.ceil(text.length / 2),
          whitespace = "&#160;&#160;",
          displayed_name = ''

        
        for (let i=6; i<=(parseInt(half_length)); i++) {
          whitespace = whitespace + '&#160;'
        }

        displayed_name = whitespace + text + whitespace

        return displayed_name
      }
    }
  }
}
</script>


<style lang="scss" scoped>
#childStampSvg {
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