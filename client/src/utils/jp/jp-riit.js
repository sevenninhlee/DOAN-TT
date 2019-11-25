const fontname = {
  face: function () {
    return `
      @font-face {
        font-family: 'riitegakifuderegular';
        font-weight: normal;
        font-style: normal;
      }

      svg {
        width: 100%;
        height: auto;
        max-height: 150px;
      }

      .svg-jp-3 {
        font-family: 'riitegakifuderegular';
      }
    `
  }
}

export { fontname };