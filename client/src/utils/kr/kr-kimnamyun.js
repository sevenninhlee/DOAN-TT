const fontname = {
  face: function () {
    return `
      @font-face {
        font-family: 'Kim Namyun';
        font-weight: normal;
        font-style: normal;
      }

      svg {
        width: 100%;
        height: auto;
        max-height: 150px;
      }

      .svg-kr-0 {
        font-family: 'Kim Namyun';
      }
    `
  }
}

export { fontname };