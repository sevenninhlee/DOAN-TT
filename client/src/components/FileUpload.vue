<template>
  <div class="w-100">
    <div class="drag-drop-container" v-bind:class="{'drag-has-file':files.length>0}">
      <form ref="fileform" class="drag-drop-div" v-bind:class="{'has-files':files.length>0}">
        <span v-on:click="openBrows()">
          <UserIcon icon="folder.svg" class="folder-2" />
        </span>
        <input type="file" ref="file" style="display: none" @change="onFileChange" />
        <div v-bind:class="{'has-file-upload-type':files.length>0}">
          <div class="drag-a-file" v-bind:class="{'has-file':files.length>0}">
            Drag or
            <span
              class="text-style-1 clickable-text"
              v-on:click="openBrows()"
            >browse</span>
            a file to upload
          </div>
          <div
            class="you-can-use"
            v-bind:class="{'text-left-align':files.length>0}"
          >Or you can use one of the following options:</div>
        </div>
        <div class="store-src" v-bind:class="{'none-top-margin':files.length>0}">
          <UserIcon icon="dropbox.svg" class="store-src-item" />
          <UserIcon icon="google-drive.svg" class="store-src-item" />
          <UserIcon icon="onedrive.svg" class="store-src-item" />
          <UserIcon icon="box.svg" class="store-src-item" />
        </div>
        <div
          class="you-can-use"
          v-bind:class="{'you-can-use-has-file':files.length>0}"
        >Or you can use your templates</div>
        <b-button
          variant="outline-primary"
          style="min-width:153px;margin-top: 10px;"
          :class="{'none-top-margin':files.length > 0}"
        >Go to My Templates</b-button>
      </form>
    </div>
    <div class="file-list">
      <div v-for="(file, index) in files" :key="index" class="file-listing">
        <div class="file-content">
          <img v-bind:src="getFileType(file.name)" class="folder-2" />
          <div class="file-info ml-3">
            <div class="doc-file-name">{{ file.name }}</div>
            <div class="doc-file-info">5 pages</div>
          </div>
        </div>
        <div class="file-control">
          <i class="fa fa-ellipsis-h fa-lg mr-4"></i>
          <!-- <i class="cui-trash icons"></i> -->
          <UserIcon icon="delete.svg" :button="true"></UserIcon>
        </div>
      </div>
      <div v-if="files.length>0">
        <div class="file-listing w-100">
          <div class="file-content w-100">
            <img v-bind:src="getFileType(files[0].name)" class="folder-2" />
            <div class="file-info ml-3 w-100">
              <div class="doc-file-name">168 KB of 378 KB (56% Done)</div>
              <div class="text-right">
                <i class="cui-circle-x icons" style="font-size:18px"></i>
                <b-progress :value="56" :max="100" class="mt-1"></b-progress>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import UserIcon from "./UserIcon";
export default {
  name: "FileUpload",
  components: {
    UserIcon
  },
  props: {
    prop_files: Object
  },
  data() {
    return {
      dragAndDropCapable: false,
      files: []
    };
  },
  methods: {
    getFileType(fileName) {
      return "img/icons/" + fileName.substr(fileName.length - 3) + ".svg";
    },
    determineDragAndDropCapable() {
      var div = document.createElement("div");
      return (
        ("draggable" in div || ("ondragstart" in div && "ondrop" in div)) &&
        "FormData" in window &&
        "FileReader" in window
      );
    },
    onFileChange(e) {
      var files = e.target.files || e.dataTransfer.files;

      this.addFiles(files);
    },
    addFiles(files) {
      if (!files || !files.length) return;
      if (this.$route.path.indexOf("landing")) {
        this.$router.push({
          path: "/docu-sign/add-document",
          query: { withoutModal: true, files: files }
        });
      }
      for (let i = 0; i < files.length; i++) {
        this.files.push(files[i]);
      }
    },
    openBrows() {
      this.$refs.file.click();
    }
  },
  mounted() {
    this.addFiles(this.prop_files);

    this.dragAndDropCapable = this.determineDragAndDropCapable();
    if (this.dragAndDropCapable) {
      [
        "drag",
        "dragstart",
        "dragend",
        "dragover",
        "dragenter",
        "dragleave",
        "drop"
      ].forEach(
        function(evt) {
          this.$refs.fileform.addEventListener(
            evt,
            function(e) {
              e.preventDefault();
              e.stopPropagation();
            }.bind(this),
            false
          );
        }.bind(this)
      );

      this.$refs.fileform.addEventListener(
        "drop",
        function(e) {
          this.addFiles(e.dataTransfer.files);
        }.bind(this)
      );
    }
  }
};
</script>
<style lang="scss">
@import "./FileUpload.scss";
</style>
