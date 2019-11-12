const fonts = {
  en: ['delafield', 'badhead', 'banthers', 'connoisseurs', 'cutepunk', 'elrotex', 'greatvibes', 'klsweetpineapple', 'mighttype', 'popsregular', 'somethingwild'],
  kr: ['kimnamyun', 'eunyoung', 'goyang', 'flowerroad', 'inklipquid', 'otenjoy', 'dovemayo', 'sdmisaeng', 'hsgyoul', 'jeju'],
  jp: ['asobi', 'crayon', 'riipop', 'riit', 'sjitsp', 'geneilate', 'geneiantique']
}

const svgstyles = {
  methods: {
    fontface: function() {
      return new Promise((resolve, reject) => {
        const external = () => this.componentLoader()
        
        external().then(({fontname}) => {
          resolve(fontname.face())
        })
        .catch(error => {
          reject(`Error: ${error}`)
        })
      })
    }
  },
  computed: {
    /** Dynamic Loader */
    componentLoader () {
      let file, folder
      if (this.getLangShort == 'gb') {
        folder = 'en'
        file = `en-${fonts.en[this.getSelectedIndex]}`
      }
      else if (this.getLangShort == 'kr') {
        folder = 'kr'
        file = `kr-${fonts.kr[this.getSelectedIndex]}`
      }
      else {
        folder = 'jp'
        file = `jp-${fonts.jp[this.getSelectedIndex]}`
      }
      return () => import(`./${folder}/${file}.js`)
    },
    getSelectedIndex () {
      return this.config_val.navtab_selected
    },
    getLangShort () {
      return this.config_val.lang_short
    }
  }
}

export { svgstyles };