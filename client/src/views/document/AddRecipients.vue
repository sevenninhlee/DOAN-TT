<template>
  <div class="app flex-row">
    <div class="w-100">
      <h1>Add Recipients</h1>
      <hr class="mb-4" />
      <div class="row">
        <div class="col-md-9">
          <div class="recipient" v-for="(recipient, index) in recipients" :key="index">
            <div class="recipient-head">
              <span class="name">RECIPIENT #{{index+1}}</span>
              <span v-on:click="removeRecipient(index)">
                <UserIcon icon="delete.svg" :button="true" />
              </span>
            </div>
            <div class="row">
              <div class="col-md-6">
                <ul class="user-custom-select">
                  <HeaderDropdown>
                    <template slot="header">
                      <i class="fa" :class="getTypeIcon(recipient.sign_type)"></i>
                      {{recipient.sign_type}}
                    </template>
                    <template slot="dropdown">
                      <b-dropdown-item v-on:click="recipient.sign_type = 'Needs to Sign'">
                        <i class="fa fa-pencil"></i> Needs to Sign
                      </b-dropdown-item>
                      <b-dropdown-item v-on:click="recipient.sign_type = 'Receives a Copy'">
                        <i class="fa fa-cc"></i> Receives a Copy
                      </b-dropdown-item>
                      <b-dropdown-item v-on:click="recipient.sign_type = 'Needs to View'">
                        <i class="fa fa-eye"></i> Needs to View
                      </b-dropdown-item>
                    </template>
                  </HeaderDropdown>
                </ul>
              </div>
              <div class="col-md-6">
                <b-form-group>
                  <b-button
                    :variant="recipient.com_type?'primary':'outline-primary'"
                    class="w-50"
                    :pressed.sync="recipient.com_type"
                  >Send email</b-button>
                  <b-button
                    :variant="!recipient.com_type?'primary':'outline-primary'"
                    class="w-50"
                    :pressed.sync="recipient.com_type"
                  >Kakao Talk</b-button>
                </b-form-group>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <b-form-group>
                  <b-input-group>
                    <b-input-group-prepend>
                      <b-input-group-text>
                        <i class="fa fa-user"></i>
                      </b-input-group-text>
                    </b-input-group-prepend>
                    <b-form-input type="text" placeholder="Recipient Name*"></b-form-input>
                  </b-input-group>
                </b-form-group>
              </div>
              <div class="col-md-6">
                <div v-if="recipient.com_type">
                  <b-form-group>
                    <b-input-group>
                      <b-input-group-prepend>
                        <b-input-group-text>
                          <i class="fa fa-envelope"></i>
                        </b-input-group-text>
                      </b-input-group-prepend>
                      <b-form-input type="email" placeholder="Email Address*" autocomplete="email"></b-form-input>
                    </b-input-group>
                  </b-form-group>
                </div>
                <div v-if="!recipient.com_type">
                  <b-form-group>
                    <vue-tel-input
                      v-model="recipient.phone"
                      :enabledCountryCode="true"
                      :enabledFlags="false"
                    ></vue-tel-input>
                  </b-form-group>
                </div>
              </div>
            </div>
            <b-form-group>
              <b-form-checkbox v-model="recipient.set_password">Set Password</b-form-checkbox>
            </b-form-group>
            <div class="row" v-if="recipient.set_password">
              <div class="col-md-6">
                <b-form-group>
                  <b-input-group>
                    <b-input-group-prepend>
                      <b-input-group-text>
                        <!-- <i class="fa fa-lock"></i> -->
                        <UserIcon icon="pass.svg"></UserIcon>
                      </b-input-group-text>
                    </b-input-group-prepend>
                    <b-form-input
                      type="password"
                      placeholder="Password*"
                      autocomplete="current-password"
                    ></b-form-input>
                  </b-input-group>
                </b-form-group>
              </div>
              <div class="col-md-6">
                <b-form-group>
                  <b-input-group>
                    <b-input-group-prepend>
                      <b-input-group-text>
                        <!-- <i class="fa fa-lock"></i> -->
                        <UserIcon icon="pass.svg"></UserIcon>
                      </b-input-group-text>
                    </b-input-group-prepend>
                    <b-form-input
                      type="password"
                      placeholder="Confirm Password"
                      autocomplete="current-password"
                    ></b-form-input>
                  </b-input-group>
                </b-form-group>
              </div>
            </div>
          </div>
          <button class="btn btn-primary min-width-230px mt-4 mb-3" v-on:click="addRecipient()">
            <UserIcon icon="add-recipien.svg" class="mr-2" />Add Recipient
          </button>
        </div>
        <div class="col-md-3">
          <div class="document" v-for="(doc, index) in documents" :key="index">
            <div class="document-div">
              <img v-bind:src="getFileType(doc.doc_name)" class="folder-2" />
              <div class="docu-title">{{doc.doc_name}}</div>
              <div class="docu-pages">{{doc.doc_pages}} {{doc.doc_pages>1?"pages":"page"}}</div>
            </div>
          </div>
          <div class="d-flex justify-content-between mt-4 flex-wrap">
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
import VueTelInput from "vue-tel-input";
import { HeaderDropdown } from "@coreui/vue";
export default {
  name: "AddRecipients",
  components: {
    UserIcon,
    VueTelInput,
    HeaderDropdown
  },
  data() {
    return {
      togglePress: false,
      sign_types: ["Needs to Sign", "Receives a Copy", "Needs to View"],
      recipients: [
        {
          sign_type: "Needs to Sign",
          com_type: true,
          name: "",
          email: "",
          phone: "",
          set_password: true,
          password: "",
          confirm_password: ""
        }
      ],
      documents: [
        {
          doc_name: "Filename Jikhan Jung.doc",
          doc_pages: 5
        },
        {
          doc_name: "Ad cum numquam efficiantur.pdf",
          doc_pages: 1
        },
        {
          doc_name: "Ad cum numquam efficiantur.pdf",
          doc_pages: 3
        }
      ]
    };
  },
  methods: {
    getTypeIcon(_type) {
      if (_type == "Needs to Sign") {
        return "fa-pencil";
      } else if (_type == "Receives a Copy") {
        return "fa-cc";
      } else if (_type == "Needs to View") {
        return "fa-eye";
      }
    },
    getFileType(fileName) {
      return "img/icons/" + fileName.substr(fileName.length - 3) + ".svg";
    },
    moveNextPage() {
      this.$router.push("/docu-sign/prepare");
    },
    moveBackPage() {
      this.$router.push("/docu-sign/add-document");
    },
    addRecipient() {
      this.recipients.push({
        sign_type: "Needs to Sign",
        com_type: false,
        name: "",
        email: "",
        phone: "",
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
@import "./AddRecipients.scss";
</style>

