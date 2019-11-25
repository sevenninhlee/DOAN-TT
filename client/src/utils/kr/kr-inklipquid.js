const fontname = {
  face: function () {
    return `
      @font-face {
        font-family: 'THEFACESHOPA1';
        font-weight: normal;
        font-style: normal;
      }

      svg {
        width: 100%;
        height: auto;
        max-height: 150px;
      }

      .svg-kr-4 {
        font-family: 'THEFACESHOPA1';
      }
    `
  }
}

export { fontname };