<template>
  <ul class="user-custom-select" v-on:keydown="keyPress">
    <HeaderDropdown >
      <template slot="header">
        <div style="width:100%; overflow:hidden;">{{value}}</div>
        <!-- <input v-model="value" :readonly="searchable" style="width:100%; overflow:hidden;"> -->
      </template>
      <template slot="dropdown">
        <b-dropdown-item
          v-for="(item, index) in items"
          :key="index"
          v-on:click="changeValue(item)"
          v-on:keydown="selectValue(item)"
          v-bind:class="'dropdown-item-' + index"
        >{{item}}</b-dropdown-item>
      </template>
    </HeaderDropdown>
  </ul>
</template>

<script>
import { HeaderDropdown } from "@coreui/vue";
export default {
  name: "UserSelect",
  components: {
    HeaderDropdown
  },
  props: {
    value: String,
    items: Array,
    searchable: Boolean
  },
  methods: {
    selectValue(item) {
      console.log(item);
    },
    keyPress($event) {
      const key = $event.key.toLowerCase();
      if(key.length == 1) {
        console.log(key);
      }
    },
    changeValue(item) {
      this.item_list = this.items;
      this.filter = '';
      this.$emit("changeValue", item);
    }
  }
};
</script>

<style lang="scss">
</style>
