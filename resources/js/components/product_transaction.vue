
<template>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
        <img  :src="'/fronted/img/onlyhead.png'" style="display: none;"   id="printable"  class="img-fluid" alt="Responsive image">

                <div class="card" id="noprint">
                    <div class="card-body">

                        <button type="button" class="btn btn-secondary btn-sm p-2 m-2" @click="read(customer_id); value=null">All</button>
                        <button type="button" class="btn btn-secondary btn-sm p-2 m-2" @click="readday(1)">Today</button>
                        <button type="button" class="btn btn-secondary btn-sm p-2 m-2" @click="readday(3)">3 Day</button>
                        <button type="button" class="btn btn-secondary btn-sm p-2 m-2" @click="readday(5)">5 Day</button>
                        <button type="button" class="btn btn-secondary btn-sm p-2 m-2" @click="readday(7)">7 Day</button>
                        <button type="button" class="btn btn-secondary btn-sm p-2 m-2" @click="readday(15)">15 Day</button>
                        <button type="button" class="btn btn-secondary btn-sm p-2 m-2" @click="readday(30)">30 Day</button>
                        <div style="float: right;">

                        <button type="button" class="btn btn-success btn-md p-2 m-2" @click="value=0">Buy</button>
                        <button type="button" class="btn btn-danger btn-md p-2 m-2" @click="value=1">Sell</button>

                        </div>

                    </div>
                <div class="card-body">
                     <div class="col-md-6 offset-3 mb-2">
                    <label for="product_name">From</label>
                    <input type="date"  v-model="startdate"   required style="border:6px solid #0000FF; padding:4px;border-style:inset;">
                     <label for="product_name">To</label>
                    <input type="date"   v-model="enddate"   required style="border:6px solid #0000FF;padding:4px;border-style:outset;">


                    </div>
                </div>

                </div>
            </div>
            <div class="col-lg-12">
                    <div class="col-md-6 offset-4" >
                    <h1>{{customer[0].product.product_name}}</h1>

                    </div>
                <div class="card">


                <!-- fade end !-->
                    <div class="card-header">All Transactions</div>

                        <table  class="table">
                        <thead>

                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Date</th>
                                <th scope="col">Weight In Mn's</th>
                                <th scope="col">Weight In Kg's</th>
                                <th scope="col">Buy/Sale</th>


                            </tr>
                        </thead>
                        <tbody>
                                <th scope="row"></th>
                                    <tr v-for="(cus ,i) in filteredData" :key="i">

                                        <td>{{++i}}</td>
                                        <td>{{cus.created_at}}</td>
                                        <td>{{parseFloat(cus.weight)/40}}</td>
                                        <td>{{cus.weight}}</td>
                                        <td v-if="cus.status == '0'" style="background-color:#00FF00">Buy</td>
                                        <td v-else style="background-color:red; ">Sale</td>

                                    </tr>

                                    <tr></tr>
                                    <tr></tr>

                        </tbody>
                    </table>






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
                pr:null,
                value:null,
                startdate:null,
                enddate:null,

            }
        },

methods:{

read(val){

         var url = '/product/alldetails/'+val;
        axios.get(url).then(res => {
            this.customer = null;
            this.customer= res.data;
                console.log(res.data);
           /*this.customer.forEach((value, index)=>{

            if(value.balance >=0){
             this.deposit = (parseFloat( this.deposit)+ parseFloat( value.balance));

                  }else{
             this.withdraw = (parseFloat( this.withdraw)+ parseFloat( value.balance));

                  }

                  this.name = value.customers.Name;
                  this.mobile = value.customers.mobile;
                  this.details = value.customers.details;

                    });
                    */
                   });

    },

    readday(day){

         var url = '/product/day/'+day;
        axios.get(url).then(res => {
            this.customer = null;
            this.customer= res.data;
                console.log(res.data);

         });
                this.value=null;
                this.startdate=null;
                this.enddate=null;


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

},
 computed: {
        filteredData( ){
                var vm = this
                var value = vm.value
                var startdate = vm.startdate
                var enddate = vm.enddate
                //var enddate = vm.sale
                return _.filter(vm.customer, function(data){

                    if((_.isNull(value) &&  _.isNull(startdate) && _.isNull(enddate) )){
                        return true
                    }
                    else if(_.isNull(value) &&  !_.isNull(startdate) && !_.isNull(enddate)){
                            var date = data.status;
                             var duration = data.created_at;
                        return (duration >= startdate  && duration <= enddate)


                    }
                    else if( _.isNull(startdate) && _.isNull(enddate) )
                    {
                         var date = data.status;
                        var duration = data.created_at;
                        return (date == value )

                    }
                    else if(!_.isNull(value) &&  !_.isNull(startdate) && !_.isNull(enddate)){

                        var date = data.status;
                        var duration = data.created_at;

                        return (date == value && duration >= startdate  && duration <= enddate)
                    }
                })
        }
    },

    }
</script>
