
<template>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
        <img  :src="'/fronted/img/onlyhead.png'" style="display: none;"   id="printable"  class="img-fluid" alt="Responsive image">

                <div class="card" id="noprint">
                    <div class="card-body">

                        <button type="button" class="btn btn-secondary btn-sm p-2 m-2" @click="read('all')">All</button>
                        <button type="button" class="btn btn-secondary btn-sm p-2 m-2" @click="readday(1)">YesterDay</button>
                        <button type="button" class="btn btn-secondary btn-sm p-2 m-2" @click="readday(3)">3 Day</button>
                        <button type="button" class="btn btn-secondary btn-sm p-2 m-2" @click="readday(5)">5 Day</button>
                        <button type="button" class="btn btn-secondary btn-sm p-2 m-2" @click="readday(7)">7 Day</button>
                        <button type="button" class="btn btn-secondary btn-sm p-2 m-2" @click="readday(15)">15 Day</button>
                        <button type="button" class="btn btn-secondary btn-sm p-2 m-2" @click="readday(30)">30 Day</button>

                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">


                <!-- fade end !-->
                    <div class="card-header">All Transactions</div>
                    <div v-for="(cus ,i) in customer" :key="i" class="printing" style="page-break-after:auto">
                    <div class="border-bottom my-5 border-gray-200"></div>

                        <div class="row" style="padding:4x;"> {{++i}}
                            <div class="col-sm-3 offset-1">
                              <h2>{{cus.customers.Name}}</h2>

                            </div>
                            <div class="col-sm-3 offset-1">{{cus.customers.mobile}}</div>
                            <div class="col-sm-3">{{cus.customers.details}}</div>
                            <div class="row" v-if="cus.invoice_id !='0'" >

                            <div  class="col-sm-3  offset-1"> <strong>Invoice:</strong> {{cus.invoice_id}}</div>
                            <div class="col-sm-4"><strong>Product Name:</strong> {{cus.invoice.product.product_name}}</div>
                            <div class="col-sm-4"><strong>Date:</strong> {{cus.invoice.created_at}}</div>
                            <br>
                            <div class="col-sm-3 offset-1" style="padding:8px;"><strong>Weight in kg's</strong> {{cus.invoice.weight}}kg's</div>
                            <div class="col-sm-3 " style="padding:8px;"><strong>Weight in mns's</strong> {{parseInt(parseInt(cus.invoice.weight)/40)}}mns/{{parseInt(cus.invoice.weight)%40}}kg's</div>
                            <div class="col-sm-2 " style="padding:8px;"><strong>Bags</strong> {{cus.invoice.bags}}</div>
                            <div class="col-sm-2 " style="padding:8px;"><strong>Price 40kg's</strong> {{cus.invoice.price}}</div>
                             </div>
                            <div class="col-sm-3 offset-1" style="padding:8px;"><strong>Status</strong> {{cus.details}}</div>
                            <div class="col-sm-4  " style="padding:8px;"><strong>Amount</strong> {{cus.balance}}</div>
                            <div class="col-sm-4" v-if="cus.invoice_id =='0'"><strong>Date:</strong> {{cus.created_at}}</div>

                        </div>



                    </div>

                </div>
        <img  :src="'/fronted/img/footer.png'" style="display: none;"   id="footer"  class="img-fluid" alt="Responsive image">
            </div>


            </div>

            </div>



</template>

<script>
    export default {
        data(){
            return{

                customer:[],
                deposit: 0.0,
                withdraw: 0.0,
                customer_id:null,
                name:null,
                mobile:null,
                details:null,

            }
        },

methods:{


   read(val){

         var url = '/daily/data';
        axios.get(url).then(res => {
            this.customer = null;
           this.customer= res.data;
                console.log(res.data);

         });

    },



readday(day){

         var url = '/customer/day/'+day;
        axios.get(url).then(res => {
            this.customer = null;
            this.customer= res.data;
                console.log(res.data);

         });

    },


 printpage() {

    //Get the print button and put it into a variable
    var printButton = document.getElementById("noprint");
    document.getElementById("printable").style.display = "block";
    document.getElementById("footer").style.display = "block";

    //Set the button visibility to 'hidden'
    printButton.style.visibility = 'hidden';



    //Print the page content
    window.print()

    //Restore button visibility
    document.getElementById("printable").style.display = "none";
    document.getElementById("footer").style.display = "none";
    printButton.style.visibility = 'visible';


},







},


    mounted:function(){
            const url = window.location.href;
            const lastParam = url.split("/").slice(-1)[0];
            this.url_id = lastParam;
            //this.read_scheme(lastParam);
            this.customer_id= lastParam;
            this.read(this.customer_id);

}

    }
</script>
