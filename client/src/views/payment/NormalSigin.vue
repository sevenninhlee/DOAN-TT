<template>
  <div class="app flex-row" ref="fileform">
    <div class="w-100 normal-sign">
      <div class="profile-header">
        <div class="user-happy">
          <!-- <img src="img/avatars/NoPath@2x.png" /> -->
          <div class="avatar-tag">
            <span>ST</span>
            <div class="change-avatar" v-on:click="changeAvatar()">Change</div>
          </div>
          <div class="ml-3">
            <h1 class="happy">We are happy to see you again <div>Suzanne Thompson!</div></h1>
            <span class="comments">CoffeeSign even takes care reminding our clients!</span>
          </div>
        </div>
        <div class="user-actions">
          <div class="user-action">
            <div class="action-numbers">0</div>
            <div class="action-type">Action Required</div>
          </div>
          <div class="user-action">
            <div class="action-numbers">1</div>
            <div class="action-type">Waiting for Others</div>
          </div>
          <div class="user-plan">
            <div>
              <img src="img/payment/upgrad.png" />
            </div>
            <div class="upgrade-content">
              <div class="upgrade-to">Upgrade to Standard plan</div>
              <div class="comments">Upgrade now and enjoy additional features.</div>
              <b-link class="click-here" v-on:click="upgradePlan()">Click here to upgrade</b-link>
            </div>
          </div>
        </div>
      </div>
      <hr class="mb-5" />
      <div class="row">
        <div class="col-md-3 pr-md-0" v-if ="false">
          <div class="content-card text-center">
            <div class="chart">
              <radial-progress-bar :diameter="160"
                       :completed-steps="completedSteps"
                       :total-steps="totalSteps"
                       stopColor="#e2ccc3"
                       startColor="#b59a90"
                       innerStrokeColor="#eeeae8"
                       :strokeWidth="8"
                       >
                <div class="completion-rate">{{ completedSteps }}/{{ totalSteps }}</div>
              </radial-progress-bar>
            </div>
            <div class="completion"> Profile completion</div>
            <div class="comments text-center mb-4">
              Lorem ipsum dolor sit amet, ea meis fabellas nam, movet contentiones te eum.
            </div>
            <b-button variant="primary" class="mb-4" block>Show more</b-button>
          </div>
        </div>
        <div class="col-md-5 pr-md-0">
          <div class="content-card sign-signature">
            <div class="header">SIGNATURE</div>
            <div class="sign">Suzanne Thompson</div>
            <div class="text-right">
              <b-button variant="link" class="mr-1">Replace</b-button>|
              <b-button variant="link" class="ml-1">Remove</b-button>
            </div>
          </div>
          <div class="row">
            <div class="col-6 pr-1">
              <div class="content-card sign-signature">
                <div class="header">INITIALS</div>
                <div class="sign initials">ST</div>
                <div class="text-right">
                  <b-button variant="link" class="mr-1">Replace</b-button>|
                  <b-button variant="link" class="ml-1">Remove</b-button>
                </div>
              </div>
            </div>
            <div class="col-6 pl-1">
              <div class="content-card sign-signature">
                <div class="header">STAMP</div>
                <div class="stamp">
                  <b-button variant="link" block>
                    <UserIcon icon="upload.svg" />
                  </b-button>
                  <b-button variant="link" block class="upload-initials">Upload Initials</b-button>
                  <!-- <img src="img/payment/stamp.png" /> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <FileUpload />
        </div>
      </div>
    </div>
    <Message />
    
    <b-modal id="change-avatar-modal" ref="change-avatar-modal"
       hide-footer centered size="xl">
      <div class="change-avatar-modal">
        <div class="title">Change Profile Image</div>

        <div class="img-control-btns">
          <input type="file" ref="avatar_file"
            style="display: none"  @change="onFileChange" />
          <b-button variant="outline-primary" v-on:click="changeAvatarImg()">Other Image</b-button>
          <div>
            <i class="fa fa-rotate-left clickable-icon" v-on:click="rotate(-90)"/>
            <i class="fa fa-rotate-right clickable-icon mx-3" v-on:click="rotate(90)"/>
          </div>
        </div>
        
        <vue-cropper
          ref="cropper"
          :src="avatar"
          alt="Source Image"
          :cropmove="cropped"
          class="my-4"
          :minContainerHeight="300"
        >
        </vue-cropper>
        <div class="text-center">
          <b-button variant="outline-primary" class="mr-3" v-on:click="cancelAvatar()" >Cancel</b-button>
          <button type="submit" class="btn btn-primary" v-on:click="saveAvatar()">Save changes</button>
        </div>
      </div>
    </b-modal>
  </div>
</template>

<script>
import UserIcon from "../../components/UserIcon";
import FileUpload from "../../components/FileUpload";
import Message from "../../components/Message";
import RadialProgressBar from 'vue-radial-progress';
import VueCropper from 'vue-cropperjs';
import 'cropperjs/dist/cropper.css';
export default {
  name: "NormalSign",
  components: {
    FileUpload,
    UserIcon,
    Message,
    RadialProgressBar,
    VueCropper
  },
  data() {
    return {
      cropped: null,
      avatar: "img/avatars/510-510.png",
      sections: [
        { label: 'Red section', value: 45, color: '#d4bcb2' },
      ],
      completedSteps: 3,
      totalSteps: 7
    }
  },
  methods: {
    changeAvatarImg() {
      this.$refs.avatar_file.click();
    },
    onFileChange(e) {
      var files = e.target.files || e.dataTransfer.files;
      if (!files || !files.length) return;
      var reader = new FileReader();
      reader.onload = function(e) {
        this.img_file = e.target.result;
        console.log(this.img_file);
      };
      reader.readAsDataURL(files[0]);
    },
    rotate(rotationAngle) {
      this.$refs['cropper'].rotate(rotationAngle);
    },
    saveAvatar() {
      this.selected_avatar = this.avatar;
      this.$refs['change-avatar-modal'].hide();
    },
    changeAvatar() {
      this.$refs['change-avatar-modal'].show();
    },
    cancelAvatar() {
      this.$refs['change-avatar-modal'].hide();
    },
    upgradePlan() {
      this.$router.push({ path: "/payment/upgrade-plan" });
    }
  }
};
</script>

<style lang="scss">
@import "./NormalSigin.scss";
@import "../document/AddDocuments.scss";
</style>

