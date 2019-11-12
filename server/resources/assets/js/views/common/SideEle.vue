<template>
 <div id="mySidenav" class="sidenav">
  <div class="logo text-center">  
    <a href="index.html">
      <img src="../../../images/home/modallogo.png">
    </a>
  </div>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="menu">
      <!--   <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a> -->
  </div>
  <div class="ml-3 mr-3 border-top side-footer">
    <div class="logout">
        <a @click="logout" style="cursor: pointer;"><i class="fas fa-sign-out-alt"></i><span>Log out</span></a>
    </div>
  </div>
</div>
</template>

<script>
   export default{
   	 methods:
    {
      logout()
      {
      	this.$session.start();
        this.$session.destroy("user_email");
        this.$session.destroy("user_password");
        this.$router.push({ name: 'Login' })
      }
    }

   }
</script>

<style>
	.sidenav {
  background: url('../../../images/home/side.png');
}

</style>