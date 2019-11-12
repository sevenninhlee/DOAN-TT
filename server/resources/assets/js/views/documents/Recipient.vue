<template>
  
  <div id="main">
  <div class="side-dashboard">
    <headercomponent></headercomponent>
    <div class="content-heading">
      <div class="row no-gutters">
        <div class="col-lg-12 Add-Documents mt-5 pl-5">
          <h2 class="pb-5">Add Recipients</h2>
        </div>
      </div>
    </div>
    <div class="content-form">
      <div class="row no-gutters">
        <div class="col-lg-12 pl-5 paddingManaged">
          <div class="row no-gutters">
             <div class="col-lg-8 pr-2">
             <!--  <form> -->
              <div class="left-form">
                <div class="form-reciept">
                  <div class="row">
                  <div class="col-lg-11 col-11">
                    <p>RECIPIENT #1</p>
                  </div>
                  <div class="col-lg-1 col-1 text-center">
                    <i class="fa fa-trash"></i>
                  </div>
                </div>
                <div class="form-section">
                  
                  <div class="row">
                    <div class="col-lg-4 inputwithicon pb-3">
                    <select  v-model="sign_type['x']" name="" id="input" class="need-to-sign" required="required" style="width: 100%;padding-left: 40px;">
                    <option value="0"> Need to sign</option>
                     <option value="1">In personal signer</option>
                    </select>
                    <i class="fa fa-pen"></i>
                  </div>
                    <div class="col-lg-8 pb-3">
                      <button class="form-btn send-email block" @click="openFirstEmail()">Send email</button>
                      <button class="form-btn name-btn block" @click="openFirstPhone()">Kakao Talk</button>
                    </div>
                  <div class="col-lg-4 inputwithicon pb-3">
                    <input v-model="recipient_name['x']" type="text" name="" placeholder="Recipient Name*" class="Rectangle-38">
                    <i class="fa fa-user"></i>
                  </div>
                  <div class="col-lg-6 pb-3" v-if="seenPhone">
                    <select name="" id="input" class="need-to-sign" >
                    <option value="">010</option>
                    </select>
                    <input v-model="number_ph['x']" type="text" name="" placeholder="Please enter 8 digits without '-'" class="digits" style="display: inline-block;">
                  </div>

                  <div class="col-lg-6 inputwithicon pb-3" v-if="seenEmail">
                    <input v-model="email_address['x']"   type="text" name="" placeholder="Email Address*" class="Rectangle-38">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <div class="col-lg-12 pb-3">
                    <div class="custom-control custom-radio">
                      <input type="checkbox" class="custom-control-radio checkbox-gray" id="defaultUncheckedc1245" name="defaultExampleRadios"  v-model="password_flag['x']">
                      <label class="" for="defaultUncheckedc1245">Set Password</label>
                    </div>
                  </div>
                  <div class="col-lg-4 inputwithicon pb-3" v-if="password_flag['x']">
                  <input v-model="password['x']" type="password" name="" placeholder="Password*" class="Rectangle-38">
                  <i class="fa fa-lock"></i>
                </div>
                 <div class="col-lg-6 inputwithicon pb-3" v-if="password_flag['x']">
                  <input type="password" name="" placeholder="Confirm password*" class="Rectangle-38">
                  <i class="fa fa-lock"></i>
                </div>
                  </div>
               <!--  </form>  -->
                </div>
                </div>
               
                <div class="form-reciept" v-for="(input, index) in inputs">
                  <div class="row">
                  <div class="col-lg-11 col-11">
                    <p>RECIPIENT #{{index+2}}</p>
                  </div>
                  <div class="col-lg-1 col-1 text-center">
                    <i class="fa fa-trash"></i>
                  </div>
                </div>
                  <div class="form-section">
                    
                  <!-- <form method="post"> -->
                  <div class="row">
                    <div class="col-lg-4 inputwithicon pb-3">
                    <select v-model="sign_type[index]" name="" id="input" class="need-to-sign" required="required" style="width: 100%;padding-left: 40px;">
                      <option value="0"> Need to sign</option>
                      <option value="1">In personal signer</option>
                    </select>
                    <i style="top: 2px;"><img src="../../../images/home/user_pencil.png"></i>
                  </div>
                    <div class="col-lg-8 pb-3">
                      <button class="form-btn send-email block" @click="openEditorEmail(input)">Send email</button>
                      <button class="form-btn name-btn block"  @click="openEditorPhone(input)">Kakao Talk</button>
                    </div>
                    <div class="col-lg-4 inputwithicon pb-3" >
                    <input v-model="recipient_name[index]" v-bind::id="'order_by' + input"  type="text"  placeholder="Recipient Name*" class="Rectangle-38">
                    <i class="fa fa-user"></i>
                  </div>
                  <div class="col-lg-6 pb-3" v-if="input.showEditPhone">
                    <select name="" id="input" class="need-to-sign" >
                    <option value="">010</option>
                    </select>
                    <input v-model="number_ph[index]" type="text" name="" placeholder="Please enter 8 digits without '-'" class="digits" style="display: inline-block;">
                  </div>
                  <div class="col-lg-6 inputwithicon pb-3" v-if="input.showEditEmail">
                    <input v-model="email_address[index]"   type="text" name="" placeholder="Email Address*" class="Rectangle-38">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <div class="col-lg-12 pb-3">
                    <div class="custom-control custom-radio">
                      <input type="checkbox" class="custom-control-radio checkbox-gray" id="defaultUncheckedc1" :name="'checkpass' + index" v-bind::id="'checkpass' + index" v-model="password_flag[index]">
                      <label class="" for="defaultUncheckedc1">Set Password</label>
                    </div>
                  </div>
                  <div class="col-lg-4 inputwithicon pb-3" v-if="password_flag[index]">
            <input v-model="password[index]" autocomplete="true" type="password" name="" placeholder="Password*" class="Rectangle-38">
            <i class="fa fa-lock"></i>
          </div>
          <div class="col-lg-6 inputwithicon pb-3" v-if="password_flag[index]">
            <input type="password" name="" autocomplete="true" placeholder="Confirm password*" class="Rectangle-38">
            <i class="fa fa-lock"></i>
          </div>
                  </div>
               
                </div>
                </div>
                 
                


              </div>
              <!-- </form>  -->
             </div>
             <div class="col-lg-4">
              <div class="row no-gutters">
                <div class="col-lg-12" v-for="(input1, index1) in files_data">
                 
                  <div class="form-reciept">
                    <div style="border:1px dashed #D3D3D3;padding: 10px 20px ;background: #FCFAFA">
                      <div class="col-md-12 mt-3">
                        <center><img src="../../../images/home/docs.png">
                        <p class="docs mt-2">{{input1.name}}</p>
                        <p style="  font-family: Roboto;
                        font-size: 14px;
                        font-weight: normal;
                        font-style: normal;
                        font-stretch: normal;
                        line-height: 1.29;
                        letter-spacing: normal;
                        color: #9ea0a5;">5 Pages</p>
                        </center>
                      </div>
                    </div>
                  </div>
                </div>

             <!--  <div class="col-lg-12">
                <div class="form-reciept">
                  <div style="border:1px dashed #D3D3D3;padding: 10px 20px ;background: #FCFAFA">
                    <div class="col-md-12 mt-3">
                      <center><img src="../../../images/home/docs.png">
                      <p class="docs mt-2">Continuous Improvement lorem ipsum sit<br> dollor amet.doc</p>
                      <p style="  font-family: Roboto;
                      font-size: 14px;
                      font-weight: normal;
                      font-style: normal;
                      font-stretch: normal;
                      line-height: 1.29;
                      letter-spacing: normal;
                      color: #9ea0a5;">5 Pages</p>
                      </center>
                    </div>
                  </div>
                </div>
              </div> -->
              
              </div>
             </div>
          </div>
        </div>
      </div>

    </div>
    <div class="footer-form row no-gutters">
      <div class="col-lg-8 pl-5">
        <button class="form-btn addRecipt block" @click="addrecipient();" >Add Recipient</button>
       <!--  <button class="form-btn addRecipt block" @click="next();">Next</button> -->
      </div>
      <div class="col-lg-4 pl-5">
        <button class="form-btn addRecipt block" @click="next();">Next</button>
      </div>
    </div>
  </div>
  
 <!--  <footer>
    <p class="footer">© 2019 CoffeeSign All rights reserved.</p>
  </footer> -->
  <footercomponent></footercomponent>
  </div>
</template>
 <script>
  import Header from "../common/Header";
  import Footer from "../common/Footer";
        export default 
        {
          data(){
             return {
                  inputs: [],
                  sign_type: [],
                  contact_type: [],
                  recipient_name: [],
                  email_address: [],
                  password_flag: [],
                  password: [],
                  number_ph:[],
                  files_data:[],
                  seenEmail: true,
                  seenPhone: false,
                  showPassword : false,
                  all_data: []


              }
        
      },
   components:{
         'headercomponent':Header,
         'footercomponent':Footer
     },

          methods: 
          {
           addrecipient() 
           {
            
            this.inputs.push({
           
            showEditEmail: true,
            showEditPhone: false,
            showPassword : false
          });
                
           },
           next()
           {

            /*axios.post('api/file-upload-get',{file: this.files}).then(response => {
                   if (response.data.success) {
                     alert(response.data.success);
                   }
            });*/

             
             this.all_data.push(this.sign_type,this.recipient_name,this.email_address,this.password_flag,this.password,this.number_ph
            );
             this.$router.push({ name: 'Document',params: { files: this.files_data, 'recipients' : this.all_data} });
             
             //console.log( this.all_data);
             /*console.log(this.sign_type);
            console.log(this.recipient_name);
            console.log(this.email_address);
            console.log(this.password_flag);
            console.log(this.password);
            console.log(this.number_ph);*/
           },
           openEditorEmail(inputs) {
            inputs.showEditEmail = true;
            inputs.showEditPhone = false;
            //$(this).addClass('send-email');
          },
          openEditorPhone(inputs) {
            inputs.showEditPhone = true;
             inputs.showEditEmail = false;
          },
          openFirstEmail()
          {
            this.seenEmail = true;
            this.seenPhone = false;
          },
          openFirstPhone()
          {
            this.seenEmail = false;
            this.seenPhone = true;
          }
        
        },
        mounted()
        {
          this.files_data = this.$route.params.file;
         
        } 
      }
 </script>
 <style lang="scss" scoped>
  /*add recipients page nm*/
/*.Group-71 {
      width: 924px;
      height: 145px;
      object-fit: contain;
    }
    .welcome {
    width: 160px;
    height: 48px;
    font-family: Roboto;
    font-size: 36px;
    font-weight: bold;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.33;
    letter-spacing: normal;
    text-align: right;
    color: #2e221e;
    margin-top: 50px;
    }
    .Now-you-can-use-easy-and-simple-digital-signatuers {
    width: 321px;
    height: 19px;
    font-family: Roboto;
    font-size: 14px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.29;
    letter-spacing: normal;
    text-align: left;
    color: #9ea0a5;
    }
    .You-can-use-5-times-for-FREE {
    width: 184px;
    height: 19px;
    font-family: Roboto;
    font-size: 14px;
    font-weight: bold;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.29;
    letter-spacing: normal;
    text-align: left;
    color: #9ea0a5;
    }
    .First-Name {
    width: 68px;
    height: 19px;
    font-family: Roboto;
    font-size: 14px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.36;
    letter-spacing: normal;
    text-align: left;
    color: #9ea0a5;
    }
    .Rectangle-38 {
    width: 100%;
    height: 40px;
    border-radius: 4px;
    border: solid 1px #ebebeb;
    background-color: #ffffff;
    font-family: Roboto;
    font-size: 14px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.36;
    letter-spacing: normal;
    text-align: left;
    color: #9ea0a5 !important;
    }
    .Path-716 {
    width: 688px;
    height: 50px;
    border: solid 1px #ebebeb;
    background-color: #ffffff;
    font-family: Roboto;
    font-size: 14px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.36;
    letter-spacing: normal;
    text-align: left;
    color: #9ea0a5;
    }
    .Employee{
      width: 334px;
    height: 50px;
    border: solid 1px #ebebeb;
    background-color: #ffffff;
    font-family: Roboto;
    font-size: 14px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.36;
    letter-spacing: normal;
    text-align: left;
    color: #9ea0a5;
    }
    .Rectangle-4 {
    width: 688px;
    height: 50px;
    border-radius: 5px;
    box-shadow: 0 4px 20px 0 rgba(65, 48, 42, 0.15);
    background-color: #8a6454;
    font-family: Roboto;
    font-size: 16px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.31;
    letter-spacing: normal;
    text-align: center;
    color: #ffffff;
    }
    .dark3xvv {
    width: 200px;
    height: 65px;
    object-fit: contain;
    margin-top: 40px;
    }
    .container{
    width: 700px;
    }
    .sideimage{
    width: 260px;
    height:960px;
    object-fit: contain;
    float: left
    }
    .sidetop {
    width: 125px;
    height: 41px;
    object-fit: contain;
    margin-top: 15px;
    }
    .hr {
    width: 260px;
    height: 960px;
    background-image: linear-gradient(165deg, #775649, #282323);
    }
    .mymenu ul li{
    display: inline-block;
    padding-right: 100px;
    margin-top: 25px;
    height: 21px;
    font-family: Roboto;
    font-size: 16px;
    font-weight: 500;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.31;
    letter-spacing: normal;
    text-align: left;
    color: #2e221e;
    }
    .updateplan{
    
    border-radius: 4px;
    background-color: #8a6454;
    padding:12px;
    font-family: Roboto;
    font-size: 14px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.36;
    letter-spacing: normal;
    text-align: left;
    color: white !important;
    cursor: pointer;
    }*/
    /*.send-email{
      width: 170px !important;
    border-radius: 4px;
    background-color: #8a6454;
    padding:12px;
    font-family: Roboto;
    font-size: 14px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    letter-spacing: normal;
    
    color: white !important;
    cursor: pointer;
    }*/
    /*.mymenu{
    background: white;
    height: 71px;
    margin: 0px;
    padding: 0px;
    box-shadow: 10px 10px  10px #F3EFEE;
    }
    .Add-Documents {
    width: 186px;
    height: 34px;
    font-family: Roboto;
    font-size: 26px;
    font-weight: 500;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.31;
    letter-spacing: normal;
    text-align: left;
    color: #41302a;
    margin-top: 40px;
    }
        .need-to-sign{
      
    height: 40px;
    border: solid 1px #ebebeb;
    background-color: #ffffff;
    font-family: Roboto;
    font-size: 14px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.36;
    letter-spacing: normal;
    text-align: left;
    color: #9ea0a5;
    }
    .Kakao-Talk {
  width: 78px;
  height: 21px;
  font-family: Roboto;
  font-size: 16px;
  font-weight: normal;
  font-style: normal;
  font-stretch: normal;
  line-height: 1.31;
  letter-spacing: normal;
  text-align: left;
  color: #775649;

}
.set-password
{
  font-family: Roboto;
  font-size: 14px;
  font-weight: normal;
  font-style: normal;
  font-stretch: normal;
  line-height: 1.36;
  letter-spacing: normal;
  text-align: left;
  color: #9ea0a5;
}
.docs{
    font-family: Roboto;
  font-size: 16px;
  font-weight: 500;
  font-style: normal;
  font-stretch: normal;
  line-height: 1.56;
  letter-spacing: normal;
  text-align: center;
  color: #2e221e;
}
.inputwithicon input[type=text]{
padding-left: 40px;
}
.inputwithicon input[type=password]{
padding-left: 40px;
}
.inputwithicon{
  position: relative;
}
.inputwithicon i{
  position: absolute;
  left: 0;
  top: 8px;
  padding: 4px 25px;
  color: #aaa;
}
.check input[type="checkbox"] + label:before {
  border: 1px solid #333;
  content: "\00a0";
  display: inline-block;
  font: 16px/1em sans-serif;
  height: 16px;
  margin: 0 .25em 0 0;
  padding: 0;
  vertical-align: top;
  width: 16px;
}
.digits{
    height: 40px;
    border-radius: 4px;
    border: solid 1px #ebebeb;
    background-color: #ffffff;
    font-family: Roboto;
    font-size: 14px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: 1.36;
    letter-spacing: normal;
    text-align: left;
    color: #9ea0a5 !important;
}
.footer {
  width: 238px;
  height: 19px;
  font-family: Roboto;
  font-size: 14px;
  font-weight: normal;
  font-style: normal;
  font-stretch: normal;
  line-height: 1.36;
  letter-spacing: normal;
  text-align: left;
  color: #9ea0a5;
}*/
.sideimage{
        width: 260px;
        height:960px;
        object-fit: contain;
        float: left;
        background-image:url('../../../images/home/side.png');
        }
        

/*End add recipientds page*/
 </style>
 