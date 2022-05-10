<template>

<div class="card-body">
        <img  :src="'/fronted/img/onlyhead.png'" style="display: none;"   id="printable"  class="img-fluid" alt="Responsive image">
                  <form class="form-horizontal" @submit.prevent="invoice">

                    <div class="row">

                      <label class="col-sm-1 form-label">Customer Type</label>
                      <div class="col-sm-2" id="no1">

                        <div class="form-check">
                          <input class="form-check-input" id="defaultRadio0" type="radio" name="exampleRadios" value="news" v-model="form.check" @change="onCustomerchange($event)">
                          <label class="form-check-label" for="defaultRadio0">New Customer</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" id="defaultRadio1" type="radio" name="exampleRadios" value="old" v-model="form.check" @change="onCustomerchange($event)" >
                          <label class="form-check-label" for="defaultRadio1">Existing Customer</label>
                        </div>
                      </div>


                        <div class="col-sm-6" v-if="form.check=='old'" >


                        <div class="row">
                                <select class="form-select mb-3" v-model="form.customer_id" name="account" @change="onCustomerchangedetails($event)">
                                <option disabled selected value   hidden>Select Customer</option>
                                 <option  v-for="cust  in customers" v-bind:value="cust.id" :key="cust.id">{{cust.Name}}</option>

                                </select>

                            <br>

                            <div class="col-sm-6">
                               <input class="form-control" type="text" placeholder="Mobile number" disabled v-model="form.mobile">

                            </div>
                            <br>

                            <div class="col-sm-6">
                               <input class="form-control" type="text" placeholder="Address and details" disabled v-model="form.details">

                            </div>
                            </div>



                        </div>

                        <div class="col-sm-6" v-if="form.check=='news'">
                            <div class="row">

                            <div class="col-sm-12" style="padding:8px;">
                                <input class="form-control" type="text" placeholder="Please Write Name here" v-model="form.name">
                            </div>
                            <br>

                            <div class="col-sm-6">
                               <input class="form-control" type="text" placeholder="Mobile number" v-model="form.mobile">

                            </div>
                            <br>

                            <div class="col-sm-6">
                               <input class="form-control" type="text" placeholder="Address and details" v-model="form.details">

                            </div>
                            </div>

                         </div>
                    </div>
                    <div class="border-bottom my-5 border-gray-200"></div>
                    <div class="row">
                              <div class="col-sm-4 ">
                                <label class="label-material active" for="register-username">Invoice No: {{invoice_id}}</label>

                              </div>
                              <div class="col-sm-4 ">
                                <label class="label-material active" for="register-username">All Details About Purchasing</label>
                                </div>
                              <div class="col-sm-4 ">
                                    Dated: {{ date}}
                              </div>
                                <div class="col-sm-6 offset-3">
                          <label class="label-material active" for="register-username" id="no2">Select Product Name</label>

                                <select class="form-select mb-3" name="account" v-model="form.product_id">
                                <option disabled selected value   hidden>Select Product</option>

                                    <option  v-for="pro  in product" v-bind:value="pro.id" :key="pro.id">{{pro.product_name}}</option>


                                </select>
                                </div>


                     <div class="col-sm-4">

                        <div class="input-material-group mb-3">
                          <input class="input-material" id="register-username" type="number"  min="0" name="registerUsername" required=""  v-model="form.weight"  @change="onChange($event)">
                          <label class="label-material active" for="register-username" >Total Weight in kg's</label>
                        </div>

                      </div>

                     <div class="col-sm-4">

                        <div class="input-material-group mb-3">
                          <input class="input-material" id="register-username" type="number"  min="0" name="registerUsername" required="" v-model="form.bags" @keyup="onChange($event)" >
                          <label class="label-material active" for="register-username">Bags Quantity</label>
                        </div>

                      </div>
                     <div class="col-sm-4">

                        <div class="input-material-group mb-3">
                          <input class="input-material" id="register-username" type="number"  min="0" name="registerUsername" required="" v-model="form.price" @keyup="onChange($event)"  @change="onChange($event)">
                          <label class="label-material active" for="register-username">ُPrice pr mn</label>
                        </div>

                      </div>۔
                    </div>

                     <div class="row">
                          <div class="col-sm-12 offset-4">
                          <label class="label-material active" for="register-username">Weightage Calculation</label>
                          </div>
                     <div class="col-sm-3">

                        <div class="input-material-group mb-3">
                          <input class="input-material" id="register-username" type="text" name="registerUsername" required="" disabled v-model="mns" >
                          <label class="label-material active" for="register-username">Weight In Mn's</label>
                        </div>
                        <div class="input-material-group mb-3">
                          <input class="input-material" id="register-username" type="text" name="registerUsername" required="" disabled v-model="kgs" >
                          <label class="label-material active" for="register-username">Weight In kg's</label>
                        </div>

                      </div>

                     <div class="col-sm-3">

                        <div class="input-material-group mb-3">
                          <input class="input-material" id="register-username" type="text" name="registerUsername" required="" disabled v-model="wpb">
                          <label class="label-material active" for="register-username">Weight pr Bag</label>
                        </div>

                      </div>
                     <div class="col-sm-3">

                        <div class="input-material-group mb-3">
                          <input class="input-material" id="register-username" type="text" name="registerUsername" required="" disabled v-model="ppb">
                          <label class="label-material active" for="register-username">ُPrice per Bag</label>
                        </div>

                      </div>
                      <div class="col-sm-3">

                        <div class="input-material-group mb-3">
                          <input class="input-material" id="register-username" type="text" name="registerUsername" required=""  disabled v-model="form.total_price">
                          <label class="label-material active" for="register-username">Total Price</label>
                        </div>

                      </div>

                        </div>




                    <div class="border-bottom my-5 border-gray-200"></div>

                    <div class="row">
                      <div class="col-sm-9 ms-auto">
                        <button class="btn btn-primary" type="submit" id="no3">Purchase</button>

                      </div>
                    </div>

                  </form>

                  <footer class="page-footer font-small mb-2" style="position: fixed; left: 0;   bottom: 0;  width: 100%;    text-align: center;">
                     <img  :src="'/fronted/img/footer.png'" style="display: none;"   id="footer"  class="img-fluid" alt="Responsive image">

                         </footer>
                         <div class="col-sm-6 ms-auto">

                        <button @click="printpage" class="btn btn-success ml-5"  id="noprint">Print Slip »</button>
                      </div>
                </div>





</template>

<script>
    export default {

        data() {
            return{
                form:{
                    weight:null,
                    price:null,
                    bags:null,
                    status:'0',
                    customer_id:'',
                    product_id:'',
                    name:null,
                    mobile:null,
                    details:null,
                    check: false,
                    total_price:"0",
                },
                mns:"0",
                kgs:"0",
                wpb:"0",
                ppb:"0",
                product:[],
                customers:[],
                customer_details:[],
                invoice_id:null,
                date:null,
            }
        },
        methods:{
            invoice(){
                this.printpage()


                axios.post('/purchase', this.form)
                        .then(res => {


                    Swal.fire({
                    icon: 'success',
                    title: 'Product Purchase Successfully',
                    });
                    this.empty();

                })

                .catch(error=>{
                    error => this.status = error.response.data.status;

                    Swal.fire({
                    icon: 'warning',
                    title: error.response.data.errors.product_name[0],
                            })
                });

            },


    empty(){
                    this.form.weight=null;
                     this.form.price=null;
                     this.form.bags=null;
                     this.form.customer_id='';
                     this.form.name=null;
                     this.form.mobile=null,
                     this.form.details=null,
                    this.form.check= false;
                     this.form.total_price="0",
                      this.mns="0";
                       this.kgs="0";
                         this.wpb="0";
                         this.ppb="0";


            },
            //Fetch all Products
        readproduct(val){
         var url = '/product/list/'+val;
            axios.get(url).then(res => {
                this.product = null;
                this.product= res.data;
        });
        },


        lastId(){
         var url = '/invoice/number';
            axios.get(url).then(res => {
                this.invoice_id = null;

                this.invoice_id= res.data.id;
        });
        },

        onCustomerchange:function(event){
            if(this.form.check == "old"){
                var url = '/customer/list/all';
                 axios.get(url).then(res => {
                    this.customers = null;
                    this.customers= res.data;
                });
            }

        },
        callFunction: function () {
            var currentDate = new Date();

            var currentDateWithFormat = new Date().toJSON().slice(0,10).replace(/-/g,'/');
            this.date = currentDateWithFormat;

    },
     printpage() {

    //Get the print button and put it into a variable
    var printButton = document.getElementById("noprint");
    document.getElementById("printable").style.display = "block";
    document.getElementById("footer").style.display = "block";

    document.getElementById("no1").style.display = "none";
    document.getElementById("no2").style.display = "none";
    document.getElementById("no3").style.display = "none";

    //Set the button visibility to 'hidden'
    printButton.style.visibility = 'hidden';


    //Print the page content
    window.print()

    //Restore button visibility
    document.getElementById("printable").style.display = "none";
    document.getElementById("footer").style.display = "none";
    document.getElementById("no1").style.display = "block";
    document.getElementById("no2").style.display = "block";
    document.getElementById("no3").style.display = "block";


    printButton.style.visibility = 'visible';


        },
        onCustomerchangedetails:function(event){
            if(this.form.check == "old"){
                var url = `/customer/single/${event.target.value}`;
                 axios.get(url).then(res => {
                    this.customer_details = null;
                    this.customer_details= res.data;
                    this.form.mobile = this.customer_details.mobile;
                    this.form.details = this.customer_details.details;

                });
            }

        },

        //Change All Values and convert Price or weight
        onChange:function(event) {

            if(this.form.weight != null && this.form.bags != null){
                this.mns = parseInt(parseInt( this.form.weight) / 40) ;
                this.kgs = parseInt(parseInt( this.form.weight) % 40) ;
                if(this.form.price !=null){
                this.form.total_price = (parseInt( this.form.price) /40) * parseInt( this.form.weight)  ;
                this.wpb =  parseInt(parseFloat( this.form.weight) / parseFloat( this.form.bags) ) ;
                this.ppb =  parseFloat((parseFloat( this.form.weight) / parseFloat( this.form.bags)) * parseFloat(parseFloat(this.form.price)/40) ) ;


                }
            }
            /*
        if(this.form.cr_h < event.target.value){

        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Lab Credit Hours Must be less than Total Credit Hours',
        })
        this.form.lab_cr_h = '0';
         }*/

        },
        },
        mounted() {
            this.readproduct('all');
            this.lastId();
            this.callFunction();
            console.log('Component mounted.')
        }
    }
</script>
