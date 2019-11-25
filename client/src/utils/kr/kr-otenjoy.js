const fontname = {
  face: function () {
    return `
      @font-face {
        font-family: 'OTEnjoystoriesBA';
        font-weight: bold;
        font-style: normal;
      }

      svg {
        width: 100%;
        height: auto;
        max-height: 150px;
      }

      .svg-kr-5 {
        font-family: 'OTEnjoystoriesBA';
      }
    `
  }
}

export { fontname };