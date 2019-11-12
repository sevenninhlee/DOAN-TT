<template>
<div class="container-fluied" id="main">
  
  <!-- Button to Open the Modal -->
  <!-- The Modal -->
  <!-- <div  class="sideimage"  style="display: inline-block;">
    
    <center><img class="sidetop" src="../../images/home/modallogo.png">
    <hr style="background: #918179" />
    </center>
  </div> -->
  <headercomponent></headercomponent>
  <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><a class="updateplan">Upgrade Your Plan</a></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mymenu" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li>
          <img src="../../images/home/circal.png" class="menu-li-box">Upload document
        </li>
        <li><img src="../../images/home/circal.png" class="menu-li-box">Add Recipients</li>
        <li><img src="../../images/home/circal.png" class="menu-li-box">Prepare</li>
        <li><img src="../../images/home/circal.png" class="menu-li-box">Review</li>
        <li class="nav-item dropdown" style="bottom: 6px;">
          <a  style="color: black" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Hello, Suzanne!
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a style="cursor: pointer;" class="dropdown-item" @click="toLogin();">Logout</a>
            
          </div>
        </li>
        
      </ul>
      
    </div>
  </nav> -->

    <div class="row no-gutters">
      <div class="col-md-11 offset-md-1 Add-Documents">Add Documents</div>
    </div>
      
    
    <hr style="background-color: #fcfafa;width: 92%" />
    
    <div class="row no-gutters">
        <div class="col-lg-12">
            <div class="text-center">
              <img src="../../images/home/folder.png" class="folder">
            </div>  
            <div class="text-center">
              <p class="dragfile">Drag a file below or <b style="color: #ef634c;cursor: pointer">browse</b> for a file to upload</p>
              <p class="dragfile2 mt-4" style="text-align: center">Or you can use one of the following options:</p>
            </div>
            <div class="dragmenu mb-3">
                 <vue-dropzone
      ref="myVueDropzone"
      :include-styling="false"
      :useCustomSlot="true"
      id="dropzone"
      @vdropzone-upload-progress="uploadProgress"
      :options="dropzoneOptions"
      @vdropzone-file-added="fileAdded"
      @vdropzone-sending-multiple="sendingFiles"
      @vdropzone-success-multiple="success"
      >
      <div class="dropzone-container">
        <div class="file-selector">
          <figure>
            <svg
              width="104px"
              height="104px"
              viewBox="0 0 104 104"
              version="1.1"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              >
              <defs>
              <circle id="path-1" cx="36" cy="36" r="36"></circle>
              <filter
              x="-37.5%"
              y="-29.2%"
              width="175.0%"
              height="175.0%"
              filterUnits="objectBoundingBox"
              id="filter-2"
              >
              <feOffset
              dx="0"
              dy="6"
              in="SourceAlpha"
              result="shadowOffsetOuter1"
              ></feOffset>
              <feGaussianBlur
              stdDeviation="8"
              in="shadowOffsetOuter1"
              result="shadowBlurOuter1"
              ></feGaussianBlur>
              <feColorMatrix
              values="0 0 0 0 0.0117647059   0 0 0 0 0.0862745098   0 0 0 0 0.160784314  0 0 0 0.08 0"
              type="matrix"
              in="shadowBlurOuter1"
              result="shadowMatrixOuter1"
              ></feColorMatrix>
              <feOffset
              dx="0"
              dy="1"
              in="SourceAlpha"
              result="shadowOffsetOuter2"
              ></feOffset>
              <feGaussianBlur
              stdDeviation="1"
              in="shadowOffsetOuter2"
              result="shadowBlurOuter2"
              ></feGaussianBlur>
              <feColorMatrix
              values="0 0 0 0 0.0117647059   0 0 0 0 0.0862745098   0 0 0 0 0.160784314  0 0 0 0.11 0"
              type="matrix"
              in="shadowBlurOuter2"
              result="shadowMatrixOuter2"
              ></feColorMatrix>
              <feMerge>
              <feMergeNode in="shadowMatrixOuter1"></feMergeNode>
              <feMergeNode in="shadowMatrixOuter2"></feMergeNode>
              </feMerge>
              </filter>
              </defs>
              <g
                id="Page-1"
                stroke="none"
                stroke-width="1"
                fill="none"
                fill-rule="evenodd"
                >
                <g
                  id="Artboard"
                  transform="translate(-460.000000, -125.000000)"
                  >
                  <g id="Group-4" transform="translate(412.000000, 129.000000)">
                    <g id="Group-2" transform="translate(58.000000, 0.000000)">
                      <circle
                      id="Oval"
                      fill="#3560FF"
                      opacity="0.100000001"
                      cx="42"
                      cy="42"
                      r="42"
                      ></circle>
                      <g id="Group" transform="translate(6.000000, 6.000000)">
                        <g id="Oval">
                          <use
                          fill="black"
                          fill-opacity="1"
                          filter="url(#filter-2)"
                          xlink:href="#path-1"
                          ></use>
                          <use
                          fill="#FFFFFF"
                          fill-rule="evenodd"
                          xlink:href="#path-1"
                          ></use>
                        </g>
                        <g
                          id="upload-cloud"
                          transform="translate(21.818182, 24.000000)"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          >
                          <polyline
                            id="Path"
                            stroke="#000000"
                            points="19.6458087 17.3789847 14.3565525 12.0897285 9.06729634 17.3789847"
                          ></polyline>
                          <path
                            d="M14.3565525,12.0897285 L14.3565525,24.1794569"
                            id="Path"
                            stroke="#3560FF"
                          ></path>
                          <path
                            d="M25.6438239,20.7792208 C28.2965835,19.3021499 29.6312816,16.1761528 28.8860265,13.1856562 C28.1407715,10.1951596 25.5052337,8.10125672 22.4838689,8.09921935 L20.8179512,8.09921935 C19.7219904,3.76967373 16.1275086,0.577339516 11.7773112,0.0700384831 C7.42711383,-0.43726255 3.22057026,1.84535014 1.19724759,5.81113853 C-0.826075091,9.77692693 -0.247870665,14.6059952 2.6515151,17.9569414"
                            id="Path"
                            stroke="#3560FF"
                          ></path>
                          <polyline
                            id="Path"
                            stroke="#3560FF"
                            points="19.6458087 17.3789847 14.3565525 12.0897285 9.06729634 17.3789847"
                          ></polyline>
                        </g>
                      </g>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
          </figure>
          Drop Or Add Files Here
          <p class="separator"><span> or </span></p>
          <button type="button">Browse</button>
        </div>
      </div>
      </vue-dropzone>
            </div>
            <div class="row no-gutters  text-center">
                <div class="col-md-1  col-2 offset-md-4 offset-2" >
                  <a>
                    <img src="../../images/home/dropbox.png" class="folder" @click="dropboxIconClicked();">
                  </a>
                </div>
            <div class="col-md-1 col-2">
              <a  @click="driveIconClicked();">
                <img src="../../images/home/google-drive.png" class="folder">
              </a>
            </div>
        
            <div class="col-md-1 col-2">
              <a @click="launchOneDrivePicker();">
                <img src="../../images/home/onedrive.png" class="folder">
              </a>
            </div>
            <div id="box-select" data-link-type="shared" data-multiselect="true" data-client-id="844249" class="col-md-1 col-2">
              <a @click="boxIconClicked();">
                <img src="../../images/home/box.png" class="folder">
              </a>
            </div>
            </div>
            <div class="text-center">
                 <p class="dragfile2 mt-4 mb-3" style="text-align: center">Or you can use your templates</p>
        <center><a href="" class="gototemplete " >Go to My Templates</a></center>
        <AttachmentList
        :tempAttachments="getTempAttachments"
        :attachments="getAttachments"
        />
            </div>
            <div class="row no-gutters text-center">
                <div class="col-lg-4  offset-lg-4" >
                   <button class="form-btn send-email" @click="uploadImage">Next</button>
                </div>  
            </div>
        </div>
    </div>

    <div class="dragmenu row no-gutters">
    <!--  <div class="col-lg-12">
        <vue-dropzone
      ref="myVueDropzone"
      :include-styling="false"
      :useCustomSlot="true"
      id="dropzone"
      @vdropzone-upload-progress="uploadProgress"
      :options="dropzoneOptions"
      @vdropzone-file-added="fileAdded"
      @vdropzone-sending-multiple="sendingFiles"
      @vdropzone-success-multiple="success"
      >
      <div class="dropzone-container">
        <div class="file-selector">
          <figure>
            <svg
              width="104px"
              height="104px"
              viewBox="0 0 104 104"
              version="1.1"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              >
              <defs>
              <circle id="path-1" cx="36" cy="36" r="36"></circle>
              <filter
              x="-37.5%"
              y="-29.2%"
              width="175.0%"
              height="175.0%"
              filterUnits="objectBoundingBox"
              id="filter-2"
              >
              <feOffset
              dx="0"
              dy="6"
              in="SourceAlpha"
              result="shadowOffsetOuter1"
              ></feOffset>
              <feGaussianBlur
              stdDeviation="8"
              in="shadowOffsetOuter1"
              result="shadowBlurOuter1"
              ></feGaussianBlur>
              <feColorMatrix
              values="0 0 0 0 0.0117647059   0 0 0 0 0.0862745098   0 0 0 0 0.160784314  0 0 0 0.08 0"
              type="matrix"
              in="shadowBlurOuter1"
              result="shadowMatrixOuter1"
              ></feColorMatrix>
              <feOffset
              dx="0"
              dy="1"
              in="SourceAlpha"
              result="shadowOffsetOuter2"
              ></feOffset>
              <feGaussianBlur
              stdDeviation="1"
              in="shadowOffsetOuter2"
              result="shadowBlurOuter2"
              ></feGaussianBlur>
              <feColorMatrix
              values="0 0 0 0 0.0117647059   0 0 0 0 0.0862745098   0 0 0 0 0.160784314  0 0 0 0.11 0"
              type="matrix"
              in="shadowBlurOuter2"
              result="shadowMatrixOuter2"
              ></feColorMatrix>
              <feMerge>
              <feMergeNode in="shadowMatrixOuter1"></feMergeNode>
              <feMergeNode in="shadowMatrixOuter2"></feMergeNode>
              </feMerge>
              </filter>
              </defs>
              <g
                id="Page-1"
                stroke="none"
                stroke-width="1"
                fill="none"
                fill-rule="evenodd"
                >
                <g
                  id="Artboard"
                  transform="translate(-460.000000, -125.000000)"
                  >
                  <g id="Group-4" transform="translate(412.000000, 129.000000)">
                    <g id="Group-2" transform="translate(58.000000, 0.000000)">
                      <circle
                      id="Oval"
                      fill="#3560FF"
                      opacity="0.100000001"
                      cx="42"
                      cy="42"
                      r="42"
                      ></circle>
                      <g id="Group" transform="translate(6.000000, 6.000000)">
                        <g id="Oval">
                          <use
                          fill="black"
                          fill-opacity="1"
                          filter="url(#filter-2)"
                          xlink:href="#path-1"
                          ></use>
                          <use
                          fill="#FFFFFF"
                          fill-rule="evenodd"
                          xlink:href="#path-1"
                          ></use>
                        </g>
                        <g
                          id="upload-cloud"
                          transform="translate(21.818182, 24.000000)"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          >
                          <polyline
                            id="Path"
                            stroke="#000000"
                            points="19.6458087 17.3789847 14.3565525 12.0897285 9.06729634 17.3789847"
                          ></polyline>
                          <path
                            d="M14.3565525,12.0897285 L14.3565525,24.1794569"
                            id="Path"
                            stroke="#3560FF"
                          ></path>
                          <path
                            d="M25.6438239,20.7792208 C28.2965835,19.3021499 29.6312816,16.1761528 28.8860265,13.1856562 C28.1407715,10.1951596 25.5052337,8.10125672 22.4838689,8.09921935 L20.8179512,8.09921935 C19.7219904,3.76967373 16.1275086,0.577339516 11.7773112,0.0700384831 C7.42711383,-0.43726255 3.22057026,1.84535014 1.19724759,5.81113853 C-0.826075091,9.77692693 -0.247870665,14.6059952 2.6515151,17.9569414"
                            id="Path"
                            stroke="#3560FF"
                          ></path>
                          <polyline
                            id="Path"
                            stroke="#3560FF"
                            points="19.6458087 17.3789847 14.3565525 12.0897285 9.06729634 17.3789847"
                          ></polyline>
                        </g>
                      </g>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
          </figure>
          Drop Or Add Files Here
          <p class="separator"><span> or </span></p>
          <button type="button">Browse</button>
        </div>
      </div>
      </vue-dropzone>
     </div> -->
    
  

  
    <!-- <p class="dragfile2 mt-4 mb-3" style="text-align: center">Or you can use your templates</p> -->
  <!--       <center></center>er><a href="" class="gototemplete " >Go to My Templates</a></center> -->
      <!-- <AttachmentList
        :tempAttachments="getTempAttachments"
        :attachments="getAttachments"
        /> -->
<!--         <div class="progress">
          <div id="dynamic" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
            <span id="current-progress"></span>
          </div>
        </div> -->
      </div>

        <div class="modal viewmodal" id="myModal" ref="myModal">
          

        <div class="modal-dialog"  style="background: white;">
          <div class="modal-content">
            <div id="modalimage" class="Group-711">
              <center>    <img  class="dark3xvv" src="../../images/home/modallogo.png">
              </center>
            </div>
            <div id="sucess-message" class="alert alert-success alert-block" role="alert" style="display: none;">
            <button class="close" data-dismiss="alert"></button>
            Successfully saved.
             </div>
             <div id="error-message" class="alert alert-danger alert-block" role="alert" style="display: none;">
                <button class="close" data-dismiss="alert"></button>
                Something went wrong!
            </div>
            <center>
            <div>
              
              <h2 class="welcome">Welcome!</h2>
            </div>

            <div>
              <p class="Now-you-can-use-easy-and-simple-digital-signatuers ">Now you can use easy and simple digital signatuers</p>
            </div>
            <div>
              <p class="You-can-use-5-times-for-FREE">You can use 5 times for FREE</p>
            </div>
            </center>
            <form method="post" >
            <div class="container">
              <div class="row">
                <div class="col-md-6"><input type="text" v-model="first_name" placeholder="First Name" class="Rectangle-38" >  <p class="errors" v-if="errors.first_name">{{errors.first_name[0]}}</p></div>
              
                <div class="col-md-6"><input type="text" v-model="last_name" placeholder="Last Name" class="Rectangle-38" ><p class="errors" v-if="errors.last_name">{{errors.last_name[0]}}</p></div>
              </div>
              <br/>
              <div class="row">
                <div class="col-md-12">
                  <select name="" id="input" class="Path-716" required="required" v-model="purpose">
                    <option value="">Purpose of using</option>
                    <option value="1">Notary</option>
                    <option value="2">General</option>
                  </select>
                  <p class="errors" v-if="errors.purpose">{{errors.purpose[0]}}</p>
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-md-6"><input type="text" v-model="company" placeholder="Company" class="Rectangle-38" >
                <p class="errors" v-if="errors.company">{{errors.company[0]}}</p>
              </div>
                <div class="col-md-6"><select v-model="employee" name="" id="input" class="Employee" required="required">
                  <option value="">Employee</option>
                   <option value="1">Individual</option>
                   <option value="2">Company</option>
                   <option value="3">Organization</option>

                </select>
                <p class="errors" v-if="errors.employee">{{errors.employee[0]}}</p>
              </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-md-6" ><input v-model="job_title" type="text" name="" placeholder="Job Title" class="Rectangle-38" ><p class="errors" v-if="errors.job_title">{{errors.job_title[0]}}</p></div>
                <div class="col-md-6" >
                  <select name="" id="input" v-model="industry" class="Employee" required="required">
                  <option value="">Select Industry</option>
                  <option value="1">Industry1</option>
                  <option value="2">Industry2</option>
                  <option value="3">Industry3</option>
                </select>
                 <p class="errors" v-if="errors.industry">{{errors.industry[0]}}</p>
              </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-md-12">
                <button type="button" class="Rectangle-4" @click="introSubmit()">Get Started</button></div>
              </div>
            </div>
           </form>
          </div>
        </div>
      </div>
    
    <!-- <div class="modal fade" id="myModal1">
      <div class="modal-dialog"  style="height:746px ;max-width:924px ;background: white;">
        <div class="modal-content">
          <div class="row justify-content-center">
            <div class="col-md-8">
              
              
              <div class="card card-default">
                <div class="card-header">File Upload Component</div>
                <div class="card-body">
                  
                  <a href="api/google-return">Google drive</a>
                  
                  <div class="row">
                    <div class="col-md-3" v-if="image">
                      <div v-for="(file, key) in files" class="file-listing">
                        <img class="preview" v-bind:ref="'preview'+parseInt(key)"/>
                        {{ file.name }}
                        <div class="success-container" v-if="file.id > 0">
                          Success
                        </div>
                        <div class="remove-container" v-else>
                          <a class="remove" v-on:click="removeFile(key)">Remove</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 large-12 medium-12 small-12 filezone">
                      <input type="file" id="files" ref="files"  name="image" multiple v-on:change="onImageChange" class="form-control">
                      <p>
                        Drop your files here <br>or click to search
                      </p>
                    </div>
                    <div class="col-md-3" >
                      <button class="btn btn-success btn-block" @click="uploadImage">Upload Image</button>
                    </div>
                  </div>
                  
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div> -->
      <footercomponent></footercomponent>
  </div>
  </template>
 <!-- <style type="text/css">
   .fade:not(.show) {
    opacity: 1 !important;
}
</style>  -->   
<script>
import Header from "../views/common/Header";
import Footer from "../views/common/Footer";
import vue2Dropzone from 'vue2-dropzone';
import 'vue2-dropzone/dist/vue2Dropzone.min.css';
import AttachmentList from "../AttachmentList";

import config from '../config/config'
export default {
        name: "Home",
        props : ['checkedItems'],
        components: {
            vueDropzone: vue2Dropzone,
            AttachmentList: AttachmentList,
            'headercomponent':Header,
          'footercomponent':Footer
            },
         data(){

            return {
              showModal: true,
                  tempAttachments: [],
                   attachments: [],
                image: [],
                files: [],
                image_path:'',
                images_test:[],
                pickerApiLoaded: false,
              developerKey: "AIzaSyAiVoogBscIXW9QEpJahYlSLZvxHcEgbHI",
              clientId: "314805842958-l0l1v7d86ma20tne3jtckga9dp0d59kf.apps.googleusercontent.com",
              scope: "https://www.googleapis.com/auth/drive",
              oauthToken: null,
              dropzoneOptions: {
                // The Url Where Dropped or Selected files will be sent
                url: `https://httpbin.org/post`,
                // File Size allowed in MB
                maxFilesize: 102400000,
                // Authentication Headers like Access_Token of your application
                headers: {
                  Authorization: `Access Token`
                },
                // The way you want to receive the files in the server
                paramName: function(n) {
                  return "file[]";
                },
                dictDefaultMessage: "Upload Files Here xD",
                includeStyling: false,
                previewsContainer: false,
                thumbnailWidth: 250,
                thumbnailHeight: 140,
                uploadMultiple: true,
                parallelUploads: 20
              },
              first_name :'',
              last_name:'',
              purpose:'',
              company:'',
              employee:'',
              job_title:'',
              industry:'',
              errors: []
            }
        },
         mounted() {  

          console.log(this.$refs.myModal);
          this.$refs.myModal.style.display = "block";

          //$("#mymodal").show();

           this.$session.start()
          /* if (this.$session.exists("user_email")) 
           {
            console.log(this.$session.get("user_email"));
          }
          else
          {
            console.log('false');
          }*/
          
           if(/*!this.$session.exists("user_email") && !this.$session.exists("user_password")  && this.$session.get("user_email") == "undefined" && */this.$session.get("user_password") == undefined && this.$session.get("user_email") == undefined)
           {
              this.$router.push({ name: 'Login' })
           }
            
            let dropBox = document.createElement("script");
            dropBox.setAttribute(
              "src",
              "https://www.dropbox.com/static/api/2/dropins.js"
            );
            dropBox.setAttribute("id", "dropfiles");
            dropBox.setAttribute("data-app-key", "az2dp400kxf81n9");
           
           /* let options = 
            {
                    // Required. Called when a user selects an item in the Chooser.
                    success: async files => {
                      console.log(files);
                    },
                    // Optional. Called when the user closes the dialog without selecting a file
                    // and does not include any parameters.
                    cancel: function() {},
                    linkType: "preview",
                    extensions: [
                      ".pdf",
                      ".doc",
                    ],
                    folderselect: false, // or true
                    sizeLimit: 102400000 // or any positive number
                };
               //dropBox.choose(options);
               var button = dropBox.choose(options);
                console.log(options);
                 document.head.appendChild(dropBox);*/     
                
       
   }, 

         created() {

            this.checkSocialLogin()
            //EventBus.$on('checkedemaititems', this.onListUpdate);
            //EventBus.$on('checkedemaititems', this.onListUpdate)
       

      //var __CHILD_WINDOW_HANDLE = null;
    },
beforeDestroy() {
    //EventBus.$off('checkedemaititems');
},
        methods: {
           checkSocialLogin() {
            var urlParams = new URLSearchParams(window.location.search)
            var code = urlParams.get('code')

            if (code != undefined) {
                // this.$router.push({ name: 'LoginC', params: { code: code } })
                window.location.href = config.BASE_URL + '/#/login/' + code
            }
        },
            fileAdded(file) {
              this.files = file;
      console.log("File Dropped => ", file);
      // Construct your file object to render in the UI
      let attachment = {};
      attachment._id = file.upload.uuid;
      attachment.title = file.name;
      attachment.type = "file";
      attachment.extension = "." + file.type.split("/")[1];
      attachment.user = JSON.parse(localStorage.getItem("user"));
      attachment.content = "File Upload by Select or Drop";
      attachment.thumb = file.dataURL;
      attachment.thumb_list = file.dataURL;
      attachment.isLoading = true;
      attachment.progress = null;
      attachment.size = file.size;
      this.tempAttachments = [...this.tempAttachments, attachment];
    },
    // a middle layer function where you can change the XHR request properties
    sendingFiles(files, xhr, formData) {
      console.log(
        "if you want to change the upload time or add data to the formData you can do it here."
      );
      this.files = files;
      console.log("Files sending", files);
    },
    // function where we get the upload progress
    uploadProgress(file, progress, bytesSent) {
      console.log("File Upload Progress", progress);




      this.tempAttachments.map(attachment => {
        if (attachment.title === file.name) {
          attachment.progress = `${Math.floor(progress)}`;
  //           var current_progress = Math.round( progress );
  // var interval = setInterval(function() {
  //     current_progress += 10;
  //     $("#dynamic")
  //     .css("width", current_progress + "%")
  //     .attr("aria-valuenow", current_progress)
  //     .text(current_progress + "% Complete");
  //     if (current_progress >= 100)
  //         clearInterval(interval);
  // }, 1000);
/*                  var current_progress = Math.round( progress );
  var interval = setInterval(function() {
      current_progress += 0;
      $("#dynamic") 
      .css("width", current_progress + "%")
      .attr("aria-valuenow", current_progress)
      .text(current_progress + "% Complete");
      if (current_progress == 100)
          clearInterval(interval);
  }, 1000);*/

        }
      });
    },
    // called on successful upload of a file
    success(file, response) {
      console.log("File uploaded successfully");
      console.log("Response is ->", response);
    },
            async driveIconClicked() {
      console.log("Clicked");
      await gapi.load("auth2", () => {
        console.log("Auth2 Loaded");
        gapi.auth2.authorize(
          {
            client_id: this.clientId,
            scope: this.scope,
            immediate: false
          },
          this.handleAuthResult
        );
      });
      gapi.load("picker", () => {
        console.log("Picker Loaded");
        this.pickerApiLoaded = true;
        this.createPicker();
      });
    },
    handleAuthResult(authResult) {
      console.log("Handle Auth result", authResult);
      if (authResult && !authResult.error) {
        this.oauthToken = authResult.access_token;
        this.createPicker();
      }
    }, 
    createPicker() {
      console.log("Create Picker", google.picker);
      if (this.pickerApiLoaded && this.oauthToken) {
        var picker = new google.picker.PickerBuilder()
          .enableFeature(google.picker.Feature.MULTISELECT_ENABLED)
          .addView(google.picker.ViewId.DOCS)
          .setOAuthToken(this.oauthToken)
          .setDeveloperKey("AIzaSyAiVoogBscIXW9QEpJahYlSLZvxHcEgbHI")
          .setCallback(this.pickerCallback)
          .build();
        picker.setVisible(true);
      }
    },
    async pickerCallback(data) {
      console.log("PickerCallback", data);
      var url = "nothing";
      var name = "nothing";
      if (data[google.picker.Response.ACTION] === google.picker.Action.PICKED) 
      {
        let files = data.docs;
        let attachments = [];
        for (let i = 0; i < files.length; i++) 
        {
            let attachment = {};
            attachment._id = files[i].id;
            attachment.title = files[i].name;
            attachment.type = "file";
            attachment.thumb = files[i].dataURL;
            attachment.thumb_list = files[i].dataURL;
            attachment.isLoading = true;
            attachment.progress = null;
            attachment.size = files[i].bytes;
            attachment.iconURL = files[i].icon;
            attachment.link = files[i].link;
            attachment.extension = `. ${files[i].name.split(".")[1]}`;
            attachments.push(attachment);
        }
        this.tempAttachments = attachments;
        console.log(this.tempAttachments);
      }
    },
            onListUpdate (message) {
                //window.opener.location.reload();
              
             this.image_path = message;

             //alert();
          },
            popupwindow()
            {
                
                window.open('/api/google-return', '_blank', 'width=700,height=500,left=200,top=100');


            },
            dropboxIconClicked() {
             let options = {
              success: async files => {
               let attachments = [];
               for (let i = 0; i < files.length; i++) {
                let attachment = {};
                 attachment._id = files[i].id;
                attachment.title = files[i].name;
                attachment.type = "file";
                attachment.thumb = files[i].dataURL;
                attachment.thumb_list = files[i].dataURL;
                attachment.isLoading = true;
                attachment.progress = null;
                attachment.size = files[i].bytes;
                attachment.iconURL = files[i].icon;
                attachment.link = files[i].link;
                attachment.extension = `. ${files[i].name.split(".")[1]}`;
                attachments.push(attachment);
               }
               this.tempAttachments = attachments;
               console.log(this.tempAttachments);
              },

              cancel: function() {},

              linkType: "preview",

              multiselect: true,

              extensions: [
               ".pdf",
               ".doc",
               ".docx",
              ],

              folderselect: true,

              sizeLimit: 102400000
            };
             Dropbox.choose(options);
            },
            launchOneDrivePicker()
            {

                let pickerOptions = {
                    clientId:"7c96e807-178f-43c9-bee6-0d6055d90b41",
                    action: "query",
                    viewType:"all",
                     advanced: {
                      queryParameters: "select=id,name,size,file,folder,photo,@microsoft.graph.downloadUrl",
                        redirectUri: "https://www.coffeesign.io/"
                    },
                    multiSelect: true, // or true
                    openInNewWindow: true, // or false
                   
                  success: function(files) {
                    console.log(files);
                    // Handle returned file object(s)
                    //alert("You picked " + files.values[0].fileName);
                  },

                  cancel: function() {
                    // Handle when the user cancels picking a file
                  },

                  error: function(e) {
                    // Handle when there is an error getting a link to the selected file
                    //console.log(e);
                  }

                  //linkType: "downloadLink", // or webLink
                  
                }
                 OneDrive.open(pickerOptions);

            },
            checkSocialLogin() {
            var urlParams = new URLSearchParams(window.location.search)
            var code = urlParams.get('code')

            if (code != undefined) {
                // this.$router.push({ name: 'LoginC', params: { code: code } })
                window.location.href = config.BASE_URL + '/#/login/' + code
            }
        },
        toLogin() {
          this.$session.destroy("user_email");
          this.$session.destroy("user_password");
            this.$router.push({ name: 'Login' })
        },
            onImageChange(e) {
                let uploadedFiles  = e.target.files || e.dataTransfer.files;
                if (!uploadedFiles.length)
                    return;

                for (var i = uploadedFiles.length - 1; i >= 0; i--) {
                    this.files.push(uploadedFiles[i]);
                }

                this.createImage(this.image);
            },
            removeFile( key ){
                this.files.splice( key, 1 );
                this.getImagePreviews();
            },
            createImage(file) {
                //let reader = new FileReader();
                //let vm = this;
               /* reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);*/
                $('#upload_image_display').show();

                for (var i=0; i<this.files.length; i++)
                {
                    let reader = new FileReader(); //instantiate a new file reader
                    reader.addEventListener('load', function(){
                      //this.$refs['preview' + parseInt( i )][0].src = reader.result;
                      //vm.image = reader.result;
                    }.bind(this), false);  //add event listener

                    reader.readAsDataURL(this.files[i]);
                }
                this.getImagePreviews();

            },
            getImagePreviews(){
                for( let i = 0; i < this.files.length; i++ ){
                    if ( /\.(jpe?g|png|gif)$/i.test( this.files[i].name ) ) {
                        let reader = new FileReader();
                        reader.addEventListener("load", function(){
                            this.$refs['preview'+parseInt(i)][0].src = reader.result;
                        }.bind(this), false);
                        reader.readAsDataURL( this.files[i] );
                    }else{
                        this.$nextTick(function(){
                            this.$refs['preview'+parseInt(i)][0].src = '/img/generic.png';
                        });
                    }
                }
            },
            uploadImage(){
               /* console.log(this.image);
                axios.post('/image/store',{image: this.image}).then(response => {
                   if (response.data.success) {
                     alert(response.data.success);
                   }
                });*/
              this.$router.push({ name: 'Recipient',params: { file: this.files} });
              
              /*return false;
              console.log(this.files);
               


                 for( let i = 0; i < this.files.length; i++ ){
                    if(this.files[i].id) {
                        continue;
                    }
                    let formData = new FormData();
                    formData.append('file', this.files[i]);

                    axios.post('/image/store',
                        formData,
                        {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        }
                    ).then(function(data) {
                        this.files[i].id = data['data']['id'];
                        this.files.splice(i, 1, this.files[i]);
                        
                        this.files = [];
                        $('#upload_image_display').hide();
                        alert("File uploaded successfully");
                    }.bind(this)).catch(function(data) {
                        console.log('error');
                    });
                }*/

            },
            boxIconClicked()
            {
                let options = {
                  clientId: "844249",
                  linkType: 'shared',
                  multiselect: 'true'
                };
                let boxSelect = new BoxSelect(options);

                // Register a success callback handler
                boxSelect.success(function(response) {
                 
                let fileNames = [];
                let sharedLinks = [];
                 let attachments = [];
                //Parse file names and shared links from response. Store data into arrays.
                for(let i = 0; i < Object.keys(response).length; i++) {
                    var obj = response[i];
                    fileNames.push(obj.name);
                    sharedLinks.push(obj.url);

                     let attachment = {};
                     attachment._id = obj.id;
                    attachment.title = obj.name;
                    attachment.type = "file";
                    /*attachment.thumb = obj.dataURL;
                    attachment.thumb_list = obj.dataURL;*/
                    attachment.isLoading = true;
                    attachment.progress = null;
                   /* attachment.size = obj.bytes;
                    attachment.iconURL = obj.icon;*/
                    attachment.link = obj.url;
                    
                    attachments.push(attachment);
              
               
                }
                console.log(attachments);
                this.tempAttachments = attachments;

                //Get current value for file-list div
                //let currentStr = document.getElementById("file-list").innerHTML;

                //Add sharedLinks to file-list div with file names as anchor text
               /* for (let i=0; i<sharedLinks.length; i++) {
                  document.write(currentStr + "<br>" + "<a href='" + sharedLinks[i] + "'>" + fileNames[i] + "</a>");
                }*/

                });
                // Register a cancel callback handler
                boxSelect.cancel(function() {
                  console.log("The user clicked cancel or closed the popup");
                });
            },
            introSubmit()   
            {
               /*this.$refs.myModal.style.display = "none";
              return false;*/
             
                  axios.post('api/introsubmit',{email : this.$session.get("user_email"),first_name:this.first_name,last_name:this.last_name,purpose:this.purpose,company:this.company,employee:this.employee,job_title:this.job_title,industry:this.industry}).then(response =>{
                            
                        if(response.status == 200)
                        {  
                          $("#sucess-message").show(); 
                          setTimeout(function(){
                           
                           $("#myModal").hide();
                          }, 2000);
                        }

                    }).catch(error => {
                      
                        if(error.response.status == 422)
                        {
                          this.errors = error.response.data.errors;
                        }
                    });
            }
          /*  googledrive()
            {
               
                this.$http.get('/api/google-return/').then(response => 
                {
                     this.$http.post(response.data).then(response => 
                    {
                        console.log(response.data)
                    }).catch(err => {
                        console.log({err:err})
                    })
                    console.log(response.data)
                }).catch(err => {
                    console.log({err:err})
                })
            }
            */
        },
         computed: {
    getTempAttachments() {
      return this.tempAttachments;
    },
    getAttachments() {
      return this.attachments;
    }
  }
}
</script>


<style lang="scss" scoped>

    div.remove-container a{
        color: red;
        cursor: pointer;
    }
    #modalimage{ background-image:url('../../images/home/Group 71.png');}
            .Group-711 {
            object-fit: contain;
                padding: 23px 17px;
        }
        .viewmodal{
              top: -17px !important;
        }
        .modal-dialog{
          width: 750px;
          max-width: 750px;
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
        margin-top: 30px;
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
        width: 334px;
        height: 50px;
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
        margin-bottom: 10px;
        }
        .dark3xvv {
        width: 200px;
        height: 65px;
        object-fit: contain;
        }
        .container{
        width: 700px;
        }
        .sideimage{
        width: 260px;
        height:960px;
        object-fit: contain;
        float: left;
        background-image:url('../../images/home/side.png');
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
  /*      .mymenu ul li{
        display: inline-block;
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
        border: 0px;
        }*/
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
        }
        .mymenu{
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
        .dragfile{
        font-family: Roboto;
        font-size: 19px;
        font-weight: 600;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.56;
        letter-spacing: normal;
        text-align: center;
        color: #2e221e;
        }
        .folder{
        width: 53px;
        height: 50px;
        object-fit: contain;
        }
        .dragfile2{
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
        .dragmenu ul li{
        list-style: none;
        display: inline-block;
        padding: 20px;
        }
        .gototemplete{
              font-family: Roboto;
  font-size: 16px;
  font-weight: normal;
  font-style: normal;
  font-stretch: normal;
  line-height: 1.31;
  letter-spacing: normal;
  text-align: center;
  color: #202020;
  border: 1px solid #ebebeb;
  padding: 13px;
        }
        .file-selector {
 
  font-weight: 600;
  background-color: #f9f9f9;
  color: #4e5b69;
  z-index: -9;
}
figure {
  margin: 0px;
}

.dropzone-container {
  display: flex;
  flex-direction: column;
  border: 1px dashed #ccc;
  border-radius: 15px;
}
h1,
h2 {
  font-weight: normal;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
/*button {
  background: #031629;
  box-shadow: 0 0 2px 0 rgba(3, 22, 41, 0.11),
    0 6px 16px 0 rgba(3, 22, 41, 0.08);
  font-family: SFProDisplay-Regular;
  font-size: 14px;
  color: #ffffff;
  letter-spacing: 0.4px;
  padding: 12px 30px;
  border-radius: 4px;
}*/
.separator {
  position: relative;
}
.separator:after {
  position: absolute;
  content: "";
  height: 1px;
  width: 200px;
  background: #d8d8d8;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
span {
  position: relative;
  background: #f9f9f9;
  padding: 0 4px;
  z-index: 9;
  font-size: 12px;
  color: #4e5b69;
}
.menu-li-box{
  width: 21px;
  height: 21px;
  object-fit: contain;
  background-color: rgba(239, 99, 76, 0.1);margin-right: 10px;
}
@media screen and (min-width: 332px) and (max-width: 768px){
    .sideimage
    {
      display: none !important;
    }
}
.progress {
  margin: 10px;
  width: 700px;
}

</style>  

        
