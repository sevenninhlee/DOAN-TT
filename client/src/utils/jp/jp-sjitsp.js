const fontname = {
  face: function () {
    return `
      @font-face {
        font-family: 'setofontsp_sjisregular';
        font-weight: normal;
        font-style: normal;
      }

      svg {
        width: 100%;
        height: auto;
        max-height: 150px;
      }

      .svg-jp-4 {
        font-family: 'setofontsp_sjisregular';
      }
    `
  }
}

export { fontname };