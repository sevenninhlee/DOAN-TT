const fontname = {
  face: function () {
    return `
      @font-face {
        font-family: 'nagurigaki_crayonregular';
        font-weight: normal;
        font-style: normal;
      }

      svg {
        width: 100%;
        height: auto;
        max-height: 150px;
      }

      .svg-jp-1 {
        font-family: 'nagurigaki_crayonregular';
      }
    `
  }
}

export { fontname };