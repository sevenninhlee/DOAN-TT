<template>
  <div class="app flex-row">
    <div class="w-100">
      <div class="d-flex justify-content-between align-items-center">
        <!-- <b-button variant="outline-primary" v-on:click="toggleDoc = !toggleDoc"> -->
        <b-button variant="outline-primary">
          <UserIcon icon="doc_2.svg" :button="true" />
        </b-button>
        <div class="d-flex align-items-center control-actions">
          <b-button variant="outline-primary"  v-on:click="zoom_out()" class="d-none d-sm-inline">
            <UserIcon icon="plus.svg" :button="true"/>
          </b-button>
          <UserSelect
            v-bind:value="percent"
            v-bind:items="zoom_list"
            @changeValue="changePercent"
            class="mb-0 mx-2"
          />
          <b-button variant="outline-primary"  v-on:click="zoom_in()" class="d-none d-sm-inline">
            <UserIcon icon="minus.svg" :button="true" />
          </b-button>
        </div>
        <div class="d-flex align-items-center control-actions">
        
          <b-button variant="outline-primary" class="mx-1 mx-md-2">
            <UserIcon icon="download_3.svg" :button="true" />
          </b-button>
          <b-button variant="outline-primary">
            <i class="fa fa-print clickable-icon top-menu-icon" />
          </b-button>
        </div>
      </div>
      <hr class="mb-4" />
 
      <div class="doc-pan">
        <div class="doc-list" v-bind:class="toggleDoc?'': 'closed'">
          <div class="content-container" v-bind:class="toggleDoc?'': 'd-none'">
            <div class="documents">
              <div class="title">
                <span>{{ $t("docsign.documents") }}</span>
              </div>
              <hr />
              <div class="documents-list">
                <div class="document-content" v-for="(file, key) in documentList.data" :key="key">
                  <div v-if="file.images.length > 0">
                    <div
                      class="collapse-header item-title"
                      v-b-toggle="`document_list_toggle_${key}`"
                    >
                      <span class="title">{{file.document_name}}</span>
                      <span class="collapse-icon">
                        <i class="fa fa-caret-left" />
                      </span>
                    </div>
                  </div>
                  <b-collapse :id="`document_list_toggle_${key}`" class="item-pages" visible v-if="file.images.length > 0">
                    <div
                      class="page-content"
                      v-for="(image, imgKey) in file.images"
                      :key="imgKey"
                    >
                      <div
                        :id="`doc_nav_id_${file.id}_${imgKey}`"
                        class="pdf-content"
                        v-on:click="selectPage(file, numpage(image))"
                      >
                        <div class="loader_img" v-if="pageLoading">
                          <i class="fa fa-spinner fa-spin fa-2x" />
                        </div>
                        <img :src="`${image}`" class="w-100 selected-pdf main_img" />
                      </div>
                      <div class="actionsButton">
                        <div class="page-no pull-right">{{imgKey + 1}}</div>
                      </div>
                    </div>
                  </b-collapse>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="preview-doc" v-bind:class="toggleDoc?'': 'closed'">
          <div class="sign-pan p-4">
            <div class="wrap-list-doc">
              <div v-if="pageLoading" class="pageLoading">
            <i class="fa fa-spinner fa-spin fa-3x" />
          </div>
          <div v-if="!pageLoading" id="document_container">
            <div class="wrap_docs">
              <div
                v-for="(data, key) in pages"
                :key="key"
                :id="`droppable_content_${key + 1}`"
                :data-page_num="key + 1"
                :data-doc_id="data.docId"
                :data-rotate="checkRotate(data, documentList.data[data.pageId])"
                style="position:relative"
                class="droppable_content"
              >
                <div :id="`doc_id_${data.docId}_${data.pageNum}`" class="content-background">
                  <div class="loader_img">
                    <i class="fa fa-spinner fa-spin fa-2x" />
                  </div>
                  <img
                    :src="`${data.image}`"
                    class="w-100 main_img img_zoom"
                    v-bind:class="key==viewPage?'selected-pdf':''"
                  />
                </div>
              </div>
            </div>
          </div>
              <!-- <div class="content-card mb-4 mx-auto" :style="{width: percent}">
                <span >CoffeeSign Envoloped ID: 64343EAB33-C3234-43</span>
                <pdf :src="viewSrc" class="w-100" :page="viewPage"></pdf>
              </div> -->
            </div>
          </div>
          <div class="text-center">
            <b-button variant="link" class="mr-0 mr-sm-5" >Finish later</b-button>
            <b-button variant="other" class="px-2 px-sm-5" v-on:click="finishSign()" >Finish</b-button>
          </div>
        </div>
      </div>


 <b-modal id="sign-agree-modal" ref="sign-agree-modal"
       hide-footer centered size="xl">
      <div class="sign-agree-modal">
        <div class="text-center"><img src="img/icons/agree.svg" /></div>
        <div class="title">Accept all signatures for electronic signatures</div>
        <div class="agree-items"> 
          <div class="agree-item">
            <i class="fa fa-check mr-2"></i>
            <div class="agree-text">
              I agree to the legal validity of electronic signatures and electronic documents.
            </div>            
          </div>
          <div class="agree-item">
            <i class="fa fa-check mr-2"></i>
            <div class="agree-text">
              The electronic document sent after the signing is accepted as original.
            </div>            
          </div>
          <div class="agree-item">
            <i class="fa fa-check mr-2"></i>
            <div class="agree-text">
              We have verified that all signers have the right to have electronic signatures.
            </div>            
          </div>
          <div class="agree-item">
            <i class="fa fa-check mr-2"></i>
            <div class="agree-text">
              I agree in accordance with the Electronic Signature <b-button variant="link">Terms of Use</b-button> and Electronic Signature <b-button variant="link">Privacy Policy</b-button>.
            </div>            
          </div>
        </div>
        <div class="text-center">
          <b-button variant="outline-primary" class="mr-3" v-on:click="cancelAgree()" >Cancel</b-button>
          <button type="submit" class="btn btn-primary" v-on:click="agreeAll()">I agree and sign it</button>
        </div>
      </div>
    </b-modal>
    
    <b-modal id="sign-waiting-modal" ref="sign-waiting-modal" @hide="closeWaitingModal"
       hide-footer hide-header centered size="xl">
      <div class="sign-waiting-modal">
        <img src="img/icons/sand-clock.svg" />
        <div class="title">
          Please wait few minutes <br>
          this process takes 1-3 minutes
        </div>
      </div>
    </b-modal>


  <!-- MODAL STAMP -->
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

        <!-- Create Form -->
        <div>
          <!-- Upload Stamp -->
          <div class="row mb-4">
            <div class="col-lg-2 col-12 pr-lg-1 mb-3 mb-lg-0"></div>
            <div class="col-lg-8 col-12 pr-lg-1 mb-3 mb-lg-0">
              <ImageUpload 
                v-bind:files="stamp_file" 
                v-bind:config_file="({
                  img: 'img/icons/upload.svg',
                  text: $t('signature.modal.uploadStamp')
                })"
                v-on:toggle="toggleSignUpload($event)" 
              />
            </div>
            <div class="col-lg-2 col-12 pr-lg-1 mb-3 mb-lg-0"></div>
          </div>
          <hr />

          <div class="footer">
            <div class="summary">
              <!-- {{ $t('signature.modal.tncSign') }} -->
            </div>
            <div class="buttons">
              <b-button variant="link" v-on:click="hideStampModal">
                <span>
                  <i class="fa fa-close"></i> {{ $t('signature.button.cancel') }}
                </span>
              </b-button>
              <div>
                <b-button variant="primary" v-on:click="onUploadSignInitial">{{ $t('signature.button.create') }}</b-button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </b-modal>
    <!-- END MODAL -->





  <!-- MODAL SIGNATURE -->
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
          <div  class="col-4 pr-0 pr-md-3">
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
          <div  class="col-4 px-2 px-md-3">
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
                    <div class="col-sm-2 col-12 m-auto"></div>
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
                    <div class="col-sm-2 col-12 m-auto"></div>
                   
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
            <div class="col-lg-2 col-12 pr-lg-1 mb-3 mb-lg-0"></div>
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
            <div class="col-lg-2 col-12 pr-lg-1 mb-3 mb-lg-0"></div>
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
            </div>
          </div>
        </div>
      </div>
    </b-modal>
    <!-- END MODAL -->

    </div>
  </div>
</template>

<script>
import "bootstrap/dist/js/bootstrap.min.js";
import "bootstrap-multiselect/dist/css/bootstrap-multiselect.css";

import { mapGetters } from "vuex";
import UserIcon from "../../components/UserIcon";
import UserSelect from "../../components/UserSelect";
import {
  GET_DOCUMENT_REQUEST,
  GET_BLOD_FROM_URL,
  ADD_ANNTATION,
  GET_ANNTATION,
  EDIT_ANNTATION,
  DELETE_ANNTATION,
  ADD_ROTATE_DOCUMENTS,
  ADD_DELETE_DOCUMENTS,
  GET_RECIPIENTS
} from "../../store/modules/document";
import store from "../../store/store";
import { GET_DOCS, AUTH_LOADING } from "../../store/actions.type";
import pdf from "vue-pdf";
import draggable from "vuedraggable";
import { addParamsToBlob, userListDefaultColors } from "../../helpers";
import { prepareTools } from "../../helpers/prepareHandle";
import { svgstyles } from '../../utils/svgstyle'
import { getOutSide } from '../../utils/http'
import JwtService from '../../mixins/jwt.service'
import { signing } from '../../mixins/signing'
import {
  prepareHandle,
  initialPrepare,
  history,
  unredoButton,
  userSideBarHandle,
  addCommentToDocument,
  rotateFunction,
  deleteSuccessHandle
} from "../../helpers/prepareHandle";
import {
  generalDefaultButton,
  addStamp
} from "../../helpers/signHandle";
import config from "../../config/config";
import { EventBus } from "../../config/event-bus";
import DrawingBoard from '../../components/DrawingBoard'
import ImageUpload from '../../components/common/ImageUpload'

export default {
  name: "Prepare",
  components: {
    pdf,
    UserIcon,
    UserSelect,
    draggable,
    DrawingBoard, 
    ImageUpload,
    GenerateSvg: () => import('../../components/common/GenerateSvg')
  },
  computed: {
    ...mapGetters(["addDocument", [GET_DOCUMENT_REQUEST], "getRecipients", 'USER', 'SIGNATURES', 'loading', 'errors'])
  },
  mixins: [signing, svgstyles],
  data() {
    return {
      documentList: [],
      pages: [],
      sign_items: [],
      zoom_list: ['10%','20%', '30%', '50%', '75%','100%', "120%", "150%", "200%"],
      percent: "100%",
      viewSrc: null,
      viewPage: 0,
      currentPage: 0,
      pageCount: 0,
      src: null,
      current_action: '',
      numPages: undefined,
      annotations: [],
      pageLoading: true,
      nextLoading: false,
      commentButtonActive: false,
      recipientsList: [],
      items:[],
      toggleDoc: true,

    // data sign
      signature_img: '',
      annotation_id: '',
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

      stamp_file: [],
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




    };
  },
  mounted() {

    let vm = this;
    let backendUrl = `${config.BASE_URL}`;
    let document_id = vm.$route.query.document_id;
    let recipient_id = this.$route.query.recipient_id;
    vm.pages = [];
    vm.documentList = [];

    $(document).on('click', '.tool-sign', function(){
      let data_tool = JSON.parse($(this).attr("data-tool"))
      console.log("arrt", $(this).attr("data-tool"), data_tool.tool);

      if (data_tool.tool.name == "signature") {
        vm.showSignInitialModal(data_tool.name, data_tool.annotation_id);
      } else if (data_tool.tool.name == "stamp") {
        vm.showStempModal(data_tool.annotation_id);
      } else {
        let position = `position: absolute; z-index: 11; left: ${$(this).css("left")}; top: ${$(this).css("top")}; width: ${$(this).css("width")}; height: ${$(this).css("height")}; `
        $(this).children().remove();
        $(this).replaceWith(`<input type="text" id="input_value_${data_tool.annotation_id}"  placeholder="${data_tool.tool.label}" style="${position}" name="${data_tool.tool.name}">`)
      }
      // this.$refs["create-signature-modal"].show();
      // $('#create-signature-modal').show()
    });

     this.$root.$on('finishSign', () => {
       let array_data = [];
       let annotations_user = this.annotations.filter(v => v.actor_id === Number(recipient_id) && v.type_tools !== 'signature' && v.type_tools !== 'stamp' );
       
       for (let i = 0; i < annotations_user.length; i++) {
         const element = annotations_user[i];
         if (!$(`#input_value_${element.id}`).val()) {
           vm.$toast.warn({
              title: "Signature and input value requied",
              message: "Please check signature and input value!"
            })
            break;
         } else {
          array_data.push( {
           annotation_id: element.id,
           value: $(`#input_value_${element.id}`).val()
          });
         }
       }

       console.log("annotations_user", annotations_user);
       console.log("1111111111", array_data);
       
      // this.openAgreeModal();
    })


  

    store
      .dispatch(GET_DOCS, document_id)
      .then(res => {
        vm.recipientsList = vm.getRecipients;
      })
      .catch(err => {});
    store
      .dispatch(GET_RECIPIENTS, vm.$route.query.document_id)
      .then(res => {
        if (res.status && res.list) {
          vm.items = res.list.map((item, key) => {
            const children = prepareTools.map(tool => tool);
            return {
              ...item,
              color: userListDefaultColors[key],
              icon: "fa fa-user",
              children: children
            };
          });
          
        }
      });
    store.dispatch(GET_ANNTATION, document_id).then(res => {
      if (res.status && res.annotations && res.annotations.length > 0) {
        vm.annotations = res.annotations;
      }
    });

    this.initialFunction(recipient_id);
  },
  methods: {
    initialFunction(recipient_id) {
      let vm = this;
      let backendUrl = `${config.BASE_URL}`;
      let document_id = vm.$route.query.document_id;
      vm.pages = [];
      vm.documentList = [];

      store
        .dispatch(GET_DOCUMENT_REQUEST, { document_id, show_image: 1 })
        .then(res => {
          vm.documentList = vm[GET_DOCUMENT_REQUEST];
          if (
            vm.documentList &&
            vm.documentList.data &&
            vm.documentList.data.length > 0
          ) {
            vm.documentList.data.map((v, docKey) => {
              v.images = v.images &&
                v.images.length > 0 &&
                v.images.filter((img, imgKey) => {
                  let checkPageDelete =
                    v.document_action.length > 0 &&
                    v.document_action.find(
                      ac => ac.page === imgKey + 1 && ac.delete === 1
                    );
                  !checkPageDelete && vm.pages.push({
                    docId: v.id,
                    pageId: docKey,
                    pageNum: this.numpage(img),
                    image: img
                  });   
                  return !checkPageDelete;
                  
                });
            });
            // console.log("1111111111112222", vm.items, vm.annotations );
            
            vm.pageLoading = false;
            initialPrepare(vm.pages);
            generalDefaultButton(vm.annotations, vm.items, recipient_id);

            // general drop
            prepareHandle(
              vm.pages.map((v, key) => key),
              this.recipientsList,
              this.prepareEvent
            );
          }
        // console.log('vm.documentList.data', JSON.stringify( vm.documentList.data[0]))
        // console.log('vm.pages', vm.pages)

        });
      vm.$root.$on("bv::scrollspy::activate", vm.onActivate);
    },
     showSignInitialModal (user_name, annotation_id) {
      this.annotation_id = annotation_id;
      if (!this.form_data.signature_text) {
        this.form_data.signature_text = user_name
        this.form_data.initial = user_name.substring(0,1);
      }

      this.$refs["create-signature-modal"].show();
    },
    showStempModal (annotation_id) {
      this.annotation_id = annotation_id;
      this.$refs["create-stamp-modal"].show();
    },
    hideSignInitialModal: function () {
      // this.clearSForm()
      this.$refs["create-signature-modal"].hide();
    },
    hideStampModal: function () {
      // this.clearSForm()
      this.$refs["create-stamp-modal"].hide();
    },
    clearSForm() {
      Object.assign(this.$data, this.$options.data.apply(this))
    },
    openAgreeModal() {
      this.$refs["sign-agree-modal"].show();
    },
     closeWaitingModal() {
      this.$router.push({ path: '/sign/complition' });
    },
    cancelAgree() {
      this.$refs["sign-agree-modal"].hide();
    },
    agreeAll() {
      this.$refs["sign-agree-modal"].hide();
      this.$refs["sign-waiting-modal"].show();
    },
      finishSign() {
       this.$root.$emit('finishSign')
    },
     onSelectSignature: function (index) {
      this.config_val.navtab_selected = index
    },
     getDataURLSign: function () {
      return this.$refs["drawboard-sign"].getDataURL()
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
     onChangeName() {
      var matches = this.form_data.signature_text.match(/\b(\w)/g); // ['J','S','O','N']
      this.form_data.initial = matches ? matches.join('') : ''; // JSON
    },
     toggleSignUpload: function (e) {
      if (!e) return

      let reader = new FileReader();
      reader.onload = e => this.uploadSignatureComponent = e.target.result
      reader.readAsDataURL(e)
    },
      /** Draw Signature & Initial */
    onDrawSignInitial: function () {
      var vm = this

      let s_image = {
        sign_image: vm.getDataURLSign(),
        annotation_id: vm.annotation_id
      }
      vm.uploadFiles(s_image)
    },
      onUploadSignInitial: function () {
      var vm = this

      let s_image = {
        sign_image: vm.uploadSignatureComponent,
        annotation_id: vm.annotation_id
      }

      vm.uploadFiles(s_image)
    },
      uploadFiles: function (s_image) {
      var vm = this
      store.dispatch(AUTH_LOADING, true)

      vm.uploadStamp(s_image)
        .then(response => {

        let annotation = response.data.data;
        addStamp(annotation);

        vm.$refs["create-signature-modal"].hide();
        this.$refs["create-stamp-modal"].hide();
        store.dispatch(AUTH_LOADING, false)
        vm.drawing_data.signature.drawable=false
        vm.drawing_data.initial.drawable=false
        
      })
      .catch(errors => {
        store.dispatch(AUTH_LOADING, false)
        console.log(errors)
      });
    },
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



          pngBaseSign.then(resultSign => {
              let s_data = {
                annotation_id: vm.annotation_id,
                uploaded_url: resultSign,
              }

              vm.createSignature(s_data)
                .then(response => {
                  let annotation = response.data.data;
                  addStamp(annotation);
                  vm.$refs["create-signature-modal"].hide()
                  store.dispatch(AUTH_LOADING, false)   
                })
          })        
      })
      .catch(errors => {
        store.dispatch(AUTH_LOADING, false)
        console.log(errors)
      })   
    },
      
    deleteHandle(docId, imgUrl) {
      let numPage = this.numpage(imgUrl);
      if(numPage) {
        this.pageLoading = false;
        let sendData = {
          document_id: docId,
          page: numPage,
          delete: 1
        };
        this.$store.dispatch(ADD_DELETE_DOCUMENTS, sendData).then(res => {
          if (res.status) {
            this.pageLoading = true;
            deleteSuccessHandle(docId, numPage);
            this.initialFunction();
          }
        });
      }
    },
    numpage(imgUrl) {
      let arrayImgUrl = imgUrl.split("/").pop();
      return parseInt(arrayImgUrl.split(".")[0].slice(-1));
    },
    checkHasDeletePage(document_action, pageId) {
      let _result =
        document_action.length > 0 &&
        document_action.find(v => v.page === pageId && v.delete === 1);
      return !!_result;
    },
    rotateHandle(location, docId, pageId) {
      let vm = this;

      rotateFunction(location, docId, pageId, sendData => {
        vm.$store.dispatch(ADD_ROTATE_DOCUMENTS, sendData);
      });
    },
    checkRotate(data, document) {
      let getRotate =
        document &&
        document.document_action &&
        document.document_action.length > 0 &&
        document.document_action.find(v => v.page === data.pageNum + 1);
      return getRotate && getRotate.rotate;
    },
    undo() {
      let vm = this;
      let document_id = vm.$route.query.document_id;
      history.undo(vm.annotations);
      if (history && history.restore_state && history.restore_state.id) {
        const annotations_id = history.restore_state.id;
        unredoButton(annotations_id, "undo");
        vm.$store
          .dispatch(EDIT_ANNTATION, { id: annotations_id, display: "none" })
          .then(res => {
            if (res.status && res.annotation_id) {
              vm.$store.dispatch(GET_ANNTATION, document_id).then(res => {
                if (
                  res.status &&
                  res.annotations &&
                  res.annotations.length > 0
                ) {
                  vm.annotations = res.annotations;
                }
              });
            }
          });
      }
    },
    redo() {
      let vm = this;
      let document_id = vm.$route.query.document_id;
      history.redo();
      if (history && history.restore_state && history.restore_state.id) {
        const annotations_id = history.restore_state.id;
        unredoButton(annotations_id, "redo");
        vm.$store
          .dispatch(EDIT_ANNTATION, { id: annotations_id, display: "block" })
          .then(res => {
            if (res.status && res.annotation_id) {
              vm.$store.dispatch(GET_ANNTATION, document_id).then(res => {
                if (
                  res.status &&
                  res.annotations &&
                  res.annotations.length > 0
                ) {
                  vm.annotations = res.annotations;
                }
              });
            }
          });
      }
    },
    commentsHandle() {
      addCommentToDocument(
        this.pages.map((v, key) => key),
        this.recipientsList,
        this.prepareEvent
      );
    },
    changePercent(e) {
      this.percent = e;
      this.changeZoom(e);
    },
    changeZoom(e){
      var zoomScale = Number(parseInt(e.replace("%", ""))) / 100;
      for (
        var i = 0;
        i < document.getElementsByClassName("droppable_content").length;
        i++
      ) {
        this.setZoom(
          zoomScale,
          document.getElementsByClassName("droppable_content")[i]
        );
      }
    },
    setZoom(zoom, el) {
      var transformOrigin = [0, 0];
      el = el || instance.getContainer();
      var p = ["webkit", "moz", "ms", "o"],
        s = "scale(" + zoom + ")",
        oString =
          transformOrigin[0] * 100 + "% " + transformOrigin[1] * 100 + "%";

      for (var i = 0; i < p.length; i++) {
        el.style[p[i] + "Transform"] = s;
        el.style[p[i] + "TransformOrigin"] = oString;
      }

      el.style["transform"] = s;
      el.style["transformOrigin"] = oString;
      el.style["height"] = "auto";
      el.childNodes[0].style["height"] = "auto";
    },
    zoom_out() {
      this.percent_no = this.zoom_list.indexOf(this.percent);
      if(this.percent_no<8){
        this.percent_no++;
      }
      this.percent = this.zoom_list[this.percent_no];
      this.changeZoom(this.percent);
    },
    zoom_in() {
      this.percent_no = this.zoom_list.indexOf(this.percent);
      if(this.percent_no>0){
        this.percent_no--;
      }
      this.percent = this.zoom_list[this.percent_no];
      this.changeZoom(this.percent);
    },
    onActivate(target) {
      // console.log("target", target);
    },
    selectPage(data, imgKey) {
      let scrollId = `doc_id_${data.id}_${imgKey}`;
      var scrollTo = document.getElementById(scrollId);
      scrollTo.scrollIntoView();
    },
    moveNextPage() {
      if (!this.checkUserTool()) {
        this.$awn.alert("Add at least 1 tool", {
          position: "bottom-left",
          labels: {
            alert: "Danger Message"
          }
        });
        return false;
      }
      this.nextLoading = true;
      this.$router.push(
        "/docu-sign/review?document_id=" + this.$route.query.document_id
      );
    },
    checkUserTool() {
      return $(`div[id^='droppable_content_'] .user-drag`).length > 0;
    },
    moveBackPage() {
      this.$router.push(
        "/docu-sign/add-recipients?document_id=" + this.$route.query.document_id
      );
    },
    addRecipient() {
      this.recipients.push({
        sign_type: "Need to sign",
        com_type: false,
        name: "",
        email: "",
        set_password: false,
        password: "",
        confirm_password: ""
      });
    },
    removeRecipient(index) {
      this.recipients.splice(index, 1);
    },
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
    prepareEvent(data, element) {
      const vm = this,
        document_id = vm.$route.query.document_id;
      let sendData = data.send_data;
      sendData.annotation_id = document_id;
      data.annotation_id && (sendData.id = data.annotation_id);

      var checkElemnts = $(".tool-sign:hidden");
      vm.$store.dispatch(ADD_ANNTATION, sendData).then(res => {
        let get_annotation_id = element.data("annotation_id");
        if (res.status && res.annotation_id && !get_annotation_id) {
          if (
            !sendData.id &&
            history.redo_list &&
            history.redo_list.length > 0
          ) {
            history.redo_list.map((val, key) => {
              let annotation_id = val.id;
              vm.$store.dispatch(DELETE_ANNTATION, annotation_id).then(res => {
                checkElemnts[key].remove();
              });
            });
          }
          element.attr("data-annotation_id", res.annotation_id);
          element.addClass("tool-sign tool_sign_" + res.annotation_id);
        }
        if (sendData.text && sendData.recipient_arr) {
          element.popover("hide");
          element.css("opacity", 0.5);
        }
        vm.$store.dispatch(GET_ANNTATION, document_id).then(res2 => {
          if (res2.status && res2.annotations && res2.annotations.length > 0) {
            vm.annotations = res2.annotations;
          }
        });
      });
    }
  },
  created() {}
};
</script>

<style lang="scss">
@import "./Signing.scss";
@import "../signaturestamp/Signature.scss";
</style>

