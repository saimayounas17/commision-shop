
<template>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
        <img  :src="'/fronted/img/onlyhead.png'" style="display: none;"   id="printable"  class="img-fluid" alt="Responsive image">

                <div class="card" id="noprint">
                    <div class="card-body">

                        <button type="button" class="btn btn-secondary btn-sm p-2 m-2" @click="read('all')">All</button>
                        <button type="button" class="btn btn-secondary btn-sm p-2 m-2" @click="readday(1)">Today</button>
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

                                 <table  class="table">
                        <thead>

                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Date</th>
                                <th scope="col">Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col"><details></details></th>


                            </tr>
                        </thead>
                        <tbody>
                                <th scope="row"></th>
                                    <tr v-for="(cus ,i) in customer" :key="i">

                                        <td>{{++i}}</td>
                                        <td>{{cus.created_at}}</td>
                                        <td>{{cus.customers.Name}}</td>
                                        <td>{{cus.balance}}</td>

                                        <td v-if="cus.balance >= '0'" style="background-color:#00FF00">{{cus.details}}</td>
                                        <td v-else style="background-color:red; ">{{cus.details}}</td>

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
