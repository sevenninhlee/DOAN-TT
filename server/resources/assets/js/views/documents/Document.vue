<template>

  <div id="main">
  <div class="side-dashboard">
     <headercomponent></headercomponent>
    <div class="content-heading">
      <div class="row no-gutters">
        <div class="col-lg-12 Add-Documents mt-5 pl-5">
          <h2 class="pb-5">Prepare document</h2>
          <input type="hidden" id="gggg" >
        </div>
      </div>
    </div>
    <div class="content-form">
      <div class="row no-gutters">
        <div class="col-lg-12 pl-5 paddingManaged">
          <div class="row no-gutters">
             <div class="col-xl-9 col-lg-9 pr-2">
              <div class="left-form">
               
                <div class="form-reciept">
                  <div class="row no-gutters">
                    <div class="col-lg-2 mr-3 mb-3">
                        <div><i class="fa fa-bars menu-bars"></i><a data-toggle="collapse" data-target="#demo" href="JavaScript:Void(0)" class="btn signature menu-width"><i class="fa fa-pen pr-2"></i>Signature</a><i class="far fa-times-circle last-close"></i></div>
                        <div id="demo" class="collapse content-collapse">
                          <p>Who fills this out?</p>
                          <select name="" id="input" class="need-to-sign" required="required">
                    <option value=""> Need to sign</option>
                    </select>
                        </div>
                    </div>
                    <div class="col-lg-2 mr-3 mb-3">
                        <div><i class="fa fa-bars menu-bars"></i><a  data-toggle="collapse" data-target="#fullname" href="JavaScript:Void(0)" class="btn full-name  menu-width"><i class="fa fa-user pr-2"></i>Full Name</a><i class="far fa-times-circle last-close"></i></div>
                        <div id="fullname" class="collapse content-collapse">
                          <p>Who fills this out?</p>
                          <select name="" id="input" class="need-to-sign" required="required">
                    <option value=""> Need to sign</option>
                    </select>
                        </div>
                    </div>
                    <div class="col-lg-2 mr-3 mb-3">
                        <div><i class="fa fa-bars menu-bars"></i><a href="JavaScript:Void(0)" data-toggle="collapse" data-target="#company" class="btn company menu-width"><i class="fa fa-building pr-2"></i>Company</a><i class="far fa-times-circle last-close"></i></div>
                        <div id="company" class="collapse content-collapse">
                          <p>Who fills this out?</p>
                          <select name="" id="input" class="need-to-sign" required="required">
                    <option value=""> Need to sign</option>
                    </select>
                        </div>
                    </div>
                    <div class="col-lg-2 mr-3 mb-3">
                        <div><i class="fa fa-bars menu-bars"></i><a href="JavaScript:Void(0)" data-toggle="collapse" data-target="#title" class="btn title menu-width"><i class="fa fa-briefcase pr-2"></i>Title</a><i class="far fa-times-circle last-close"></i></div>
                        <div id="title" class="collapse content-collapse">
                          <p>Who fills this out?</p>
                          <select name="" id="input" class="need-to-sign" required="required">
                    <option value=""> Need to sign</option>
                    </select>
                        </div>
                    </div>
                      <div class="col-lg-2 mr-3 mb-3">
                        <div><i class="fa fa-bars menu-bars"></i><a href="JavaScript:Void(0)"  data-toggle="collapse" data-target="#texts" class="btn text menu-width"><i class="fa fa-briefcase pr-2"></i>Text</a><i class="far fa-times-circle last-close"></i></div>
                        <div id="texts" class="collapse content-collapse">
                          <p>Who fills this out?</p>
                          <select name="" id="input" class="need-to-sign" required="required">
                    <option value=""> Need to sign</option>
                    </select>
                        </div>
                    </div>
                      <div class="col-lg-3 mr-3 mb-3">
                        <div><i class="fa fa-bars menu-bars"></i><a href="JavaScript:Void(0)" data-toggle="collapse" data-target="#date" class="btn menu-date menu-width">MM/DD/YYYY</a><i class="far fa-times-circle last-close"></i></div>
                        <div id="date" class="collapse content-collapse">
                          <p>Who fills this out?</p>
                          <select name="" id="input" class="need-to-sign" required="required">
                    <option value=""> Need to sign</option>
                    </select>
                        </div>
                    </div>
                    <div class="col-lg-1">
                      <div class="custom-control custom-radio">
                      <input type="checkbox" class="custom-control-radio checkbox-gray" id="defaultUncheckedc1245" name="defaultExampleRadios">
                      <label class="" for="defaultUncheckedc1245"></label>
                    </div>
                    </div>
                    <div class="col-lg-1">
                      <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-radio radio-dark" id="Prepare1" name="Prepare">
                <label class="" for="Prepare1"></label>
                </div>
                    </div>


                  
                   <!--    <div class="d-inline-block p-3 p-relative"><div><i class="fa fa-bars menu-bars"></i><a href="JavaScript:Void(0)" class="btn signature menu-width"><i class="fa fa-pen pr-2"></i>Signature</a><i class="far fa-times-circle last-close"></i></div>
                      <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Simple collapsible</button>
                          <div id="demo" class="collapse">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                          </div>
                       
                      </div>
                      <div class="d-inline-block p-3 p-relative"><i class="fa fa-bars menu-bars"></i><a href="JavaScript:Void(0)" class="btn full-name  menu-width"><i class="fa fa-user pr-2"></i>Full Name</a><i class="far fa-times-circle last-close"></i></div>
                      <div class="d-inline-block p-3 p-relative"><i class="fa fa-bars menu-bars"></i><a href="JavaScript:Void(0)" class="btn company menu-width"><i class="fa fa-building pr-2"></i>Company</a><i class="far fa-times-circle last-close"></i></div>
                      <div class="d-inline-block p-3 p-relative"><i class="fa fa-bars menu-bars"></i><a href="JavaScript:Void(0)" class="btn title menu-width"><i class="fa fa-briefcase pr-2"></i>Title</a><i class="far fa-times-circle last-close"></i></div>
                      <div class="d-inline-block p-3 p-relative"><i class="fa fa-bars menu-bars"></i><a href="JavaScript:Void(0)" class="btn text menu-width"><b class="pr-2">T</b>Text</a><i class="far fa-times-circle last-close"></i></div>
                      <div class="d-inline-block p-3 p-relative"><i class="fa fa-bars menu-bars"></i><a href="JavaScript:Void(0)" class="btn menu-date menu-width">MM/DD/YYYY</a><i class="far fa-times-circle last-close"></i></div>
                      <div class="d-inline-block p-3"><div class="custom-control custom-radio btn signature menu-width">
                      <input type="checkbox" class="custom-control-radio checkbox-gray" id="defaultUncheckedc1245" name="defaultExampleRadios">
                      <label class="" for="defaultUncheckedc1245"></label>
                    </div></div> -->
                    </div>
                    <div class="row no-gutters">
                      <div class="col-md-12">

<!-- 
                        <div class="signer-document">
                         <div class="document-pagination">
                            <div class="pull-left">
                                <button id="prev" class="btn btn-default btn-round"><i class="ion-ios-arrow-left"></i></button>
                                <button id="next" class="btn btn-default btn-round"><i class="ion-ios-arrow-right"></i></button>
                                <span class="text-muted ml-15">Page <span id="page_num">0</span> of <span id="page_count">0</span></span>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-default btn-round btn-zoom" zoom="plus"><i class="ion-plus"></i></button>
                                <button class="btn btn-default btn-round btn-zoom" zoom="minus"><i class="ion-minus"></i></button>

                            </div>
                        </div>
                         <div class="document-map"></div>
                        <canvas id="document-viewer"></canvas>
                       <button class="btn btn-success btn-responsive launch-editor"><i class="ion-edit"></i>Edit</button>
                      </div> -->



                     <!--  <div class="signer-overlay">
        <div class="signer-overlay-header">
           <div class="signer-overlay-logo">
                <a href="<?=url("");?>"><img src="<?=url("");?>uploads/app/{{ env('APP_LOGO'); }}" class="img-responsive"></a>
            </div> 
            <div class="signer-overlay-action">
                <button class="btn btn-responsive btn-default close-editor-overlay"><i class="ion-ios-close-outline"></i> Close </button>
                <button class="btn btn-responsive btn-primary signer-save"><i class="ion-ios-checkmark-outline"></i> <span>Save</span> </button>
            </div>
            <div class="signer-header-tools">
                <div class="signer-header-tool-holder">
                    <div class="signer-tool" tool="signature" action="true">
                        <div class="tool-icon tool-signature"></div>
                        <p>Signature</p>
                    </div>
                    <div class="signer-tool" tool="text" action="true">
                        <div class="tool-icon tool-text"></div>
                        <p>Text</p>
                    </div>
                    <div class="signer-tool" tool="text" action="true">
                        <div class="tool-icon tool-text"></div>
                        <p>First Name</p>
                    </div>
                    <div class="signer-tool" tool="draw" action="true">
                        <div class="tool-icon tool-draw"></div>
                        <p>Draw</p>
                    </div>
                    <div class="signer-tool" tool="image" action="true">
                        <div class="tool-icon tool-image"></div>
                        <p>Image</p>
                    </div>
                    <div class="signer-tool" tool="symbol" action="true">
                        <div class="tool-icon tool-symbols"></div>
                        <p>Symbols</p>
                    </div>
                    <div class="signer-tool" tool="shape" action="true">
                        <div class="tool-icon tool-shapes"></div>
                        <p>Shapes</p>
                    </div>
                    <div class="signer-tool" tool="fields" action="true">
                        <div class="tool-icon tool-fields"></div>
                        <p>Fields</p>
                    </div>
                    @if ( empty($request) )
                    <div class="signer-tool" tool="input" action="true">
                        <div class="tool-icon tool-textinput"></div>
                        <p>Input</p>
                    </div>
                    @endif
                    <div class="signer-tool" tool="rotate" action="true">
                        <div class="tool-icon tool-rotate"></div>
                        <p>Rotate</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="signer-more-tools">
            <div class="signer-tool" tool="alignleft" action="false" group="text">
                <div class="tool-icon tool-alignleft"></div>
                <p>Align Left</p>
            </div>
            <div class="signer-tool" tool="aligncenter" action="false" group="text">
                <div class="tool-icon tool-aligncenter"></div>
                <p>Align Center</p>
            </div>
            <div class="signer-tool" tool="alignright" action="false" group="text">
                <div class="tool-icon tool-alignright"></div>
                <p>Align Right</p>
            </div>
            <div class="signer-tool" tool="bold" action="false" group="text">
                <div class="tool-icon tool-bold"></div>
                <p>Bold</p>
            </div>
            <div class="signer-tool" tool="italic" action="false" group="text">
                <div class="tool-icon tool-italic"></div>
                <p>Italic</p>
            </div>
            <div class="signer-tool" tool="underline" action="false" group="text">
                <div class="tool-icon tool-underline"></div>
                <p>Underline</p>
            </div>
            <div class="signer-tool" tool="strikethrough" action="false" group="text">
                <div class="tool-icon tool-strikethrough"></div>
                <p>Strikethrough</p>
            </div>
            <div class="signer-tool" tool="font" action="false" group="text">
                <div class="tool-icon tool-font"></div>
                <p>Font</p>
            </div>
            <div class="signer-tool" tool="fontsize" action="false">
                <div class="tool-icon tool-fontsize">
                    <div class="numberInput">
                      <input type="text" class="font-size" value="14" min="0" />
                      <span class="arrow up"></span>
                      <span class="arrow down"></span>
                    </div>
                </div>
                <p class="font-size-label">Font Size</p>
            </div>
            <div class="signer-tool" tool="color" action="false" color="#000000">
                <div class="tool-icon tool-colorfill"><button id="color-picker" class="jscolor {valueElement:null,value:'000000', borderRadius:'1px', borderColor:'#e6eaee', onFineChange:'updateColor(this)'}"></button></div>
                <p>Color</p>
            </div>
            <div class="signer-tool" tool="duplicate" action="false">
                <div class="tool-icon tool-duplicate"></div>
                <p>Duplicate</p>
            </div>
            <div class="signer-tool" tool="delete" action="false">
                <div class="tool-icon tool-delete"></div>
                <p>Delete</p>
            </div>
        </div>
        <div class="signer-overlay-previewer col-md-8 light-card"></div>
         <div class="signer-overlay-footer">
            <p class="text-muted text-center"> Powered by <?=env("APP_NAME")?> | <?=date("Y")?> &copy; <?=env("APP_NAME")?> | All Rights Reserved. </p>
        </div> 
        <div class="signer-assembler"></div>
        <div class="signer-builder"></div>
    </div> -->




                        <img src="../../../images/prepare.png" width="100%">

                      </div>
                    </div>

                   <div class="row no-gutters">
                    <div class="col-lg-12 col-12 col-md-12 Add-Documents ">

                    </div>
                   </div>
                </div>
              </div>
             </div>
             <div class="col-lg-3">
              <div class="row no-gutters">
                <div class="col-lg-12">
                  <div class="form-reciept">
                      <div class="row no-gutters">
                    <div class="col-lg-6 col-6 document">DOCUMENTS</div>
                    <div class="col-lg-2 col-2"><i class="fa fa-undo document-icon"></i></div>
                    <div class="col-lg-2 col-2"><i class="fa fa-redo document-icon"></i></div>
                    <div class="col-lg-2 col-2"><i class="fa fa-trash document-icon"></i></div>
                  </div>
                  <div class="row no-gutters">
                    <div class="col-lg-11">
                      <p class="document-content">Continuous Improvement lorem ipsum sit dollor amet.doc</p>
                    </div>
                  </div>
                  <div class="row no-gutters">
                    <div class="col-lg-12 prepare-border">
                      <img src="../../../images/prepare2.png" width="90%">
                    </div>
                  </div>
                  <div class="row no-gutters mt-4">
                    <div class="col-lg-12">
                      <p class="text-center">1</p>
                    </div>
                  </div>
                  <div class="row no-gutters">
                    <div class="col-lg-12 border-second">
                      <img src="../../../images/prepare2.png" width="90%">
                    </div>
                  </div>
                  <div class="row no-gutters mt-4">
                    <div class="col-lg-12">
                      <p class="text-center">2</p>
                    </div>
                  </div>
                  <div class="row no-gutters">
                    <div class="col-lg-11">
                      <p class="document-content">Ad cum numquam efficiantur.pdf</p>
                    </div>
                  </div>
                  <div class="row no-gutters">
                    <div class="col-lg-12 border-second">
                      <img src="../../../images/prepare2.png" width="90%">
                    </div>
                  </div>
                  <div class="row no-gutters mt-5">
                    <div class="col-lg-12">
                      <a href="" class="form-btn  name-btn" style="width: 124px !important; ">Back</a>
                      <a  class="form-btn send-email" @click="next()">Next</a>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
             </div>
          </div>
        </div>
      </div>

    </div>
    
  </div>
  <footercomponent></footercomponent>
</div>
</template>
<script>
  import Header from "../common/Header";
  import Footer from "../common/Footer";
        export default 
        {
          data(){
             return {
                  recipients: [],
                  files_data : []
              }
        
      },
      components:{
         'headercomponent':Header,
         'footercomponent':Footer
     },
          methods: 
          {
            next()
            {
               this.$router.push({ name: 'DocumentVerify' });
            }
          
        
        },
        mounted()
        {
          console.log(this.$route.params.files);
          $('#gggg').val(this.$route.params.files);
           this.recipients = this.$route.params.recipients;

          this.files_data = this.$route.params.files;
          let files_data1 = this.$route.params.files;

          let render = document.createElement("script");
          let signer = document.createElement("script");

          let testvar = "var animal='f';";

          render.innerHTML = testvar;

          render.async = true;
            render.setAttribute(
              "src",
              "js/render.js"
            );
         signer.async = true;
         signer.setAttribute(
            "src",
            "js/signer.js"
          );

          document.head.appendChild(render);
          document.head.appendChild(signer);



            console.log(render);
         

          /*console.log(this.recipients);
          console.log( this.files_data);*/
         
        } 
      }
 </script>
 <style lang="scss" type="text/css" scoped>
  
 </style>