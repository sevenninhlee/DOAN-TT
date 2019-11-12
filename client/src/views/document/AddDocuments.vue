<template>
  <div class="app flex-row">
    <div class="w-100">
      <h1>Add Documents</h1>
      <hr />
      <FileUpload :prop_files="files" />
      <div class="d-flex justify-content-end pt-4 flex-wrap align-items-center">
        <b-form-checkbox class="m-1">I am the only signer</b-form-checkbox>
        <button class="btn btn-primary min-width-124px m-1" v-on:click="moveNextPage()">Next</button>
      </div>
    </div>
  </div>
</template>

<script>
import FileUpload from "../../components/FileUpload";

export default {
  name: "AddDocument",
  components: {
    FileUpload
  },
  data() {
    return {
      files: []
    };
  },
  methods: {
    moveNextPage() {
      this.$router.push("/docu-sign/add-recipients");
    }
  },
  created() {
    if (this.$route.query.files) {
      this.files = this.$route.query.files;
    } else {
      this.files = null;
    }
  },
  mounted() {}
};
</script>

<style lang="scss">
@import "./AddDocuments.scss";
</style>

