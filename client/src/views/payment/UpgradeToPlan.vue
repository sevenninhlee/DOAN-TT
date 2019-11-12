<template>
  <div class="app flex-row">
    <div class="w-100 position-relative">
      <div class="plan-header">
        <h1>Upgrade To {{plan.title}}</h1>
      </div>
      <hr class="mb-4" />
      <div class="row plans">
        <div class="col-12 col-sm-6 col-md-8 col-lg-8">
          <div class="content-card">
            <div class="content-header">Payment information</div>
            <b-tabs>
              <b-tab title="Card" active>
                <div class="row">
                  <div class="col-12 col-lg-6">
                    <div class="form-group">
                      <label for="name">Credit/debit card number</label>
                      <b-input-group
                        class="pl-3"
                        v-bind:class="{'input-error': isError(card_number)}"
                      >
                        <b-form-input placeholder="**** **** **** 5432" v-model="card_number"></b-form-input>
                        <b-input-group-prepend class="mr-0">
                          <b-input-group-text class="h-auto">
                            <UserIcon icon="mastercard.svg" />
                          </b-input-group-text>
                        </b-input-group-prepend>
                      </b-input-group>
                      <div v-if="isError(card_number)" class="error-text">Please input card number</div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-6 pl-lg-0">
                    <div class="d-flex align-items-start">
                      <div class="form-group">
                        <label for="name">Expiration month</label>
                        <div class="d-flex align-items-center">
                          <UserSelect
                            v-bind:value="month"
                            v-bind:items="['Month', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']"
                            @changeValue="month=$event"
                            class="mb-0"
                            style="min-width:105px"
                            v-bind:class="{'input-error': month == 'Month' && error_flag}"
                          />
                          <span class="mx-2">/</span>
                        </div>
                        <div v-if="month == 'Month' && error_flag" class="error-text">Select a month</div>
                      </div>

                      <div class="form-group mr-3">
                        <label for="name">Expiration year</label>
                        <UserSelect
                          v-bind:value="year"
                          v-bind:items="years"
                          @changeValue="year=$event"
                          class="mb-0"
                          style="min-width:95px"
                          v-bind:class="{'input-error': year == 'Year' && error_flag}"
                        />
                        <div v-if="year == 'Year' && error_flag" class="error-text">Select a year</div>
                      </div>
                      <div class="form-group">
                        <label for="name">CVV</label>
                        <input
                          type="text"
                          class="form-control"
                          id="cvv"
                          placeholder="Your CVV"
                          name="cvv"
                          v-bind:class="{'input-error': isError(cvv)}"
                          v-model="cvv"
                        />
                        <div v-if="isError(cvv)" class="error-text">Please input CVV</div>
                      </div>
                    </div>
                  </div>
                </div>
              </b-tab>
              <b-tab title="PAYPAL">
                <label class="mr-3">Pay with PayPal</label>
                <a href="https://www.paypal.com">
                  <img src="img/icons/paypal.png" />
                </a>
              </b-tab>
            </b-tabs>
          </div>
          <div class="content-card">
            <div class="content-header">Billing information</div>
            
            <div class="form-group">
              <label for="name">Country</label>
              <div v-bind:class="{'input-error': (country == '' || country == 'Select country') && error_flag}">
                <ejs-dropdownlist id='dropdownlist' 
                  :dataSource="countries"
                  :change = "changeCountryEx"
                  placeholder = "Select country"
                  >
                </ejs-dropdownlist>
              </div>
              <div v-if="(country == '' || country == 'Select country') && error_flag" class="error-text">Please select a country</div>
            </div>
            <div class="form-group">
              <label for="name">Street address</label>
              <input
                type="text"
                class="form-control"
                id="billing_addr"
                placeholder="Street address"
                name="billing_addr"
                v-bind:class="{'input-error': isError(billing_addr)}"
                v-model="billing_addr"
              />
              <div v-if="isError(billing_addr)" class="error-text">Please enter a street address</div>
            </div>
            <div class="form-group">
              <label for="name">Street address line 2</label>
              <input
                type="text"
                class="form-control"
                id="billing_addr1"
                placeholder="Enter your street address line 2 (Optional)"
                name="billing_addr1"
                v-model="billing_addr1"
              />
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="name">Zip code</label>
                  <input
                    type="text"
                    class="form-control"
                    id="zip_code"
                    placeholder="Zip code"
                    name="zip_code"
                    v-bind:class="{'input-error': isError(zip_code)}"
                    v-model="zip_code"
                  />
                  <div v-if="isError(zip_code)" class="error-text">Please enter a valid zip Code</div>
                </div>
              </div>
              <div class="col-sm-8">
                <div class="form-group">
                  <label for="name">City</label>
                  <input
                    type="text"
                    class="form-control"
                    id="city"
                    placeholder="City"
                    name="city"
                    v-bind:class="{'input-error': isError(city)}"
                    v-model="city"
                  />
                  <div v-if="isError(city)" class="error-text">Please enter a valid city</div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="name">State</label>
                  <div v-bind:class="{'input-error': (state == '' || state == 'Select state') && error_flag}">
                    <ejs-dropdownlist id='dropdownlist-state' 
                      :dataSource="states"
                      :change = "changeStateEx"
                      placeholder = "Select state"
                      >
                    </ejs-dropdownlist>
                  </div>
                  <div v-if="(state == '' || state == 'Select state') && error_flag" class="error-text">Please select a state</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
          <div class="plan-card content-card">
            <div class="content-header">You're buying:</div>
            <div class="plan-card-head">
              <div class="plan-title">
                {{plan.title}}
                <img
                  v-bind:src="'img/icons/'+plan.title+'.png'"
                  width="32"
                  height="32"
                  class="ml-3"
                />
              </div>
              <div>
                <span class="comments">Per month</span>
                <span class="price">
                  ${{plan.price}}
                  <sup>.00</sup>
                </span>
              </div>
            </div>
            <UserSelect
              v-bind:value="subscription"
              v-bind:items="['Monthly Subscription', 'Annual Subscription']"
              @changeValue="subscription=$event"
              class="mb-0 mt-3"
              style="min-width:105px"
            />
            <div class="d-flex-align-center justify-content-between mt-2" v-if="!edit_promo_code">
              <span>Promo Code: <strong>{{promo_code}}</strong></span>
              <b-button variant="link" v-on:click="edit_promo_code=true">{{promo_code.length==0?'Add Code': 'Edit Code'}}</b-button>
            </div>
            <div class="mt-2" v-if="edit_promo_code">
              <div class="form-group">
                <label for="name">Promo code</label>
                <input
                  type="text"
                  class="form-control"
                  id="promo_code"
                  placeholder="Promo Code"
                  name="promo_code"
                  v-model="promo_code"
                />
              </div>
              <div class="text-center">
                <b-button variant="primary" v-on:click="edit_promo_code=false" class="mr-3">Add Code</b-button>
                <b-button variant="link" v-on:click="edit_promo_code=false">Cancel</b-button>
              </div>
            </div>
            

            <hr />
            <div class="text-center">
              <div class="limit-for-sending">Limit for Sending for Signature</div>
              <div class="limit-times">{{plan.limit}}</div>
            </div>
            <hr />
            <b-button block variant="other" v-on:click="showModal()">Upgrade my plan!</b-button>
            <div class="mt-3">
              By clicking "Upgrade my plan!" you agree to the
              <b-button variant="link" class="p-0">Terms and Conditions</b-button>.
            </div>
          </div>
        </div>
      </div>
    </div>
    <b-modal id="done-modal" ref="done-modal" hide-footer>
      <div class="done-modal">
        <img src="img/icons/send.svg" class="mb-4" />
        <div class="you-done">Your plan is upgraded</div>
        <div
          class="comments text-center"
          style="margin-bottom:30px"
        >Thank You for upgrading to {{plan.title}}! You can always downgrade when you are not in needs any more.</div>
        <button type="submit" class="btn btn-primary" v-on:click="upgradeMyPlan()">Get start</button>
      </div>
    </b-modal>
  </div>
</template>

<script>
import UserIcon from "../../components/UserIcon";
import UserSelect from "../../components/UserSelect";
import country_region_list from "country-region-data/data";
import Vue from "vue";
import { DropDownListPlugin  } from '@syncfusion/ej2-vue-dropdowns';
Vue.use(DropDownListPlugin);

export default {
  name: "UpgradeToPlan",
  components: {
    UserIcon,
    UserSelect
  },
  data() {
    return {
      promo_code: "",
      edit_promo_code: false,
      plan: null,
      subscription: "Monthly subscription",
      country: "Select country",
      countries: [],
      region: "Select region",
      month: "Month",
      year: "Year",
      years: [],

      error_flag: false,
      first_name: "",
      last_name: "",
      card_number: "",
      cvv: "",
      state: "Select state",
      states: [],
      billing_addr: "",
      billing_addr1: "",
      city: "",
      zip_code: ""
    };
  },
  created() {
    this.plan = this.$route.query.plan;
    this.id = this.$route.query.id;
    if (!this.plan.title) {
      this.$router.push({
        path: "/payment/upgrade-plan"
      });
    }
    const dt = new Date();
    const start = dt.getYear();
    for (let i = start; i < start + 10; i++) {
      this.years.push((i + 1900).toString());
    }
    
    this.states = [];
    this.state = "Select state";
    this.countries = [];
    country_region_list.forEach(country => {
      this.countries.push(country.countryName);
    });
  },
  methods: {
    changeStateEx(arg) {
      this.state = arg.value;
    },
    changeCountryEx(arg) {
      this.country = arg.value;
      this.states = [];
      this.state = "Select state";
      if(this.country == "Select country") return;
      const region = country_region_list.find(item => (item.countryName == this.country));
      region.regions.forEach(item => {
        this.states.push(item.name);
      });
    },
    showModal() {
      this.error_flag = true;
      if (this.isError(this.first_name)) return;
      if (this.isError(this.last_name)) return;
      if (this.isError(this.card_number)) return;
      if (this.isError(this.cvv)) return;
      if (this.isError(this.state)) return;
      if (this.isError(this.street_addr)) return;
      if (this.isError(this.zip_code)) return;
      this.$refs["done-modal"].show();
    },
    isError(value) {
      return (
        this.error_flag &&
        (value === undefined ||
          value === null ||
          (typeof value === "object" && Object.keys(value).length === 0) ||
          (typeof value === "string" && value.trim().length === 0))
      );
    },
    upgradeMyPlan() {
      this.$router.push({
        path: "/landing",
        query: { id: this.id }
      });
    }
  }
};
</script>

<style lang="scss">
@import "./UpgradeToPlan.scss";
</style>

