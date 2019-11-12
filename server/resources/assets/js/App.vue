<template>
  <div id="app" class="root">
  	<side-ele v-if="!itemsContains($route.name)"></side-ele>
    <router-view />
   
  </div>
</template>

<script>
	import SideEle from './views/common/SideEle';
export default {
  name: 'app',
  data () {
    return {
      items: ['Login','Signup','Privacy','Terms','ForgotPassword']
    }
  },
   components:{
         'side-ele':SideEle
     },
      methods: {
    itemsContains(n) {
      console.log(n);
      return this.items.indexOf(n) > -1
    }
  }
}
</script>

<style lang="scss">

</style>
