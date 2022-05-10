
<template>


    <div class="container">
        <div class="row">
              <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add</div>
                    <div class="card-body">
                        <form action="" @submit.prevent="addExpense" method="POST">


                            <div class="form-group">
                                <label for="Amount">Expense Amount</label>
                                <input type="number"  min="0" class="form-control" v-model="form.Amount" name="Amount"
                                    placeholder="0" required style="border:2px solid #0000FF">



                                 <label for="details">Details</label>
                                <input type="text" min="0" class="form-control" v-model="form.Details" name="details"
                                    placeholder="e.g, Electricity ....." required style="border:2px solid #0000FF">


                                <span class="text-danger"></span>


                            </div>


                            <button type="submit" class="btn btn-primary"  ref="btnToggle">Add</button>
                        </form>
                    </div>
                </div>
                </div>
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">All Expenses</div>

                    <table  class="table">
                        <thead>

                            <tr>
                                <th scope="col">SL no</th>
                                <th scope="col">Expense Amount</th>
                                <th scope="col">Details</th>
                                <th scope="col">Action</th>


                            </tr>
                        </thead>
                        <tbody>

                                <th scope="row"></th>
                                 <tr v-for="(exp ,i) in Expense" :key="i" >
                                <td class="name">{{ ++i }}</td>
                                <td>{{ exp.Amount }}</td>
                                <td>{{ exp.Details }}</td>

                                <td>
                                    <button  v-on:click="edit(exp.Amount,exp.id,exp.Details)"  class="btn btn-info">Edit</button>
                                    <button  v-on:click="delete_exp(exp.id)"  class="btn btn-danger">Delete</button>
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
                    Amount:null,
                    Details:null
                },
                Expense:[],
                Expense_id: null,
                search_value: null,
                search:'',
                errors: null,

            }
        },

methods:{
     addExpense(){
        if(this.$refs.btnToggle.innerText == 'Add'){
      axios.post('/expense/add', this.form)
      .then(res => {
        this.form.Amount = "";
        this.form.Details = "";

        Swal.fire({
          icon: 'success',
          title: res.data.message,
        })
        this.read('all');
      })

       .catch(error=>{
           error => this.status = error.response.data.status;

           Swal.fire({
          icon: 'warning',
          title: error.response.data.errors.Amount[0],
        })


       });
        }
        else{
            axios.post(`/Expense/update/${this.Expense_id}`, this.form)
      .then(res => {

        this.form.Amount = "";
         this.$refs.btnToggle.innerText  = 'Add';

        Toast.fire({
          icon: 'success',
          title: 'Expense Updated successfully'
        })
        this.read('all');
      })

       .catch(error =>this.errors = error.response.data.errors)
        }
    },
    read(val){

         var url = '/expense/list/'+val;
        axios.get(url).then(res => {
            this.Expense = null;
            this.Expense= res.data;
        });
    },

    edit: function(name , id , details){
         //var name = document.getElementsByClassName("name");
        //alert(id)
        this.form.Amount = name;
        this.Expense_id = id;
        this.form.Details = details;

        this.$refs.btnToggle.innerText  = 'Update';
    },

    delete_exp(id){

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
                  this.Expense_id = id;
            axios.post(`/Expense/delete/${this.Expense_id}`)
            .then(res => {
                Swal.fire(
                'Deleted!',
                'Your Expense has been deleted.',
                'success'
                )
                this.read('all');
            })

              .catch(error =>this.errors = error.response.data.errors)

              }
        })

    },

    showMessage(data) {
      if (data.status  == "success") {
          this.$toast.success(data.message, 'Success Alert', this.notificationSchedule.options.success );
      } else {
          this.$toast.error(data.message, "Error Alert", this.notificationSchedule.options.error);
      }
    },


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
