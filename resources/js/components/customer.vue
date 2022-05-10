
<template>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">

                <div class="col-sm-8">
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form class="form-horizontal" @submit.prevent="submit">
                            <div class="row">
                            <hr>

                            <div class="col-sm-8 offset-2"  >
                                <label   id="amount"> Amount </label>
                                <input class="form-control" id="amount" type="number" min="0" placeholder="Amount" v-model="form.amount" style="padding:4px;">
                                <br>
                            </div>
                            <br>

                            <div class="col-sm-6 offset-3">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>

                            </div>
                        </form>





                    </div>
                    </div>
                        </div>


             <div class="modal fade bd-customer-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="card">
                            New Customer
                        <div class="card-body">
                        <form @submit.prevent="newcustomer">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Name" v-model="form.name">
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile Number</label>
                                    <input type="text" class="form-control" id="mobile" placeholder="03**********" v-model="form.mobile">
                                </div>
                                <div class="form-group">
                                    <label for="details">Address and other Details</label>
                                    <input type="text" class="form-control" id="details" placeholder="addresss" v-model="form.details">
                                </div>

                                    <div class="form-group  text-center">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   <button class="btn btn-primary">Save</button>

                                </div>
                                                                </form>
                        </div>
                        </div>




                    </div>
                    </div>
                        </div>
                </div>

                            </div>
                        </div>
                </div>
                <!-- fade end !-->
                    <div class="card-header">
                        <div class="row">
                                <div class="col-lg-6">All Customers</div>
                                <div class="col-lg-6 text-right"> <Button class="btn btn-primary text-right" style="" data-toggle="modal" data-target=".bd-customer-modal-lg">Add New Customer</Button></div>

                        </div>




                    </div>
                        <input type="text" class="form-control" v-model="search"  name="customer_name" id="customer_name"
                                    placeholder="Name" required style="border:1px solid #ff4500">
                    <table  class="table">
                        <thead>

                            <tr>
                                <th scope="col">SL no</th>
                                <th scope="col">Name</th>
                                <th scope="col">Contact Number</th>
                                <th scope="col">Details</th>
                                <th scope="col">Balance</th>
                                <th scope="col">Debit</th>
                                <th scope="col">Credit</th>
                                <th scope="col">Action</th>


                            </tr>
                        </thead>
                        <tbody>

                                <th scope="row"></th>
                                 <tr v-for="(cus ,i) in customer" :key="i" >
                                <td class="name">{{ ++i }}</td>
                                <td><a :href="`/customer/details/`+cus.id" >{{ cus.Name }}</a></td>
                                <td>{{ cus.mobile }}</td>
                                <td>{{ cus.details }}</td>
                                <td>{{ cus.balance }}</td>

                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"  v-on:click="transaction(cus.id, 'deposit')">Debit</button>

                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg"  v-on:click="transaction(cus.id, 'Withdraw')">Credit</button>

                                    </td>
                                    <td>
                                    <!-- <button  v-on:click="delete_cus(cus.id)"  class="btn btn-danger">Delete</button>
                                                                    -->

                                    </td>
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
                form:{
                    amount:null,
                    type:null,
                    id:null,
                     name:null,
                    mobile:null,
                    details:null,

                },
                customer:[],
                customer_id: null,
                search_value: null,
                search:'',
                errors: null,
                notificationSchedule: {
          options: {
              success: {
                  position: "topRight",
                  timeout: 3000,
                  class: 'success_notification'
              },
              error: {
                  position: "topRight",
                  timeout: 4000,
                  class: 'error_notification'
              },
              completed: {
                  position: 'center',
                  timeout: 1000,
                  class: 'complete_notification'
              },
              info: {
                  overlay: true,
                  zindex: 999,
                  position: 'center',
                  timeout: 3000,
                  class: 'info_notification',
              }
          }
      },
            }
        },

methods:{
     newcustomer(){

      axios.post('/customer/add', this.form)
      .then(res => {
        this.form.customer_name = "";

        Swal.fire({
          icon: 'success',
          title: "New Customer Addd",
        })
        this.read('all');
      })

       .catch(error=>{
           error => this.status = error.response.data.status;

           Swal.fire({
          icon: 'warning',
          title: error.response.data.errors.customer_name[0],
        })


       });


    },

    submit(){

      axios.post('/customer/transaction', this.form)
      .then(res => {

        Toast.fire({
          icon: 'success',
          title: 'customer Updated successfully'
        })
        this.form.amount = null;
        this.read('all');
      })
       .catch(error =>this.errors = error.response.data.errors)


    },
    transaction(id ,val){
        this.form.type = val;
        this.form.id = id;

    },

    read(val){

         var url = '/customer/list/'+val;
        axios.get(url).then(res => {
            this.customer = null;
            this.customer= res.data;
        });
    },

    edit: function(name , id){
         //var name = document.getElementsByClassName("name");
        //alert(id)
        this.form.customer_name = name;
        this.customer_id = id;
        this.$refs.btnToggle.innerText  = 'Update';
    },

    delete_cus(id){

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                  this.customer_id = id;
            axios.post(`/customer/delete/${this.customer_id}`)
            .then(res => {
                Swal.fire(
                'Deleted!',
                'Your Department has been deleted.',
                'success'
                )
                this.read('all');
            })

              .catch(error =>this.errors = error.response.data.errors)

              }
        })

    },
    deposit(){

            try{

                Swal.fire({
                input: 'number',
                inputLabel: 'Deposit Amount',
                inputPlaceholder: 'Amount',
                });

                Swal.fire(`Entered URL: ${this.form.amount}`)

                console.log(this.form.amount);
            }catch(error){

            }

              },



  isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

            return true;
    }

},
    watch:{
        search(){
            if(this.search == ''){
                this.read('all');
            }
            else{
            this.read(this.search);
            }


        }
    },
    mounted:function(){
        this.read('all');

}

    }
</script>
