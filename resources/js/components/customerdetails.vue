
<template>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">{{name }} <p> {{mobile}} {{details}}</p>    </div>
                        <br>
                    <div class="col-md-6 offset-3 mb-2">
                    <label for="product_name">From</label>
                    <input type="date"  v-model="startdate"   required style="border:2px solid #0000FF">
                     <label for="product_name">To</label>
                    <input type="date"   v-model="enddate"   required style="border:2px solid #0000FF">


                    </div>
                    <br>
                <table  class="table">
                        <thead>

                            <tr>


                                <th scope="col">Total Deposit</th>
                                <th scope="col">Total Withdraw</th>
                                <th scope="col">Available Balance</th>

                            </tr>
                        </thead>
                        <tbody>
                                <th scope="row"></th>
                                    <tr>
                                        <td>{{deposit}}</td>
                                        <td>{{withdraw}}</td>
                                        <td>{{deposit+withdraw}}</td>
                                    </tr>
                                    <tr></tr>
                                    <tr></tr>




                        </tbody>
                    </table>
                <!-- fade end !-->
                    <div class="card-header">All Transactions</div>

                    <table  class="table">
                        <thead>

                            <tr>
                                <th scope="col">SL no</th>
                                <th scope="col">Date</th>
                                <th scope="col">Details</th>
                                <th scope="col">Debit</th>
                                <th scope="col">Credit</th>

                                <th scope="col">Balance</th>

                            </tr>
                        </thead>
                        <tbody>

                                    <tr></tr>
                                    <tr></tr>
                                <th scope="row"></th>
                                 <tr v-for="(cus ,i) in filteredData" :key="i" >
                                <td class="name">{{ ++i }}</td>
                                <td>{{cus.created_at}}</td>
                                <td >{{ cus.details }}</td>
                                <td v-if="cus.balance > '0'">{{ cus.balance }}</td>
                                <td v-else></td>
                                <td v-if="cus.balance < '0'">{{ cus.balance }}</td>
                                <td v-else></td>

                                <td>{{ available = parseFloat(  parseFloat(available) + parseFloat(cus.balance)) }}</td>

                                </tr>



                        </tbody>
                    </table>
                </div>
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
                available:0.0,
                customer_id:null,
                name:null,
                mobile:null,
                details:null,
                startdate:null,
                enddate:null,

            }
        },

methods:{


   read(val){

         var url = '/customer/alldetails/'+val;
        axios.get(url).then(res => {
            this.customer = null;
            this.customer= res.data;

           this.customer.forEach((value, index)=>{

            if(value.balance >=0){
             this.deposit = (parseFloat( this.deposit)+ parseFloat( value.balance));

                  }else{
             this.withdraw = (parseFloat( this.withdraw)+ parseFloat( value.balance));

                  }

                  this.name = value.customers.Name;
                  this.mobile = value.customers.mobile;
                  this.details = value.customers.details;

                    });
         });

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
        filteredData(){
                var vm = this
                var startdate = vm.startdate
                var enddate = vm.enddate
                return _.filter(vm.customer, function(data){

                    if((_.isNull(startdate) && _.isNull(enddate))){
                        return true
                    }else{

                        var date = data.created_at;

                        return (date >= startdate  && date <= enddate)
                    }
                })
        }
    },

    }
</script>
