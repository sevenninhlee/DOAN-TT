<template>
	<div class="contnt-header row no-gutters">
      <div class="col-lg-2 col-md-4 mt-4 col-6 center">

  <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="menus-bar">&#9776;</span>
        <a class="updateplan">Upgrade Your Plan</a>
      </div>
      <div class="col-lg-8 col-md-12 col-12 order-col-last">
        <div class="mymenu">
      <ul>
        
        <li>
          <div class="custom-control custom-radio checkbox-back">
                <input type="radio" class="custom-control-radio radio-dark" id="document" name="document">
                <label class="" for="document">Upload document</label>
              <div class="border-line"></div>
                </div>

        </li>
        <li>
          <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-radio radio-dark" id="Recipients" name="Recipients">
                <label class="" for="Recipients">Add Recipients</label>
                      <div class="border-line"></div>
                </div>
              </li>
        <li>
          <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-radio radio-dark" id="Prepare" name="Prepare">
                <label class="" for="Prepare">Prepare</label>
                      <div class="border-line"></div>
                </div>
              </li>
        <li>
          <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-radio radio-dark" id="review" name="review">
                <label class="" for="review">Review</label>
                      <div class="border-line"></div>
                </div>
              </li>
        <li></li>
      </ul>

    </div>
      </div>
      <div class="col-lg-2  col-md-8 col-6 text-center mt-1">
        <div class="row no-gutters profile">
        <div class="col-lg-3 col-md-3 col-2 mt-3 text-right">
             <ul class="navbar-nav mr-auto" style="margin-top: -8px;">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="../../../images/cms/uk.png"  style="padding: 10px;" />
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#" ><img src="../../../images/cms/uk.png" style="padding: 10px;" />English</a>
            <a class="dropdown-item" href="#"><img src="../../../images/cms/jp.png"  style="padding: 10px;"  />日本語</a>
            <a class="dropdown-item" href="#"><img src="../../../images/cms/kr.png"  style="padding: 10px;"  />한국어</a>
            </div>
            </li>
            </ul>
        </div> 
        <div class="col-lg-1 col-md-1 col-2 mt-4">
          <i class="fas fa-bell"></i><b>2</b>
        </div>
        <div class="col-lg-2 col-md-1 col-3 mt-3 ml-3">
          <img src="images/avatar.png" class="proilelogo">
        </div>
         <div class="col-lg-5 col-md-5 col-4 mt-4"><p id="profile-content">Hello, Suzanne!</p>
            <div class="content-collapse collapse-div">
              <a @click="logout()"><i class="fas fa-sign-out-alt"></i><span>Log out</span></a>
            </div>
          </div> 
  <!--         <div class="col-lg-2 col-md-3 col-2 mt-3 text-right">
          	
        	 <ul class="navbar-nav mr-auto" style="margin-top: -8px;">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="../../../images/cms/uk.png"  style="padding: 10px;" />
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#" ><img src="../../../images/cms/uk.png" style="padding: 10px;" />English</a>
            <a class="dropdown-item" href="#"><img src="../../../images/cms/jp.png"  style="padding: 10px;"  />日本語</a>
            <a class="dropdown-item" href="#"><img src="../../../images/cms/kr.png"  style="padding: 10px;"  />한국어</a>
            </div>
            </li>
            </ul>
            
          </div>
          <div class="col-lg-1 col-md-1 col-2 mt-4"><i class="fas fa-bell"></i><b>2</b></div>
          <div class="col-lg-1 col-md-1 col-3 mt-3"><img src="images/avatar.png"></div>
          <div class="col-lg-5 col-md-5 col-4 mt-4"><p id="profile-content">Hello, Suzanne!</p>
            <div class="content-collapse collapse-div">
              <a @click="logout()"><i class="fas fa-sign-out-alt"></i><span>Log out</span></a>
            </div>
          </div> -->
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
