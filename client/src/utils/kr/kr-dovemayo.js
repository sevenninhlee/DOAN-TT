const fontname = {
  face: function () {
    return `
      @font-face {
        font-family: 'Dovemayo-Medium';
        font-weight: 500;
        font-style: normal;
      }

      svg {
        width: 100%;
        height: auto;
        max-height: 150px;
      }

      .svg-kr-6 {
        font-family: 'Dovemayo-Medium';
      }
    `
  }
}

export { fontname };