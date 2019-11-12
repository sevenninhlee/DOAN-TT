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
            <div class="col-lg-12 pl-5">
              <div class="row no-gutters">
                <div class="col-lg-7 pr-2">
                  <div class="form-reciept">
                  <div class="left-form">
                    <div class="row no-gutters">
                      <p class="all-reciients">TO: ALL RECIIENTS</p>
                    </div>
                    
                    <div class="row no-gutters">
                      <div class="form-group col-lg-12">
                        <label for=""><b class="all-reciients">Email Subject<b style="color:red">*</b></b></label>
                        <input type="text" class="form-control" id="" placeholder="Please CoffeeSign:">
                      </div>
                    </div>
                    <div class="row no-gutters">
                      <div class="form-group col-lg-12">
                        <label for=""><b class="all-reciients">Email Message</b></label>
                        <br/><textarea placeholder="Enter Message" style="width: 100%;" rows="7"></textarea>
                      </div>
                    </div>
                    <div class="row no-gutters">
                      <div class="form-group col-lg-12">
                        <label for=""><b class="all-reciients">Expiration</b></label>
                        <p class="d-inline-block">Number of days before request expire:</p><span class="d-inline-block expiration-error">120</span>
                      </div>
                    </div>
                    <div class="row no-gutters">
                      <div class="form-group col-lg-12">
                        
                        <p class="expiration-time">Request will be scheduled for expiration on <b class="expiration-time-color">May 1, 2019</b> at <b class="expiration-time-color">6:59:59 AM</b></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <div class="col-lg-5 pr-2 pl-3">
                  <div class="form-reciept">
                  <div class="row no-gutters">
                    <div class="col-lg-6 document">DOCUMENTS</div>
                  </div>
                  <div class="row no-gutters mt-3">
                    <p class="review-document-content">Continuous Improvement lorem ipsum sit dollor amet.doc</p>
                    <p class="review-document-content">Ad cum numquam efficiantur.pdf</p>
                  </div>
                  <div class="row no-gutters">
                    <div class="col-lg-6 document">RECIPIENTS</div>
                  </div>
                  <div class="row no-gutters mt-3" style="border-bottom: 1px solid #fcfafa">
                    <div class="col-lg-1 mt-2 mr-3"><div class="recipients-number">1</div></div>
                    <div class="col-lg-6">
                      <div><p class="recipients-title">Roger Waters</p></div>
                      <div><p class="recipients-email">roger.waters@email.com</p></div>
                    </div>
                    <div class="col-lg-3">
                      <p class="recipients-detail "><i class="fa fa-pen"></i>Need to sign</p>
                    </div>
                    
                  </div>
                  <div class="row no-gutters mt-3" style="border-bottom: 1px solid #fcfafa">
                    <div class="col-lg-1 mt-2 mr-3"><div class="recipients-number">2</div></div>
                    <div class="col-lg-6">
                      <div><p class="recipients-title">Barrett Nash-Williams</p></div>
                      <div><p class="recipients-email">barrett.nash_williams@email.com</p></div>
                    </div>
                    <div class="col-lg-3">
                      <p class="recipients-detail "><i class="fa fa-closed-captioning"></i>Receives a copy</p>
                    </div>
                    
                  </div>
                  <div class="row no-gutters mt-3" style="border-bottom: 1px solid #fcfafa">
                    <div class="col-lg-1 mt-2 mr-3"><div class="recipients-number">3</div></div>
                    <div class="col-lg-6">
                      <div><p class="recipients-title">William Jacobson</p></div>
                      <div><p class="recipients-email">William.jacobson@email.com</p></div>
                    </div>
                    <div class="col-lg-3">
                      <p class="recipients-detail "><i class="fa fa-user"></i>In personal signer</p>
                    </div>
                    
                  </div>
                  <div class="row no-gutters mt-3" style="border-bottom: 1px solid #fcfafa">
                    
                    <div class="col-lg-12">
                      <p class="recipients-email ">Once the envelope is completed, all recipients will receive a copy of the completed envelope.</p>
                    </div>
                    
                  </div>
                  <div class="row no-gutters mt-5">
                    <div class="col-lg-12">
                      <a href="" class="form-btn  name-btn">Back</a>
                      <a href="" class="form-btn send-email">Next</a>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <div class="modal fade" id="myModal">
            <div class="modal-dialog"  style="position: relative; background: #fff;;max-width:800px ">
              <div class=" pt-5 pb-5" style="max-width: 60%;margin: 0 auto; padding: 20px;">
                <div class="content">
                  <div class="text-center" style="padding-bottom: 30px;"><img src="../../../images/send.png"></div>
                  <div class="modal-heaing text-center"><h2 class="you-done" style="margin-bottom: 30px;">You're Done</h2></div>
                  <div><p class="you-done-modal-content">Thank You for using CoffeeSign! After all recipients finish signing, you will recieve an email with a link to the document.</p></div>
                  <div class="text-center ">
                    <a href="" class="btn go-home p-3">Go to the Home page</a>
                  </div>
                </div>
              </div>
            </div>
        </div>
  </div>
  <footercomponent></footercomponent>
 <!--  <footer>
    <p class="footer">© 2019 CoffeeSign All rights reserved.</p>
  </footer> -->
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
 