<template>
  <div>
    <!-- HEADER -->
    <div class="row">
      <div class="col-12">
        <div class="content-card">
          <div class="content">
            <div class="d-flex align-items-center">
              <img src="img/icons/contract.svg" />
              <div class="ml-3">
                <div class="header">{{ $t("signature.headerSign") }}</div>
                <div class="comments">{{ $t('signature.commentSign') }}</div>
              </div>
            </div>
            <b-button variant="primary" v-on:click="showSignInitialModal">{{ $t('signature.button.addSign') }}</b-button>
          </div>
        </div>
      </div>
    </div>
    <!-- END HEADER -->

    <!-- LISTING SIGN INITIAL -->
    <div class="row">
      <div class="col-12">
        <div class="content-card sign-signature px-md-3 px-2" v-for="signinitial in SIGNATURES" :key="signinitial.id">
          
            <div class="row">
              <div class="col-sm-8 text-center">
                <img :src="signinitial.uploaded_url" alt="Uploaded Signature" style="height: 100px; width: auto; max-width: 280px" />
              </div>
              <div class="col-sm-4 text-center">
                <img :src="signinitial.initial_uploaded_url" alt="Uploaded Initial" style="height: 100px; width: auto; max-width: 280px" />
              </div>
              <div class="col-12">
                <div class="actions">
                  <div class="action clickable-icon" v-on:click="onDefaultSignInitial(signinitial.id)">
                    <i class="fa fa-pencil pr-2"></i> {{ $t('signature.button.setdefault') }}
                  </div>
                  <div class="action clickable-icon" v-on:click="onDownloadSignInitial(signinitial.uploaded_url)">
                    <i class="fa fa-download pr-2"></i> {{ $t('signature.button.download') }}
                  </div>
                  <div class="action clickable-icon" v-on:click="onDeleteSignInitial(signinitial.id)">
                    <i class="fa fa-trash pr-2"></i> {{ $t('signature.button.delete') }}
                  </div>
                </div>
              </div>
            </div>

        </div>
      </div>
    </div>
    <!-- END LISTING SIGN INITIAL -->

    <!-- MODAL -->
    <b-modal 
      id="create-signature-modal" 
      ref="create-signature-modal" 
      hide-footer size="xl" 
      :no-close-on-backdrop="true" 
      :no-close-on-esc="true"
      :hide-header-close="true">
      <div class="create-signature-modal">
        <div class="title">
          {{ $t('signature.modal.titleSign') }}
        </div>
        <!-- Tab Menu -->
        <div class="row mb-md-4 mb-2">
          <div class="col-4 pr-0 pr-md-3">
            <b-button
              class="stamp-tab-nav"
              :variant="config_val.navtab_index == 'Choose' ? 'primary' : 'outline-primary'"
              v-on:click="() => {
                config_val.navtab_index = 'Choose'
                drawing_data.signature.drawable=false
                drawing_data.initial.drawable=false
              }" 
              block
            >
              {{ $t('signature.modal.tab.choose') }}
            </b-button>
          </div>
          <div class="col-4 px-2 px-md-3">
            <b-button
              class="stamp-tab-nav"
              :variant="config_val.navtab_index == 'Draw' ? 'primary' : 'outline-primary'"
              v-on:click="() => {
                config_val.navtab_index = 'Draw'
                drawing_data.signature.drawable=false
                drawing_data.initial.drawable=false
              }" 
              block
            >
              {{ $t('signature.modal.tab.draw') }}
            </b-button>
          </div>
          <div class="col-4 pl-0 pl-md-3">
            <b-button
              class="stamp-tab-nav"
              :variant="config_val.navtab_index == 'Upload' ? 'primary' : 'outline-primary'"
              v-on:click="() => {
                config_val.navtab_index = 'Upload'
                drawing_data.signature.drawable=false
                drawing_data.initial.drawable=false
              }" 
              block
            >
              {{ $t('signature.modal.tab.upload') }}
            </b-button>
          </div>
        </div>
        <!-- End Tab Menu -->

        <!-- Create Form -->
        <div>
          <!-- Generate Signature & Initial -->
          <div class="row mb-4" v-if="config_val.navtab_index == 'Choose'">
            <div class="col px-sm-3 px-1">
              <hr />
              <div class="row mb-1">
                <!-- Select Language -->
                <div class="col-lg-2 col-12 pr-lg-1">
                  <UserSelect
                    v-bind:value="form_data.language"
                    v-bind:items="['English', 'Korean', 'Japanese']"
                    v-model="form_data.language"
                    @changeValue="onSyncLanguage"
                  />
                </div>
                <!-- Input Name -->
                <div class="col-lg-7 col-md-8 col-12 px-lg-1 pr-md-1">
                  <div class="form-group">
                    <input
                      type="text"
                      :class="{
                        'form-control': true,
                        'input-invalid': false,
                        'input-valid': true
                      }"
                      id="signature_text"
                      name="signature_text"
                      v-model="form_data.signature_text"
                      :placeholder="$t('signature.modal.placeholderFullname')"
                      :maxlength="25"
                      @changeValue="form_data.signature_text = $event"
                      v-on:keyup="onChangeName"
                    />
                    <p v-if="form_data.signature_text >= 25" class="validation-error text-left pl-2">
                      <!-- Validation Response Error -->
                    </p>
                  </div>
                </div>
                <!-- Input Initial -->
                <div class="col-lg-3 col-md-4 col-12 pl-md-1 ">
                  <div class="form-group">
                    <input
                      type="text"
                      :class="{
                        'form-control': true,
                        'input-invalid': false,
                        'input-valid': true
                      }"
                      id="initial"
                      name="initial"
                      v-model="form_data.initial"
                      :placeholder="$t('signature.modal.placeholderInitials')"
                      :maxlength="4"
                      @changeValue="form_data.initial = $event"
                    />
                    <p  v-if="form_data.initial >= 25" class="validation-error text-left pl-2">
                      <!-- Validation Response Error -->
                    </p>
                  </div>
                </div>
              </div>

              <!-- Generated Signature & Initial -->
              <div class="signatures" style="overflow-x: hidden">
                <div v-for="(item, index) in config_val.languages[form_data.language]"
                  v-bind:key="index"
                  :class="{
                    'sign-result': true,
                    'checked': index == config_val.navtab_selected
                  }"
                  v-on:click="onSelectSignature(index)"
                >
                  <div class="row">
                    <div class="col-sm-8 col-12 m-auto">
                      <div class="d-flex flex-column justify-content-between px-md-2" style="width: inherit;">
                        <div class="signed-by">{{ $t('signature.modal.signby') }}</div>
                        <div class="signature-text">
                          <GenerateSvg 
                            ref="generatedSign" 
                            :paramsData="{
                              idData: index,
                              type: 'Signature',
                              text: form_data.signature_text,
                              fontFace: item,
                              lang: form_data.language == 'English' ? 'gb' : form_data.language == 'Korean' ? 'kr' : 'jp'
                            }" 
                          />
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-1 col-12 m-auto">
                      <div class="right-border"></div>
                    </div>
                    <div class="col-sm-3 col-12 m-auto">
                      <div class="signature-text pt-md-2">
                        <GenerateSvg 
                          ref="generatedInitial"
                          :paramsData="{
                            idData: index,
                            type: 'Initial',
                            text: form_data.initial,
                            fontFace: item,
                            lang: form_data.language == 'English' ? 'gb' : form_data.language == 'Korean' ? 'kr' : 'jp'
                          }"
                        />
                      </div>
                    </div>
                  </div>

                  <div class="check-box" v-if="config_val.navtab_selected == index">
                    <img src="img/icons/check-2.svg" />
                  </div>
                </div>
              </div>
              <!-- End Generated Signature & Initial -->
            </div>
          </div>

          <!-- Draw Signature & Initial -->
          <div v-else-if="config_val.navtab_index == 'Draw'" class="row mb-4">
            <div class="col-lg-8 col-12 pr-lg-1 mb-3 mb-lg-0">
              <div ref="container-for-signature" class="content-dash draw-signature">
                <div
                  class="draw-placeholder clickable-icon"
                  v-if="!drawing_data.signature.drawable"
                  v-on:click="drawing_data.signature.drawable=true"
                >
                  <img src="img/icons/pencil-draw.svg" />
                  <div class="mt-3">{{ $t('signature.modal.drawSign') }}</div>
                </div>
                <div class="canvas-container">
                  <drawing-board
                    id="drawboard-sign"
                    v-if="drawing_data.signature.drawable" 
                    v-bind:key="drawing_data.signature.index" 
                    :paramData="drawing_data.signature"
                    :drawSize="{
                      width: getContainerWidth('container-for-signature'),
                      height: getContainerHeight('container-for-signature'),
                    }"
                    ref="drawboard-sign"
                    class="draw-pan" 
                  />
                </div>
                <div v-if="drawing_data.signature.drawable">
                  <b-button variant="link" v-on:click="drawing_data.signature.drawable=false">
                    <i class="fa fa-undo" /> {{ $t('signature.button.reset') }}
                  </b-button>
                </div>
              </div>
            </div>
            
            <div class="col-lg col pl-lg-1 pb-2">
              <div ref="container-for-initial" class="content-dash draw-initials">
                <div
                  class="draw-placeholder clickable-icon"
                  v-if="!drawing_data.initial.drawable"
                  v-on:click="drawing_data.initial.drawable=true"
                >
                  <img src="img/icons/pencil-draw.svg" />
                  <div class="mt-3">{{ $t('signature.modal.drawInitials') }}</div>
                </div>
                <div class="canvas-container">
                  <drawing-board 
                    id="drawboard-ini"
                    v-if="drawing_data.initial.drawable" 
                    v-bind:key="drawing_data.initial.index" 
                    :paramData="drawing_data.initial"
                    :drawSize="{
                      width: getContainerWidth('container-for-initial'),
                      height: getContainerHeight('container-for-initial'),
                    }"
                    ref="drawboard-initial"
                    class="draw-pan" 
                  />
                </div>
                <div v-if="drawing_data.initial.drawable">
                  <b-button variant="link" v-on:click="drawing_data.initial.drawable=false">
                    <i class="fa fa-undo" /> {{ $t('signature.button.reset') }}
                  </b-button>
                </div>
              </div>
            </div>
          </div>

          <!-- Upload Stamp -->
          <div v-else class="row mb-4">
            <div class="col-lg-8 col-12 pr-lg-1 mb-3 mb-lg-0">
              <ImageUpload 
                v-bind:files="signature_file" 
                v-bind:config_file="({
                  img: 'img/icons/upload.svg',
                  text: $t('signature.modal.uploadSign')
                })"
                v-on:toggle="toggleSignUpload($event)" 
              />
            </div>
            <div class="col-lg col pl-lg-1 pb-2">
              <ImageUpload 
                v-bind:files="initial_file" 
                v-bind:config_file="({
                  img: 'img/icons/upload.svg',
                  text: $t('signature.modal.uploadInitials')
                })" 
                v-on:toggle="toggleInitialUpload($event)"
              />
            </div>
          </div>
          <hr />

          <div class="footer">
            <div class="summary">
              <!-- {{ $t('signature.modal.tncSign') }} -->
            </div>
            <div class="buttons">
              <b-button variant="link" v-on:click="hideSignInitialModal">
                <span>
                  <i class="fa fa-close"></i> {{ $t('signature.button.cancel') }}
                </span>
              </b-button>

              <div v-if="config_val.navtab_index == 'Choose'">
                <b-button v-if="user_sign" variant="primary" v-on:click="onUpdateSignInitial">Update</b-button>
                <b-button v-else variant="primary" v-on:click="onCreateSignInitial">{{ $t('signature.button.create') }}</b-button>
              </div>
              <div v-else-if="config_val.navtab_index == 'Draw'">
                <b-button variant="primary" v-on:click="onDrawSignInitial">{{ $t('signature.button.create') }}</b-button>
              </div>
              <div v-else>
                <b-button variant="primary" v-on:click="onUploadSignInitial">{{ $t('signature.button.create') }}</b-button>
              </div>

            </div>
          </div>

        </div>

      </div>
    </b-modal>
    <!-- END MODAL -->

  </div>
</template>

<script>
import axios from 'axios'
import store from '../../store/store'
import { mapGetters, mapState } from 'vuex'
import { getOutSide } from '../../utils/http'
import JwtService from '../../mixins/jwt.service'
import { signation } from '../../mixins/signation'
import { svgstyles } from '../../utils/svgstyle'
import { 
  SIGNATURE_CREATE, 
  SIGNATURE_UPLOAD,
  SIGNATURE_GET, 
  SIGNATURE_UPDATE, 
  SIGNATURE_SOFTDELETE, 
  SIGNATURE_DESTROY, 
  AUTH_LOADING 
} from '../../store/actions.type'
import UserSelect from '../../components/UserSelect'
import DrawingBoard from '../../components/DrawingBoard'
import ImageUpload from '../../components/common/ImageUpload'

export default {
  name: 'SignatureInitial',
  components: {
    UserSelect, 
    DrawingBoard, 
    ImageUpload,
    GenerateSvg: () => import('../../components/common/GenerateSvg')
  },
  mixins: [signation, svgstyles],
  data() {
    return {
      user_selected_sign: 0,
      user_sign: "",
      form_data: {
        signature_type: 'Choose',
        initial: '',
        signature_text: '',
        font_face: '',
        font_size: '',
        language: 'English',
        uploaded_url: ''
      },
      s_data: {
        signature_type: 'Choose',
        initial: '',
        signature_text: '',
        font_face: '',
        font_size: '',
        language: 'English',
        uploaded_url: '',
        initial_uploaded_url: ''
      },
      generate_data: {
        signature_type: 'Choose',
        initial: '',
        text: '',
        font_face: '',
        font_size: '',
        language: 'English',
        uploaded_url: ''
      },
      generate_img: {
        signature: '',
        initial: ''
      },

      drawing_data: {
        signature: {
          name: 'signature',
          drawing: '',
          drawable: false
        },
        initial: {
          name: 'initial',
          drawing: '',
          drawable: false
        }
      },

      signature_file: [],
      initial_file: [],
      uploadSignComponent: [],
      uploadInitialComponent: [],

      validator: {
        
      },
      config_val: {
        navtab_index: 'Choose',
        navtab_selected: '0',
        lang_short: 'gb',
        generated_show: false,
        languages: {
          /** English */
          English: ["Mrs Saint Delafield", "Badhead Typeface", "Banthers", "Connoisseurs", "Cutepunk_Regular", "Elrotex Basic", "GreatVibes-Regular", "KLSweetPineappleRegular", "Mightype Script", "pops_08_REGULAR", "somethingwild-Regular"],
          /** Korean */
          Korean: ["KimNamyun", "KCC-eunyoung", "Goyang", "SangSangFlowerRoad", "InkLipquid", "OTEnjoystoriesBA", "Dovemayo-Medium", "SDMiSaeng", "HSGyoulnoonkot", "Jeju Hallasan"],
          /** Japanese */
          Japanese: ["AsobiMemogaki-Regular-1-01", "crayon_1-1", "RiiPopkkR", "RiiT_F", "sjis_sp_setofont", "GenEiLateGoN_v2", "GenEiAntiquePv5-M"]
        },
        fontsize: {
          // English
          English: ["26", "29", "19", "29", "29", "14", "21", "29", "19", "18", "29"],
          // Korean
          Korean: ["27", "23", "21", "26", "23", "23", "16", "24", "17", "16"],
          // Korean: ["27", "35", "22", "38", "32", "36", "21", "34", "19", "21"],
          // Japanese
          Japanese: ["24", "23", "21", "26", "23", "23", "20"]
        },
      }
    }
  },
  computed: {
    ...mapGetters(['USER', 'SIGNATURES', 'loading', 'errors'])
  },
  mounted() {
    store.dispatch(AUTH_LOADING, false)
    var vm = this

    vm.getSignatures()
      .then(response => {
        store.dispatch(SIGNATURE_GET, response.data.data)
      })
      .catch(errors => {
        console.log(errors.response)
      });

       console.log('SIGNATURES', JSON.parse(JSON.stringify( this.SIGNATURES)) )

    vm.form_data.signature_text = vm.USER.name
    vm.form_data.initial = vm.USER.first_name.substring(0,1) + vm.USER.last_name.substring(0,1)
  },
  methods: {
    /** Create Signature */
    onCreateSignInitial: function () {
      var vm = this

      store.dispatch(AUTH_LOADING, true)

      vm.fontface()
        .then(response => {
          /** Signature */
          // append style in svg
          let defs = vm.$refs["generatedSign"][vm.config_val.navtab_selected].$refs["childSignSvg"].children["2"],
              styles = document.createElementNS("http://www.w3.org/2000/svg", "style"),
              node = document.createTextNode(response);              
          defs.appendChild(styles);
          styles.appendChild(node);

          let svgNode = vm.$refs["generatedSign"][vm.config_val.navtab_selected].$refs.childSignSvg,
              sSign = new XMLSerializer().serializeToString(svgNode);

          let pngBaseSign = this.svgToPng(sSign, 812, 412, 0)
          
          /** Initial */
          // append style in svg
          let defsIni = vm.$refs["generatedInitial"][vm.config_val.navtab_selected].$refs["childSignSvg"].children["2"],
              stylesIni = document.createElementNS("http://www.w3.org/2000/svg", "style"),
              nodeIni = document.createTextNode(response);              
          defsIni.appendChild(stylesIni);
          stylesIni.appendChild(nodeIni);

          let svgNodeIni = vm.$refs["generatedInitial"][vm.config_val.navtab_selected].$refs.childSignSvg,
              sInit = new XMLSerializer().serializeToString(svgNodeIni);

          let pngBaseInit = this.svgToPng(sInit, 412, 412, 0)

          pngBaseSign.then(resultSign => {
            pngBaseInit.then(resultInit => {
              vm.s_data = {
                signature_type: vm.config_val.navtab_index,
                initial: vm.form_data.initial,
                signature_text: vm.form_data.signature_text,
                font_face: vm.config_val.languages[vm.form_data.language][vm.config_val.navtab_selected],
                font_size: vm.config_val.fontsize[vm.form_data.language][vm.config_val.navtab_selected],
                language: vm.form_data.language,
                uploaded_url: resultSign,
                initial_uploaded_url: resultInit
              }

              vm.createSignature(vm.s_data)
                .then(response => {
                  store.dispatch(SIGNATURE_CREATE, response.data.data)
                    .then(() => {
                      vm.$toast.success({
                        title: "Signature and Initial Created",
                        message: "User's signature and initial have created!"
                      })
                
                      vm.$refs["create-signature-modal"].hide()
                      store.dispatch(AUTH_LOADING, false)               
                    })
                })
              })
          })        
      })
      .catch(errors => {
        store.dispatch(AUTH_LOADING, false)
        console.log(errors)
      })   
    },

    /** Draw Signature & Initial */
    onDrawSignInitial: function () {
      var vm = this

      let s_image = {
        sign_image: vm.getDataURLSign(),
        initial_image: vm.getDataURLInitial()
      }
      vm.uploadFiles(s_image)
    },

    /** Upload Signature & Initial */
    toggleSignUpload: function (e) {
      if (!e) return

      let reader = new FileReader();
      reader.onload = e => this.uploadSignatureComponent = e.target.result
      reader.readAsDataURL(e)
    },
    toggleInitialUpload: function (e) {
      if (!e) return

      let reader = new FileReader();
      reader.onload = e => this.uploadInitialComponent = e.target.result
      reader.readAsDataURL(e)
    },
    onUploadSignInitial: function () {
      var vm = this

      let s_image = {
        sign_image: vm.uploadSignatureComponent,
        initial_image: vm.uploadInitialComponent
      }

      vm.uploadFiles(s_image)
    },    
    uploadFiles: function (s_image) {
      var vm = this

      store.dispatch(AUTH_LOADING, true)

      vm.uploadSignature(s_image)
        .then(response => {
          store.dispatch(SIGNATURE_UPLOAD, response.data.data)
            .then(() => {
              vm.$toast.success({
                title: "Signature and Initial Uploaded",
                message: "User's signature and initial have uploaded!"
              });

              vm.$refs["create-signature-modal"].hide();
              store.dispatch(AUTH_LOADING, false)

              vm.drawing_data.signature.drawable=false
              vm.drawing_data.initial.drawable=false
            })
        })
        .catch(errors => {
          store.dispatch(AUTH_LOADING, false)
          console.log(errors)
        });
    },
    
    /** Show Signature Data */
    onShowSignInitial: function (id) { },

    /** Default Signature & Initial */
    onDefaultSignInitial: function (id) { // In progress
      var vm = this

      store.dispatch(AUTH_LOADING, true)

      vm.defaultSignature(id)
        .then(response => {
          store.dispatch(SIGNATURE_UPDATE, response.data.data)
            .then(() => {
              vm.$toast.success({
                title: "Signature and Initial Default",
                message: "User's singature and initial have set to default!"
              })

              store.dispatch(AUTH_LOADING, false)
            })
        })
        .catch(errors => {
          store.dispatch(AUTH_LOADING, false)
          console.log(errors)
        })
      
    },

    /** Delete Signature */
    onDeleteSignInitial: function (id) {
      var vm = this

      store.dispatch(AUTH_LOADING, true)

      if(confirm("Do you really want to delete?")) {

        vm.softDeleteSignature(id)
          .then(response => {
            store.dispatch(SIGNATURE_SOFTDELETE, id)
              .then(() => {
                vm.$toast.warn({
                  title: "Signature and Initial Deleted",
                  message: "User's signature and initial have deleted!"
                })

                store.dispatch(AUTH_LOADING, false)
              })
          })
          .catch(errors => {
            store.dispatch(AUTH_LOADING, false)
            console.log(errors)
          })
      }
    },

    /** Download Image */
    onDownloadSignInitial: function (url) {
      let vm = this,
          imageURL = url, 
          canvas = document.createElement("canvas"),
          downloadedImg = new Image
 
      downloadedImg = new Image;
      downloadedImg.crossOrigin = "Anonymous";
      downloadedImg.onload = function () {
        let context = canvas.getContext("2d");

        canvas.width = downloadedImg.width;
        canvas.height = downloadedImg.height;
      
        context.drawImage(downloadedImg, 0, 0);
      
        try {
          let dataURL = canvas.toDataURL("image/png")
          vm.downloadURI(dataURL, 'signature.png')
        }
        catch(err) {
          console.log("Error: " + err);
        }  
      }
      downloadedImg.src = imageURL;
    },
    downloadURI: function (uri, name) {
      var link = document.createElement('a');
      link.download = name;
      link.href = uri;
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    },





    /** Utils */    
    /**
    * converts an svg string to base64 png using the domUrl
    * @param {string} svgText the svgtext
    * @param {number} [margin=0] the width of the border - the image size will be height+margin by width+margin
    * @param {string} [fill] optionally backgrund canvas fill
    * @return {Promise} a promise to the bas64 png image
    */
    svgToPng: function (svgText, setWidth, setHeight, margin, fill) {
      // convert an svg text to png using the browser
      return new Promise(function(resolve, reject) {
        try {
          // can use the domUrl function from the browser
          var domUrl = window.URL || window.webkitURL || window;
          if (!domUrl) {
            throw new Error("(browser doesnt support this)")
          }
          
          // figure out the height and width from svg text
          var match = svgText.match(/height=\"(\d+)/m);
          var height = match && match[1] ? parseInt(match[1],10) : 412;
          var match = svgText.match(/width=\"(\d+)/m);
          var width = match && match[1] ? parseInt(match[1],10) : 412;
          margin = margin || 0;

          width = parseInt(setWidth);
          height = parseInt(setHeight);
          
          // it needs a namespace
          if (!svgText.match(/xmlns=\"/mi)){
            svgText = svgText.replace ('<svg ','<svg xmlns="http://www.w3.org/2000/svg" ') ;  
          }
          
          // create a canvas element to pass through
          var canvas = document.createElement("canvas");
          canvas.width = width+margin*2;
          canvas.height = height+margin*2;
          var ctx = canvas.getContext("2d");        
          
          // make a blob from the svg
          var svg = new Blob([svgText], {
            type: "image/svg+xml;charset=utf-8"
          });
          
          // create a dom object for that image
          var url = domUrl.createObjectURL(svg);
          
          // create a new image to hold it the converted type
          var img = new Image;
          
          // when the image is loaded we can get it as base64 url
          img.onload = function() {
            // draw it to the canvas
            ctx.drawImage(this, margin, margin);
            
            // if it needs some styling, we need a new canvas
            if (fill) {
              var styled = document.createElement("canvas");
              styled.width = canvas.width;
              styled.height = canvas.height;
              var styledCtx = styled.getContext("2d");
              styledCtx.save();
              styledCtx.fillStyle = fill;   
              styledCtx.fillRect(0,0,canvas.width,canvas.height);
              styledCtx.strokeRect(0,0,canvas.width,canvas.height);
              styledCtx.restore();
              styledCtx.drawImage (canvas, 0,0);
              canvas = styled;
            }
            // we don't need the original any more
            domUrl.revokeObjectURL(url);
            // now we can resolve the promise, passing the base64 url
            resolve(canvas.toDataURL());
          };
          
          // load the image
          img.src = url;
          
        } catch (err) {
          reject('failed to convert svg to png ' + err);
        }
      })
    },
    onSelectSignature: function (index) {
      this.config_val.navtab_selected = index
    },
    getDataURLSign: function () {
      return this.$refs["drawboard-sign"].getDataURL()
    },
    getDataURLInitial: function() {
      return this.$refs["drawboard-initial"].getDataURL()
    },
    getContainerWidth: function (cn) {
      return parseInt(this.$refs[cn].clientWidth) - 50;
    },
    getContainerHeight: function (cn) {
      return parseInt(this.$refs[cn].clientHeight) - 75;
    },
    onSyncLanguage: function(e) {
      this.form_data.language = e

      this.config_val.lang_short = this.form_data.language == 'English' ? 'gb' : this.form_data.language == 'Korean' ? 'kr' : 'jp'
    },
    showSignInitialModal: function () {
      if (!this.form_data.signature_text) {
        this.form_data.signature_text = this.USER.name
        this.form_data.initial = this.USER.first_name.substring(0,1) + this.USER.last_name.substring(0,1)
      }

      this.$refs["create-signature-modal"].show();
    },
    hideSignInitialModal: function () {
      this.clearSForm()
      this.$refs["create-signature-modal"].hide();
    },
    onChangeName() {
      var matches = this.form_data.signature_text.match(/\b(\w)/g); // ['J','S','O','N']
      this.form_data.initial = matches ? matches.join('') : ''; // JSON
    },
    clearSForm() {
      Object.assign(this.$data, this.$options.data.apply(this))
    },
    // Timeout Delay
    onDelay (fn, ms) {
      let timer = 0
      return function(...args) {
        clearTimeout(timer)
        timer = setTimeout(fn.bind(this, ...args), ms || 0)
      }
    }
  },
}
</script>

<style lang="scss" scoped>

</style>