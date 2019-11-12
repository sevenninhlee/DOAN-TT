<template>
  <div class="app">
    <div class="app-body payment-container">
      <AppSidebar fixed>
        <AppLogo />
        <div class="p-3 side-menu">
          <div class="sidebar-auto-scoroll">
            <b-button block variant="other" v-on:click="gotoStartPage()">
              {{ getSelected('temp')=="selected" ?"Create Template":  "Start Now" }}
            </b-button>
            <b-button
              variant="primary"
              class="d-block d-sm-none"
              block
              style="padding-top: 0.5rem;"
              v-on:click="gotoPage('/payment/pricing-plan'); toggleSidebar();"
            >Upgrade Your Plan</b-button>
            <div class="prepare-tool-nav">
              <hr class="seperate-bar" />
              <SidebarNav :navItems="nav"></SidebarNav>
            </div>
            <!-- <template  v-if="show_add_folder"> -->
              <hr class="seperate-bar" />
              <div class="user-sidebar-folders">
                <SideFolders :folders="folders" :layer_id="''"/>
              </div>
            <!-- </template> -->
          </div>
          <Logout></Logout>
        </div>
      </AppSidebar>
      <main class="main" v-on:click="clickMain">
        <AppHeader class="pr-3">
          <SidebarToggler ref="sidebarToggleBtn" class="d-lg-none" display="md" mobile />
          <!-- <SidebarToggler class="d-md-down-none" display="lg" :defaultOpen=true /> -->
          <UpgradePlan class="d-none d-sm-block"></UpgradePlan>
          <div class="your-cur-plan">
            <span class="comments ml-3 mr-1">Your current plan:</span>
            <span>
              <UserIcon icon="smile.png" class="mr-2" />Free
            </span>
          </div>
          <div class="sign-doc-type">
            <div
              class="clickable-icon mx-1 mx-1 mx-sm-2 mx-md-2 mx-lg-4"
              v-on:click="gotoPage('/payment/document-list')"
              v-bind:class="getSelected('doc')"
            >DOCUMENTS</div>
            <div
              class="clickable-icon mx-1 mx-sm-2 mx-md-2 mx-lg-4 "
              v-on:click="gotoPage('/payment/template-list')"
              v-bind:class="getSelected('temp')"
            >TEMPLATES</div>
          </div>
          <DefaultHeaderDropdownAccnt />
          <!--<AsideToggler class="d-lg-none" mobile />-->
        </AppHeader>
        <div class="container-fluid main-container">
          <router-view></router-view>
        </div>
      </main>
    </div>
    <TheFooter>
      <!--footer-->
      <div>
        <span class="ml-1">&copy; 2019 CoffeeSign All rights reserved</span>
      </div>
    </TheFooter>
    <b-modal id="rename-folder-modal" ref="rename-folder-modal" hide-footer centered size="md">
      <div class="rename-folder-modal">
        <div class="title">{{folder_op_type=="new"?"Create":"Rename"}} Folder</div>
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            id="folder_rename"
            placeholder="Folder Name"
            name="folder_rename"
            v-model="folder_rename"
          />
        </div>
        <hr>
        <b-button v-on:click="enterName()" variant="primary" class="min-width-136px">{{folder_op_type=="new"?"Create":"Rename"}}</b-button>
      </div>
    </b-modal>
  </div>
</template>

<script>
import {
  Header as AppHeader,
  SidebarToggler,
  Sidebar as AppSidebar,
  SidebarFooter,
  SidebarForm,
  SidebarHeader,
  SidebarMinimizer,
  SidebarNav,
  Aside as AppAside,
  AsideToggler,
  Footer as TheFooter,
} from "@coreui/vue";
import DefaultHeaderDropdownAccnt from "./DefaultHeaderDropdownAccnt";
import UserIcon from "../components/UserIcon";
import UpgradePlan from "./UpgradePlan";
import Logout from "../components/Logout";
import AppLogo from "../components/AppLogo";
import SideFolders from "../components/SideFolders";

export default {
  name: "DocumentsContainer",
  components: {
    SideFolders,
    AppLogo,
    Logout,
    UserIcon,
    UpgradePlan,
    AsideToggler,
    AppHeader,
    AppSidebar,
    AppAside,
    TheFooter,
    DefaultHeaderDropdownAccnt,
    SidebarForm,
    SidebarFooter,
    SidebarToggler,
    SidebarHeader,
    SidebarNav,
    SidebarMinimizer
  },
  data() {
    return {
      show_add_folder: false,
      current_item: '',
      folder_rename: '',
      folder_remove_id: 0,
      folder_op_type: 'new',
      nav: [
        {
          name: "Account",
          url: "/profile/account",
          icon: "fa fa-user"
        },
        {
          name: "Signature",
          url: "/signature",
          icon: "fa fa-pencil"
        },
        {
          name: "Pricing Plan",
          url: "/payment/upgrade-plan",
          icon: "fa fa-tag"
        },
        {
          name: "Branding",
          url: "/profile/custom-branding",
          icon: "fa fa-id-card"
        }
      ],
      folders: [{
        name: "Folders",
        children: [
          {
            name: "Folders",
            children: [
              {
                name: "Folders",
                children:[]
              }
            ]
          },
          {
            name: "Folders",
            children:[]
          }
        ]
      }],
      show_tool_menu: true
    };
  },
  computed: {
    name() {
      return this.$route.name;
    },
    list() {
      return this.$route.matched.filter(
        route => route.name || route.meta.label
      );
    }
  },
  mounted() {
    if (this.$router.history.current.fullPath == "/payment/document-list") {
      this.show_add_folder = true;
    } else {
      this.show_add_folder = false;
    }
    this.$root.$on('renameFolder', (layer_id, name) => {
      this.folder_rename = name;
      this.folder_op_type = "rename";
      this.openRenameDialog(layer_id);
    });
    this.$root.$on('newFolder', (layer_id) => {
      this.folder_rename = "New Folder";
      this.folder_op_type = "new";
      this.openRenameDialog(layer_id);
    });
    this.$root.$on('removeFolder', (layer_id, index) => {
      if(layer_id==""){
        alert("Could not delete root Folder!");
        return;
      }
      this.folder_op_type = "remove";
      this.folder_remove_id = index;
      this.renameFolder(this.folders, layer_id);
    });
    this.toggleSidebar();
  },
  methods: {
    toggleSidebar() {
      if(window.innerWidth<500){
        console.log("toggled sidebar in paymentContainer");
        this.$refs.sidebarToggleBtn.toggle();
      }
    },
    renameFolder(folders, layer_id) {
      const pos = layer_id.indexOf('/', 1);
      
      const no = parseInt(layer_id.substr(1, pos));
    
      if(pos<0){
        const no1 = parseInt(layer_id.substr(1));
        if(this.folder_op_type == "rename") {
          folders[no1].name = this.folder_rename;
        } else if(this.folder_op_type == "new") {
          folders[no1].children.push({name: this.folder_rename, children: []})
          console.log(folders[no1]);
        } else if(this.folder_op_type == "remove") {
          folders[no1].children.splice(parseInt(this.folder_remove_id), 1);
        }
        this.folder_rename = "";
      } else {
        layer_id = layer_id.substr(pos);
        this.renameFolder(folders[no].children, layer_id);
      }
    },
    enterName() {
      this.renameFolder(this.folders, this.current_item);
      this.$refs['rename-folder-modal'].hide();
    },
    openRenameDialog(layer_id) {
      this.current_item = layer_id;
      this.$refs['rename-folder-modal'].show();
    },
    getSelected(doc_type) {
      if(doc_type == 'doc' && this.$router.history.current.fullPath == "/payment/document-list") {
        return "selected"
      } else if(doc_type == 'temp' && this.$router.history.current.fullPath == "/payment/template-list") {
        return "selected"
      }
      return "";
    },
    clickMain(e) {
      if (e.target.className == "main") {
        this.toggleSidebar
      }
    },
    gotoPage(page) {
      this.$router.push({ path: page });
    },
    gotoStartPage() {
      this.$router.push({
        path: "/docu-sign/add-document",
        query: { withoutModal: true }
      });
    },
  },
  watch: {
    $route(to) {
      if (to.fullPath == "/prepare") {
        this.show_tool_menu = true;
      } else {
        this.show_tool_menu = false;
      }
      
      if (this.$router.history.current.fullPath == "/payment/document-list") {
        this.show_add_folder = true;
      } else {
        this.show_add_folder = false;
      }
    }
  }
};
</script>
<style lang="scss">
@import "./PaymentContainer.scss";
</style>

