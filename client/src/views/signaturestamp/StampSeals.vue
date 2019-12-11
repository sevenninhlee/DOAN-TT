<template>
  <div class="px-sm-1 px-2">
    <!-- HEADER -->
    <div class="row px-1">
      <div class="col-12 px-1">
        <div class="content-card">
          <div class="content">
            <div class="d-flex align-items-center">
              <img src="img/icons/stamp.svg" />
              <div class="ml-3">
                <div class="header">{{ $t("signature.headerStamp") }}</div>
                <div class="comments">{{ $t('signature.commentStamp') }}</div>
              </div>
            </div>
            <b-button variant="primary" v-on:click="showStampModal">{{ $t('signature.button.addStamp') }}</b-button>
          </div>
        </div>
      </div>
    </div>
    <!-- END HEADER -->

    <!-- LISTING STAMPS -->
    <div class="row px-1">
      <div class="col-sm px-1" v-for="stamp in STAMPS" :key="stamp.id">
        <div class="stamp-related">
        <div class="content-card signatures px-md-3 px-2">          
          <!-- List here -->
          <div class="listing-stamp sign-result" style="overflow: hidden;">
            <img :src="stamp.uploaded_url" alt="Uploaded Image" style="width: auto; height: 120px;" />
          </div>

          <!--
          <Stamp v-else 
            v-bind:key="stamp.id" 
              :keyItem="stamp.id" 
              :paramStamp="({
                stamp_type: stamp.stamp_type,
                stamp_title: stamp.title,
                stamp_text: stamp.text,
                font_face: stamp.font_face,
                font_size: stamp.font_size,
                uploaded_url: stamp.uploaded_url,
                etc: {
                  position: '',
                  company: ''
                }
              })"
              :configStamp="({
                language: stamp.language,
                str_length: '',
                display_name: ''
              })"
              :classChecked="''" 
              :btnClickHandler="() => { return }"
          />
          -->

          <div class="actions">
            <div class="action clickable-icon" v-on:click="onDefaultStamp(stamp.id)">
              <i class="fa fa-pencil pr-2"></i> {{ $t('signature.button.setdefault') }}
            </div>
            <div class="action clickable-icon" v-on:click="onDownloadStamp(stamp.uploaded_url)">
              <i class="fa fa-download pr-2"></i> {{ $t('signature.button.download') }}
            </div>
            <div class="action clickable-icon" v-on:click="onDeleteStamp(stamp.id)">
              <i class="fa fa-trash pr-2"></i> {{ $t('signature.button.delete') }}
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
    <!-- END LISTING STAMPS -->
    
    <!-- MODAL -->
    <b-modal 
      id="create-stamp-modal" 
      ref="create-stamp-modal" 
      hide-footer size="xl" 
      :no-close-on-backdrop="true" 
      :no-close-on-esc="true"
      :hide-header-close="true">
      <div class="create-signature-modal">
        <div class="title">
          {{ $t('signature.modal.titleStamp') }}
        </div>
        <!-- Tab Menu -->
        <div class="row mb-md-4 mb-2">
          <div class="col-4 pr-0 pr-md-3">
            <b-button
              class="stamp-tab-nav"
              :variant="config_val.navtab_index == 'Personnel' ? 'primary' : 'outline-primary'"
              v-on:click="onSyncTab('Personnel')" 
              block
            >
              {{ $t('signature.modal.tab.personnelSeal') }}
            </b-button>
          </div>
          <!-- <div class="col-4 px-2 px-md-3">
            <b-button
              class="stamp-tab-nav"
              :variant="config_val.navtab_index == 'Corporate' ? 'primary' : 'outline-primary'"
              v-on:click="onSyncTab('Corporate')"
              block
            >
              {{ $t('signature.modal.tab.corporateSeal') }}
            </b-button>
          </div> -->
          <div class="col-4 pl-0 pl-md-3">
            <b-button
              class="stamp-tab-nav"
              :variant="config_val.navtab_index == 'Upload' ? 'primary' : 'outline-primary'"
              v-on:click="onSyncTab('Upload')"
              block
            >
              {{ $t('signature.modal.tab.upload') }}
            </b-button>
          </div>
        </div>
        <!-- End Tab Menu -->
        
        <!-- Generate Stamp Seal -->
        <div>
          <div class="row mb-4" v-if="config_val.navtab_index == 'Personnel'">
            <div class="col px-sm-3 px-1">
              <hr />
              <!-- Forms -->
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
                <!-- Select Title -->
                <div class="col-lg-2 col-sm-3 col-4 px-lg-1 pr-1" hidden>
                  <UserSelect
                    v-bind:value="form_data.title"
                    v-bind:items="['Mr', 'Mrs', 'Ms', 'Miss', 'Dr', 'Prof']"
                    v-model="form_data.title"
                    @changeValue="form_data.title = $event"
                  />
                </div>
                <!-- Input Name -->
                <div class="col-lg-8 col-12 px-lg-1 px-auto">
                  <div class="form-group">
                    <input
                      type="text"
                      :class="{
                        'form-control': true,
                        'input-invalid': (form_data.language == 'English' ? (form_data.stamp_text.length >= 25) : (form_data.stamp_text.length >= 9)),
                        'input-valid': (form_data.language == 'English' ? (form_data.stamp_text.length < 25) : (form_data.stamp_text.length < 9))
                      }"
                      id="stamp_text"
                      name="stamp_text"
                      v-model="form_data.stamp_text"
                      :placeholder="$t('signature.modal.placeholderStamp')"
                      :maxlength="form_data.language == 'English' ? 25 : 9"
                      @changeValue="form_data.stamp_text = $event"
                      v-on:keyup="onValidateInput"
                    />
                    <p v-if="validator.isError" class="validation-error text-left pl-2">
                      {{validator.text}}
                    </p>
                  </div>
                </div>

                <!-- Generate Button -->
                <div class="col-lg-2 col-12 pl-lg-1">
                  <b-button variant="primary" block v-on:click="onGenerateStamp">{{ $t('signature.button.generate') }}</b-button>
                </div>
              </div>

              <!-- Generated Stamp Seal -->              
              <div class="stamp-related">
                <div class="signatures px-2 scroll-box">
                  <div v-if="generate_data.length" class="row">
                    <div class="col-lg-4 col-12 my-3" 
                      v-bind:key="index"
                      v-for="(item, index) in generate_data">
                      <div 
                        :class="{
                          'listing-stamp sign-result': true,
                          'checked': index == config_val.navtab_selected
                        }"
                        @click="config_val.navtab_selected = index"
                      >
                        <GenerateStampSvg
                          ref="generatedPers"
                          :paramsData="{
                            idData: index,
                            type: 'Personnel',
                            text: item.stamp_text,
                            lang: item.language == 'English' ? 'gb' : item.language == 'Korean' ? 'kr' : 'jp'
                          }" 
                        />

                      <!--
                        <span class="p-2" ref="generatedPers">
                          <Stamp
                            v-bind:key="index"
                            :paramStamp="item"
                            :configStamp="{
                              language: item.language == 'English' ? 'gb' : item.language == 'Korean' ? 'kr' : 'jp'
                            }"
                            :classChecked="(index == config_val.navtab_selected?'checked':'')" :btnClickHandler="() => {config_val.navtab_selected = index}"
                          />
                        </span>
                      -->
                        
                        <div v-if="index == config_val.navtab_selected" class="check-box text-left">
                          <img src="img/icons/check-2.svg" />
                        </div>
                      </div>


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-4" v-else-if="config_val.navtab_index == 'Corporate'">
            <div class="col px-sm-3 px-1">
              <hr />
              <!-- Forms -->
              <div class="row mb-1">
                <!-- Select Language -->
                <div class="col-lg-2 col-md-4 pr-md-1">
                  <UserSelect
                    v-bind:value="form_data.language"
                    v-bind:items="['English', 'Korean', 'Japanese']"
                    v-model="form_data.language"
                    @changeValue="onSyncLanguage"
                  />
                </div>
                <!-- Input Name -->
                <div class="col-md pl-md-1">
                  <div class="form-group">
                    <input
                      type="text"
                      :class="{
                        'form-control': true,
                        'input-invalid': (form_data.language == 'English' ? (form_data.stamp_text.length >= 25) : (form_data.stamp_text.length >= 9)),
                        'input-valid': (form_data.language == 'English' ? (form_data.stamp_text.length < 25) : (form_data.stamp_text.length < 9))
                      }"
                      id="stamp_text"
                      name="stamp_text"
                      v-model="form_data.stamp_text"
                      :placeholder="$t('signature.modal.placeholderStamp')"
                      :maxlength="form_data.language == 'English' ? 25 : 9"
                      @changeValue="form_data.stamp_text = $event"
                      v-on:keyup="onValidateInput"
                    />
                    <p v-if="validator.isError" class="validation-error text-left pl-2">
                      {{validator.text}}
                    </p>
                  </div>
                </div>

                <!-- Generate Button -->
                <div class="col-lg-2 col-12 pl-lg-1">
                  <b-button variant="primary" block v-on:click="onGenerateStamp">{{ $t('signature.button.generate') }}</b-button>
                </div>
              </div>

              <!-- Generated Stamp Seal -->
              <div class="stamp-related">
                <div class="signatures px-2 scroll-box">
                  <div v-if="generate_data.length" class="row">
                    <div class="col-lg-4 col-12 my-3" 
                      v-bind:key="index"
                      v-for="(item, index) in generate_data">
                      <div 
                        :class="{
                          'listing-stamp sign-result': true,
                          'checked': index == config_val.navtab_selected
                        }"
                        @click="config_val.navtab_selected = index"
                      >
                      
                        <GenerateStampSvg
                          ref="generatedCorp"
                          :paramsData="{
                            idData: index,
                            type: 'Corporate',
                            text: item.stamp_text,
                            lang: item.language == 'English' ? 'gb' : item.language == 'Korean' ? 'kr' : 'jp'
                          }" 
                        />
                      
                      <!--
                        <span class="p-2" ref="generatedCorp">
                          <Stamp
                            v-bind:key="index"
                            :paramStamp="item"
                            :configStamp="{
                              language: item.language == 'English' ? 'gb' : item.language == 'Korean' ? 'kr' : 'jp'
                            }"
                            :classChecked="(index == config_val.navtab_selected?'checked':'')" :btnClickHandler="() => {config_val.navtab_selected = index}"
                          />
                        </span>
                      -->

                        <div v-if="index == config_val.navtab_selected" class="check-box text-left">
                          <img src="img/icons/check-2.svg" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Upload Stamp -->
          <div class="row mb-4" v-else>
            <div class="col">
              <hr />
              <!-- Forms -->
              <ImageUpload 
                v-bind:files="stamp_file" 
                v-bind:config_file="({
                  img: 'img/icons/upload.svg',
                  text: $t('signature.modal.uploadStamp')
                })"
                v-on:toggle="toggleStampUpload($event)" 
              />
            </div>
          </div>
        
          <hr />

          <div class="footer">
            <div class="summary">
              {{ $t('signature.modal.tncStamp') }}
            </div>
            <div class="buttons">
              <b-button variant="link" v-on:click="hideStampModal">
                <span>
                  <i class="fa fa-close"></i> {{ $t('signature.button.cancel') }}
                </span>
              </b-button>

              <div v-if="config_val.navtab_index != 'Upload'">
                <b-button variant="primary" v-on:click="onCreateStamp">{{ $t('signature.button.create') }}</b-button>
              </div>
              <div v-else>
                <b-button variant="primary" v-on:click="onUploadStamp">{{ $t('signature.button.create') }}</b-button>
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
import { html2canvas } from 'vue-html2canvas'
import axios from 'axios'
import store from '../../store/store'
import { mapGetters, mapState } from 'vuex'
import { stampseal } from '../../mixins/stampseal'
import { svgstyles } from '../../utils/svgstyle'
import Stamp from '../../components/common/Stamp'
import UserSelect from '../../components/UserSelect'
import ImageUpload from '../../components/common/ImageUpload'
import CustomLoader from '../../components/common/CustomLoader'
import { 
  STAMP_GET, 
  STAMP_CREATE,
  STAMP_UPLOAD,
  STAMP_UPDATE, 
  STAMP_SOFTDELETE, 
  SIGNATURE_DESTROY, 
  AUTH_LOADING 
} from '../../store/actions.type'
import GenerateStampSvg from '../../components/common/GenerateStampSvg'

export default {
  name: 'StampSeals',
  components: {
    UserSelect, ImageUpload,
    Stamp, GenerateStampSvg
  },
  mixins: [stampseal, svgstyles],
  data() {
    return {
      user_selected_stamp: 0,
      user_stamp: '',

      form_data: {
        stamp_type: 'Personnel',
        title: 'Mr',
        stamp_text: '',
        font_face: '',
        font_size: '',
        language: 'English',
        uploaded_url: ''
      },
      s_data: {
        stamp_type: 'Personnel',
        title: '',
        text: '',
        font_face: '',
        font_size: '',
        language: 'English',
        uploaded_url: ''
      },
      generate_data: [],
      generate_img: '',

      stamp_file: [],
      uploadStampImg: {},

      validator: {
        isError: false,
        text: ''
      },

      config_val: {
        navtab_index: 'Personnel',
        navtab_selected: 0,
        lang_short: 'gb',
        languages: {
          /** English */
          English: ["Mrs Saint Delafield", "Badhead Typeface", "Banthers", "Connoisseurs", "Cutepunk_Regular", "Elrotex Basic", "GreatVibes-Regular", "KLSweetPineappleRegular", "Mightype Script", "pops_08_REGULAR", "somethingwild-Regular"],
          /** Korean */
          Korean: ["KimNamyun", "KCC-eunyoung", "Goyang", "SangSangFlowerRoad", "InkLipquid", "Dovemayo-Medium", "SDMiSaeng", "HSGyoulnoonkot", "Jeju Hallasan"],
          /** Japanese */
          Japanese: ["crayon_1-1", "RiiPopkkR", "RiiT_F", "sjis_sp_setofont", "GenEiLateGoN_v2", "GenEiAntiquePv5-M"]
        },
        fontsize: {
          // English
          English: ["26", "29", "19", "29", "29", "14", "21", "29", "19", "18", "29"],
          // Korean
          Korean: ["27", "33", "22", "31", "30", "21", "34", "19", "21"],
          // Japanese
          Japanese: ["22", "18", "20", "21", "20", "20"]
        }
      }
    }
  },
  computed: {
    ...mapGetters(['USER', 'STAMPS', 'loading', 'errors'])
  },
  mounted() {
    var vm = this

    vm.getStamps()
      .then(response => {
        store.dispatch(STAMP_GET, response.data.data)
      })
      .catch(errors => {
        console.log(errors.response)
      });
  },
  methods: {
    /** Create Personnel Stamp */
    onCreateStamp: function () { 
      var vm = this

      store.dispatch(AUTH_LOADING, true)

      
      vm.fontface()
        .then(response => {          
          var width = 562,
            height = vm.generate_data[vm.config_val.navtab_selected].language == 'English' ? '412' : '562'
            pngBaseStamp

          if (vm.config_val.navtab_index == 'Personnel') {
            // append style in svg
            let defs = vm.$refs["generatedPers"][vm.config_val.navtab_selected].$refs["childStampSvg"].children["2"],
                styles = document.createElementNS("http://www.w3.org/2000/svg", "style"),
                node = document.createTextNode(response);              
            defs.appendChild(styles);
            styles.appendChild(node);

            let svgNode = vm.$refs["generatedPers"][vm.config_val.navtab_selected].$refs.childStampSvg,
              sStamp = new XMLSerializer().serializeToString(svgNode)

            var pngBaseStamp = this.svgToPng(sStamp, width, height, 10)
          }
          else {
            // append style in svg
            let defs = vm.$refs["generatedCorp"][vm.config_val.navtab_selected].$refs["childStampSvg"].children["2"],
                styles = document.createElementNS("http://www.w3.org/2000/svg", "style"),
                node = document.createTextNode(response);              
            defs.appendChild(styles);
            styles.appendChild(node);

            let svgNode = vm.$refs["generatedCorp"][vm.config_val.navtab_selected].$refs.childStampSvg,
              sStamp = new XMLSerializer().serializeToString(svgNode)
          
            var pngBaseStamp = this.svgToPng(sStamp, width, height, 10)
          }

          pngBaseStamp.then(response => {
            let getGenerated = vm.generate_data[vm.config_val.navtab_selected],
              shortformLang = getGenerated.language == 'English' ? 'gb' : getGenerated.language == 'Korean' ? 'kr' : 'jp'

            vm.s_data = {
              stamp_type: getGenerated.stamp_type,
              title: getGenerated.title,
              stamp_text: getGenerated.stamp_text,
              font_face: getGenerated.font_face,
              font_size: getGenerated.font_size,
              language: shortformLang,
              uploaded_url: response
            }

            vm.createStamp(vm.s_data)
              .then(response => {
                store.dispatch(STAMP_CREATE, response.data.data)
                  .then(() => {
                    vm.$toast.success({
                      title: "Stamp Created",
                      message: "User's stamp have created!"
                    });

                    vm.$refs["create-stamp-modal"].hide();
                    store.dispatch(AUTH_LOADING, false)
                  })
              })
          })      
      })
      .catch(error => {
        store.dispatch(AUTH_LOADING, false)
        console.log(error)
      })
    },

    /** Upload Stamp */
    toggleStampUpload: function (e) {
      if (!e) return

      let reader = new FileReader();
      reader.onload = e => this.uploadStampImg = e.target.result
      reader.readAsDataURL(e)
    },
    onUploadStamp: function () {
      var vm = this
      
      store.dispatch(AUTH_LOADING, true)

      let s_image = {
        image: this.uploadStampImg
      }

      vm.uploadStamp(s_image)
        .then(response => {
          store.dispatch(STAMP_UPLOAD, response.data.data)
            .then(() => {
              vm.$toast.success({
                title: "Stamp Uploaded",
                message: "User's stamp have uploaded!"
              });

              vm.$refs["create-stamp-modal"].hide();
              store.dispatch(AUTH_LOADING, false)
            })
        })
        .catch(errors => {
          store.dispatch(AUTH_LOADING, false)
          console.log(errors)
        })
    },

    /** Show Stamp */
    onShowStamp: function () { },

    /** Update Stamp */
    onDefaultStamp: function (id) {
      var vm = this

      store.dispatch(AUTH_LOADING, true)

      vm.defaultStamp(id)
        .then(response => {
          store.dispatch(STAMP_UPDATE, response.data.data)
            .then(() => {
              vm.$toast.success({
                title: "Stamp Default",
                message: "User's stamp have set to default!"
              })
              
              store.dispatch(AUTH_LOADING, false)
            })
        })
        .catch(errors => {
          store.dispatch(AUTH_LOADING, false)
          console.log(errors)
        })      
    },

    /** Delete Stamp */
    onDeleteStamp: function (id) { 
      var vm = this

      if (confirm("Do you really want to delete?")) {
        store.dispatch(AUTH_LOADING, true)

        vm.softDeleteStamp(id)
          .then(response => {
            store.dispatch(STAMP_SOFTDELETE, id)
              .then(() => {
                vm.$toast.warn({
                  title: "Stamp Deleted",
                  message: "User's stamp seal have deleted!"
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

    /** Download Stamp */
    onDownloadStamp: function (url) {
      let vm = this,
          imageURL = url, 
          canvas = document.createElement("canvas"),
          downloadedImg = new Image

      downloadedImg.crossOrigin = "Anonymous";
      downloadedImg.onload = function () {
        let context = canvas.getContext("2d");

        canvas.width = downloadedImg.width;
        canvas.height = downloadedImg.height;
      
        context.drawImage(downloadedImg, 0, 0);
      
        try {
          let dataURL = canvas.toDataURL("image/png")
          vm.downloadURI(dataURL, 'stamp.png')
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
          var height = match && match[1] ? parseInt(match[1],10) : 100;
          var match = svgText.match(/width=\"(\d+)/m);
          var width = match && match[1] ? parseInt(match[1],10) : 400;
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

    onGenerateStamp: async function () {
      var vm = this
      
      store.dispatch(AUTH_LOADING, true)
      
      // Clear old generated_data
      vm.generate_data.splice(0, vm.generate_data.length)
      vm.config_val.navtab_selected = 0
      await vm.$nextTick() // wait to clear

      let lang = vm.form_data.language
      let langFace = vm.config_val.languages[lang]
      let langSize = vm.config_val.fontsize[lang]

      langFace.forEach((face, index) => {
          let generate = {
            stamp_type: vm.config_val.navtab_index,
            title: vm.form_data.title,
            stamp_text: vm.form_data.stamp_text,
            font_face: face,
            font_size: langSize[index],
            language: lang,
            uploaded_url: '',
            etc: {
              position: '',
              company: ''
            }
          }
          vm.generate_data.push(generate)
        })
      
      store.dispatch(AUTH_LOADING, false)
    },
    onSyncLanguage: function(e) {
      this.form_data.language = e

      this.config_val.lang_short = this.form_data.language == 'English' ? 'gb' : this.form_data.language == 'Korean' ? 'kr' : 'jp'
    },
    onSyncTab : function (e) {
      this.config_val.navtab_index = e

      this.clearGenerated()
    },
    onValidateInput: function () {
      if (this.form_data.language == 'English') {
        if (this.form_data.stamp_text.length >= 25) {
          this.validator.isError = true
          this.validator.text = 'Only can generate less than 25 characters'
        }
        else {
          this.validator.isError = false
          this.validator.text = ''
        }  
      }
      else if (this.form_data.language == 'Korean' || this.form_data.language == 'Japanese') {
        if (this.form_data.stamp_text.length >= 9) {
          this.validator.isError = true
          this.validator.text = 'Only can generate less than 9 characters'
        }
        else {
          this.validator.isError = false
          this.validator.text = ''
        }
      }
      else {
        this.validator.isError = false
        this.validator.text = ''
      }      
    },
    showStampModal: function () {
      this.$refs["create-stamp-modal"].show()  
    },
    hideStampModal: function () {
      this.$refs["create-stamp-modal"].hide()
      this.clearGenerated()
    },
    clearSForm() {
      Object.assign(this.$data, this.$options.data.apply(this))
    },
    clearGenerated() {
      this.config_val.navtab_selected = 0
      this.form_data.stamp_text = ''

      this.generate_data.splice(0, this.generate_data.length)
    },
    // Timeout Delay
    onDelay (fn, ms) {
      let timer = 0
      return function(...args) {
        clearTimeout(timer)
        timer = setTimeout(fn.bind(this, ...args), ms || 0)
      }
    }
  }
}
</script>

<style lang="scss">
.scroll-box {
  max-height: 350px;
  overflow-y: auto;
  overflow-x: hidden;
}
</style>