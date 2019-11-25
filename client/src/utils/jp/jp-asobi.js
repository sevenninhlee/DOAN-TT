const fontname = {
  face: function () {
    return `
      @font-face {
        font-family: 'asobimemogakiregular';
        font-weight: normal;
        font-style: normal;
      }

      svg {
        width: 100%;
        height: auto;
        max-height: 150px;
      }

      .svg-jp-0 {
        font-family: 'asobimemogakiregular';
      }
    `
  }
}

export { fontname };