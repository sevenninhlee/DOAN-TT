const fontname = {
  face: function () {
    return `
      @font-face {
        font-family: 'GoyangA1';
        font-weight: normal;
        font-style: normal;
      }
  
      svg {
        width: 100%;
        height: auto;
        max-height: 150px;
      }
  
      .svg-kr-2 {
        font-family: 'GoyangA1';
      }
    `
  }
}

export { fontname };