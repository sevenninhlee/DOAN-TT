<template>
  <div class="app flex-row">
    <div class="w-100 document-list">
      <div class="action-header">
        <h1>Document List</h1>
        <div class="action-search-field">
          <UserSelect
            v-bind:value="progress_status"
            v-bind:items="['Status', 'All', 'Need my signiture', `Need other's signiture`, 'Completed', 'Declined', 'Voided']"
            @changeValue="changeProgressStatus"
            class="mb-0 mx-1 mobile-style"
          />
          <UserSelect
            v-bind:value="period"
            v-bind:items="['Date', 'Last 24 Hours', 'Last Week', 'Last 30 Days', 'Last 6 Months', 'Custom']"
            @changeValue="changePeriod"
            class="mb-0 mx-1 mobile-style"
          />
          <b-input-group class="min-width-378px ml-1">
            <b-form-input placeholder="Type here to search..." autocomplete="current-password"></b-form-input>
            <b-input-group-prepend class="mr-0">
              <b-input-group-text class="h-auto">
                <i class="fa fa-search"></i>
              </b-input-group-text>
            </b-input-group-prepend>
          </b-input-group>
        </div>
      </div>
      <hr class="mb-4" />
      <div class="actions-table">
        <div class="table-header">
          <div class="d-flex align-items-center">
            <b-form-checkbox v-on:change="clickHeaderCheckbox($event)" v-model="header_checkbox" :indeterminate.sync="indeterminate"></b-form-checkbox>
            <template v-if="selected_items.length>0">
              <span>{{selected_items.length}} Selected</span>
              <b-button variant="outline-primary" class="mx-3">Delete</b-button>
            </template>
            <div class="col-basic-info comments d-mobile-none">DOCUMENT SUBJECT</div>
          </div>
          <div class="d-flex align-items-center d-mobile-none">
            <div class="col-status comments">STATUS</div>
            <div class="col-last-change comments">LAST CHANGE</div>
            <div class="col-action comments">HISTORY</div>
          </div>
        </div>
        <div class="table-body">
          <div class="table-row content-card" v-for="(item, index) in doc_list" :key="index" @contextmenu.prevent="$refs.menu.open($event, {item: item})">
            <div class="row-content">
              <div class="d-flex align-items-center" v-bind:style="item.status == 'Voided'?{opacity: 0.4}:null">
                <b-form-checkbox v-on:change="clickCheckBox($event, index)" v-model="item.selected"></b-form-checkbox>
                <div class="col-basic-info">
                  <img :src="getFileType(item.title)" class="doc-icon" />
                  <div class="ml-3">
                    <div class="doc-name">{{item.title}}</div>
                    <div class="senders comments">
                      {{item.description}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <div class="col-status">
                  <div :class="getStyle(item.status)">{{item.status}}</div>
                </div>
                <div class="col-last-change comments">
                  <div class="date">{{item.date}}</div>
                  <div class="comments">{{item.time}}</div>
                </div>
                <div class="col-action comments collapsed-header" v-b-toggle="'collapse'+index.toString()">
                  <span class="collapsed-icon"><i class="fa fa-caret-down " ></i></span>
                </div>
              </div>
            </div>
            <b-collapse :id="'collapse'+index.toString()" class="row-body">
              <div class="row-detail add-margin-left">
                <div class="d-flex align-items-center">
                  <div class="col-basic-info remove-margin-left">
                    <img src="img/avatars/suzanne.png" />
                    <div class="ml-3">
                      <div class="user-name">Suzanne Martin</div>
                      <div class="comments">Sign status:</div>
                    </div>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="col-status">
                    <div class="status completed">Completed</div>
                  </div>
                  <div class="col-last-change">
                    <div class="date">01.04.2019</div>
                    <div class="comments">11:03:53 am</div>
                  </div>
                  <div class="col-action comments"></div>
                </div>
              </div>
              <div class="row-detail add-margin-left">
                <div class="d-flex align-items-center">
                  <div class="col-basic-info remove-margin-left">
                    <img src="img/avatars/scott.png" />
                    <div class="ml-3">
                      <div class="user-name">Scott Wilkerson</div>
                      <div class="comments">Sign status:</div>
                    </div>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="col-status">
                    <div class="status waiting">Waiting to sign</div>
                  </div>
                  <div class="col-last-change">
                    <div class="date">01.04.2019</div>
                    <div class="comments">11:03:53 am</div>
                  </div>
                  <div class="col-action comments"></div>
                </div>
              </div>
              <div class="row-detail add-margin-left border-bottom-0">
                <div class="d-flex align-items-center">
                  <div class="col-basic-info remove-margin-left">
                    <img src="img/avatars/suzanne.png" />
                    <div class="ml-3">
                      <div class="user-name">Suzanne Martin</div>
                      <div class="comments">Sign status:</div>
                    </div>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="col-status">
                    <div class="status completed">Completed</div>
                  </div>
                  <div class="col-last-change">
                    <div class="date">01.04.2019</div>
                    <div class="comments">11:03:53 am</div>
                  </div>
                  <div class="col-action comments"></div>
                </div>
              </div>
              <div class="user-document">
                <div class="doc-div">
                  <img :src="getFileType('Continuous Improvement.doc')" class="doc-icon" />
                  <div class="doc-name mt-2">Continuous Improvement</div>
                  <div class="senders comments">5 pages</div>
                </div>
              </div>
            </b-collapse>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-between align-items-center flex-wrap">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
          <span class="comments mr-3">Per page</span>
          <div>
            <span class="mr-3 clickable-icon" v-for="(item, index) in pages" :key="index" 
              v-bind:class="item == items_per_page?'selected':'comments'"
              v-on:click ="items_per_page = item"
            >
              {{item}}
            </span>
          </div>
        </div>

        <b-pagination align="right" :total-rows="100" v-model="currentPage" :per-page="10"></b-pagination>
      </div>
    </div>
    <b-modal id="share-modal" ref="share-modal"
       hide-footer centered size="lg">
      <div class="share-modal" v-if="selected_template">
        <div class="title">Do you want to share the XXX template with other users?</div>
        <b-form-group>
          <b-input-group>
            <b-input-group-prepend>
              <b-input-group-text>
                <!-- <i class="fa fa-lock"></i> -->
                <UserIcon icon="file_name.svg" class="mr-2"/>
              </b-input-group-text>
            </b-input-group-prepend>
            <b-form-input
              type="text"
              placeholder="Input file name"
              v-model="selected_template.fileName"
            ></b-form-input>
          </b-input-group>
        </b-form-group>
        <div class="doc-container mb-2">
          <div class="doc-tag" v-for="(item, index) in tags" :key="index">
            {{item}} <i class="fa fa-close ml-1 clickable-icon" v-on:click="tags.splice(index,1);"/>
          </div>
        </div>
        
        <b-form-group>
          <b-input-group>
            <b-input-group-prepend>
              <b-input-group-text>
                <i class="fa fa-tag"/>
              </b-input-group-text>
            </b-input-group-prepend>
            <b-form-input
              type="text"
              placeholder="Input Tag name and click 'Enter'"
              v-model="tag_name"
              v-on:keyup.enter="tags.push(tag_name); tag_name='';"
            ></b-form-input>
          </b-input-group>
        </b-form-group>
        <div class="d-flex flex-wrap mb-4">
          <div class="proposed-tag" v-for="(item, index) in proposed_tag" :key="index">
            {{item}}
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary" v-on:click="shareTemplate()">Share this template</button>
        </div>
      </div>
    </b-modal>
    <vue-context ref="menu" class="context-menu">
      <template slot-scope="child">
        <li><a href="#" @click.prevent="onClick($event, child.data)"><i class="fa fa-pencil mr-2 clickable-icon"/>Sign</a></li>
        <li><a href="#" @click.prevent="onClick($event, child.data)"><i class="fa fa-copy mr-2 clickable-icon"/>Create a copy</a></li>
        <li><a href="#" @click.prevent="openShareModal(child.data)"> <i class="fa fa-download mr-2 clickable-icon"/>Save as template</a></li>
        <li><a href="#" @click.prevent="onClick($event, child.data)"><i class="fa fa-clock-o mr-2 clickable-icon"/>History</a></li>
        <li><a href="#" @click.prevent="onClick($event, child.data)"><i class="fa fa-file-excel-o mr-2 clickable-icon"/>Export as CSV</a></li>
        <li><a href="#" @click.prevent="onClick($event, child.data)"><i class="fa fa-trash mr-2 clickable-icon"/>Delete</a></li>
      </template>
    </vue-context>
  </div>
</template>

<script>
import UserIcon from "../../components/UserIcon";
import UserSelect from "../../components/UserSelect";
import { VueContext } from 'vue-context';
export default {
  name: "DocumentList",
  components: {
    UserIcon,
    UserSelect,
    VueContext
  },
  data() {
    return {
      header_checkbox: false,
      indeterminate: false,
      selected_items: [],
      items_per_page: 10,
      pages: [10, 25, 50, 100],
      tag_name: "",
      selected_template: null,
      tags: ["Inquiry", "Report", "Tag #3", "Tag #4", "Tag #5", "Tag 6", "Report", "Tag #3", "Tag #4"],
      proposed_tag: ["Proposed tag", "Example proposed tag", "Proposed tag"],
      doc_list: [
        {
          selected: false, 
          title: 'Continuous Improvement.doc', 
          description: 'to me, Scott Wilkerson, Hannah Harmon',
          date: '22.05.2019',
          time: '06:15:16 am',
          status: 'Completed',
        },
        {
          selected: false, 
          title: 'to me, Scott Wilkerson, Hannah Harmon.pdf', 
          description: 'to me, Scott Wilkerson, Hannah Harmon',
          date: '22.05.2019',
          time: '06:15:16 am',
          status: 'Waiting to sign',
        },
        {
          selected: false, 
          title: 'Wisi paulo graeci vis at, est minimum suavitate assentior eu.doc', 
          description: 'to me, Scott Wilkerson, Hannah Harmon',
          date: '22.05.2019',
          time: '06:15:16 am',
          status: 'Rejected',
        },
        {
          selected: false, 
          title: 'Ea paulo fastidii convenire duo.doc', 
          description: 'to me, Scott Wilkerson, Hannah Harmon',
          date: '22.05.2019',
          time: '06:15:16 am',
          status: 'Waiting to sign',
        },
        {
          selected: false, 
          title: 'Nec ubique facilisi no, id eius percipitur eum.pdf', 
          description: 'to me, Scott Wilkerson, Hannah Harmon',
          date: '22.05.2019',
          time: '06:15:16 am',
          status: 'Waiting to sign',
        },
        {
          selected: false, 
          title: 'Wisi paulo graeci vis at, est minimum suavitate assentior eu.doc', 
          description: 'to me, Scott Wilkerson, Hannah Harmon',
          date: '22.05.2019',
          time: '06:15:16 am',
          status: 'Rejected',
        },
        {
          selected: false, 
          title: 'Populo prompta nam te, has tritani fabellas assueverit te pro ex inermis oportere.doc', 
          description: 'to me, Scott Wilkerson, Hannah Harmon',
          date: '22.05.2019',
          time: '06:15:16 am',
          status: 'Voided',
        },
      ],
      currentPage: 1,
      period: "Date",
      progress_status: "Status",
      actions: [
        {
          setted: false,
          fileName: "Continuous Improvement.pdf"
        }
      ]
    };
  },
  methods: {
    getStyle(status){
      if(status == 'Completed') {
        return "status completed"
      } else if(status == 'Waiting to sign') {
        return "status waiting"
      } else if(status == 'Rejected') {
        return "status rejected"
      } else if(status == 'Voided') {
        return "status voided"
      } 
      return "status completed";
    },
    shareTemplate() {

    },
    openShareModal(item) {
      this.selected_template = item;
      this.$refs['share-modal'].show();
    },
    clickHeaderCheckbox($event) {
      this.selected_items = [];
      this.doc_list.forEach((item, index) => {
        item.selected = $event;
        if($event) this.selected_items.push(index);
      });
    },
    clickCheckBox($event, index) {
      console.log($event, index);
      const pos = this.selected_items.indexOf(index);
      if($event) {
        if(pos<0) this.selected_items.push(index);
      } else {
        if(pos>=0) this.selected_items.splice(pos, 1);
      }
      if(this.selected_items.length>0) {
        
        if(this.selected_items.length == this.doc_list.length){
          this.header_checkbox = true;
          this.indeterminate = false;
        } else {
          this.indeterminate = true;
        }
      } else {
        this.indeterminate = false;
        this.header_checkbox = false;
      }
    },
    onClick(event, data) {
      console.log(data);

    },
    getFileType(fileName) {
      return "img/icons/" + fileName.substr(fileName.length - 3) + ".svg";
    },
    changePeriod(e) {
      this.period = e;
    },
    changeProgressStatus(e) {
      this.progress_status = e;
    }
  }
};
</script>

<style lang="scss">
@import "./DocumentList.scss";
</style>

