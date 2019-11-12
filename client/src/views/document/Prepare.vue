<template>
  <div class="app flex-row">
    <div class="w-100">
      <div class="d-flex justify-content-between align-items-center">
        <h1>Prepare document</h1>
        <div class="d-flex align-items-center control-actions">
          <b-button variant="outline-primary">
            <UserIcon icon="past_changes.svg" :button="true" />
          </b-button>
          <b-button variant="outline-primary">
            <UserIcon icon="next_changes.svg" :button="true" />
          </b-button>
          <UserSelect
            v-bind:value="percent"
            v-bind:items="['10%','20%', '30%', '50%', '75%','100%', '200%']"
            @changeValue="changePercent"
            class="mb-0 mx-2"
          />
          <draggable
            :list="[{ color: 'black', tool_name: 'Comment', tool_icon: 'fa fa-comment'}]"
            :clone="cloneTool"
            :group="{ name: 'people', pull: 'clone', put: false }"
          >
            <b-button variant="outline-primary">
              <UserIcon icon="comment.svg" :button="true" />
            </b-button>
          </draggable>
        </div>
      </div>
      <hr class="mb-4" />
      <div class="row">
        <div class="col-md-9 pr-3 pr-sm-0 doc-layout">
          <draggable :list="sign_items" class="doc-container" group="people" handle=".move">
            <div v-for="(item, index) in sign_items" :key="index" class="doc-control">
              <div class="doc-item">
                <i class="fa fa-navicon control move"></i>
                <div
                  class="doc-item-control color-signature"
                  v-bind:style="{color: item.color, borderColor: item.color}"
                  :id="`popover-${index}`"
                >
                  <i :class="item.tool_icon" v-if="!item.img_mode" ></i>
                  <UserIcon :icon="item.tool_icon=='stamp_white.svg'?'stamp_brown.svg':(item.tool_icon =='initial_white.svg'?'initial_brown.svg':item.tool_icon)" v-if="item.img_mode" class="mr-2" />
                  <span class="ml-2">{{item.tool_name}}</span>
                </div>
                <i class="fa fa-times-circle-o control" v-on:click="sign_items.splice(index, 1)"></i>
              </div>
            </div>
          </draggable>
          <div class="doc-content w-100 mb-5">
            <pdf :src="viewSrc" class="w-100" :page="viewPage"></pdf>
          </div>
        </div>
        <div class="col-md-3 pl-3">
          <div class="content-container">
            <div class="documents">
              <div class="title">
                <span>DOCUMENTS</span>
                <div class="actions">
                  <i class="fa fa-rotate-left mr-2 clickable-icon"></i>
                  <i class="fa fa-rotate-right mr-2 clickable-icon"></i>
                  <i class="fa fa-trash clickable-icon"></i>
                </div>
              </div>
              <hr />
              <div class="documents-list">
                <div class="document-content">
                  <div class="collapse-header item-title" v-b-toggle.collapse1>
                    <span>Continuous Improvement lorem ipsum sit dollor amet.doc</span>
                    <span class="collapse-icon">
                      <i class="fa fa-caret-down"></i>
                    </span>
                    <!-- <i class="collapse-icon"></i> -->
                  </div>
                  <b-collapse id="collapse1" class="item-pages" visible>
                    <div
                      class="page-content"
                      v-for="i in numPages"
                      :key="i"
                      v-on:click="selectPage(src, i)"
                    >
                      <pdf
                        :src="src"
                        :page="i"
                        class="pdf-content"
                        v-bind:class="i==viewPage?'selected-pdf':''"
                      ></pdf>
                      <div class="page-no">{{i}}</div>
                    </div>
                  </b-collapse>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-between flex-wrap pt-4">
            <button
              class="btn btn-outline-primary min-width-124px my-1"
              v-on:click="moveBackPage()"
            >Back</button>
            <button class="btn btn-primary min-width-124px my-1" v-on:click="moveNextPage()">Next</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import UserIcon from "../../components/UserIcon";
import UserSelect from "../../components/UserSelect";
import pdf from "vue-pdf";
import draggable from "vuedraggable";
export default {
  name: "Prepare",
  components: {
    pdf,
    UserIcon,
    UserSelect,
    draggable
  },
  data() {
    return {
      sign_items: [],
      percent: "50%",
      viewSrc: null,
      viewPage: 0,
      currentPage: 0,
      pageCount: 0,
      src: null,
      numPages: undefined
    };
  },
  mounted() {
    this.src = pdf.createLoadingTask("doc/1.pdf");

    this.src.then(pdf => {
      this.numPages = pdf.numPages;
      this.viewPage = 1;
      this.viewSrc = this.src;
    });
  },
  methods: {
    
    cloneTool(item) {
      this.$emit("dragTool");
      return {
        ...item
      };
    },
    changePercent(e) {
      this.percent = e;
    },
    selectPage(src, no) {
      this.viewPage = no;
      this.viewSrc = src;
    },
    moveNextPage() {
      this.$router.push("/docu-sign/review");
    },
    moveBackPage() {
      this.$router.push("/docu-sign/add-recipients");
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
    }
  }
};
</script>

<style lang="scss">
@import "./Prepare.scss";
</style>

