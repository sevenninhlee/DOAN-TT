const fontname = {
  face: function () {
    return `
      @font-face {
        font-family: 'riipopkakuregular';
        font-weight: normal;
        font-style: normal;
      }

      svg {
        width: 100%;
        height: auto;
        max-height: 150px;
      }

      .svg-jp-2 {
        font-family: 'riipopkakuregular';
      }
    `
  }
}

export { fontname };