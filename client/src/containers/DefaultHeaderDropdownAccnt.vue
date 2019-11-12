<template>
  <b-navbar-nav class="ml-auto">
    <AppHeaderDropdown right class="language-selector">
      <template slot="header">
        <i class="flag-icon h5" :class="language" />
      </template>
      <template slot="dropdown">
        <b-dropdown-item v-on:click="language='flag-icon-gb'">
          <i class="flag-icon flag-icon-gb" />
        </b-dropdown-item>
        <b-dropdown-item v-on:click="language='flag-icon-jp'">
          <i class="flag-icon flag-icon-jp" />
        </b-dropdown-item>
        <b-dropdown-item v-on:click="language='flag-icon-kr'">
          <i class="flag-icon flag-icon-kr" />
        </b-dropdown-item>
      </template>
    </AppHeaderDropdown>
    <b-nav-item>
      <i class="fa fa-bell fa-lg"></i>
      <b-badge pill variant="primary">2</b-badge>
    </b-nav-item>
    <AppHeaderDropdown right no-caret>
      <template slot="header">
        <img src="img/avatars/NoPath.png" class="img-avatar" alt="admin@bootstrapmaster.com" />
        <span class="hello">Hello, Suzzane!</span>
      </template>
      <template slot="dropdown">
        <b-dropdown-item v-on:click="gotoPage('/profile')">
          <i class="fa fa-user" /> Profile
        </b-dropdown-item>
        <b-dropdown-item>
          <i class="fa fa-sign-out" /> Logout
        </b-dropdown-item>
      </template>
    </AppHeaderDropdown>
  </b-navbar-nav>
</template>

<script>
import { HeaderDropdown as AppHeaderDropdown } from "@coreui/vue";
export default {
  name: "DefaultHeaderDropdownAccnt",
  components: {
    AppHeaderDropdown
  },
  data: () => {
    return {
      itemsCount: 42,
      language: "flag-icon-gb"
    };
  },
  methods: {
    gotoPage(url) {
      this.$router.push({ path: url });
    }
  }
};
</script>
<style lang="scss">
.language-selector {
  .dropdown-menu {
    min-width: 50px;
    width: 50px;
    .dropdown-item {
      min-width: 48px !important;
    }
  }
}
.hello {
  @media (max-width: 1280px) {
    display: none;
  }
}
@media (max-width: 1095px) {
  .img-avatar {
    margin: 0 0 !important;
  }
  .navbar-nav {
    .nav-item {
      min-width: 35px;
      .nav-link {
        padding-left: 0 !important;
        padding-right: 0 !important;
        .badge {
          // left: 15% !important;
        }
      }
    }
  }
}
</style>
