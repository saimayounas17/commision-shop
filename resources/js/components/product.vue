
<template>


    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">All Products</div>
                        <input type="text" class="form-control" v-model="search"  name="product_name" id="product_name"
                                    placeholder="e.g, Potato , Wheat ....." required style="border:1px solid #ff4500">
                    <table  class="table">
                        <thead>

                            <tr>
                                <th scope="col">SL no</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Available Weight(kg)</th>
                                <th scope="col">Available Weight(MN)</th>
                                <th scope="col">Action</th>


                            </tr>
                        </thead>
                        <tbody>

                                <th scope="row"></th>
                                 <tr v-for="(pro ,i) in product" :key="i" >
                                <td class="name">{{ ++i }}</td>
                                <td><a :href="`/product/details/`+pro.id" >{{ pro.product_name }}</a></td>
                                <td>{{ pro.available_weight }}kg</td>
                                <td>{{  parseInt(pro.available_weight/40) }} Mn / {{ parseInt(pro.available_weight%40) }} kg</td>

                                <td>
                                    <button  v-on:click="edit(pro.product_name,pro.id)"  class="btn btn-info">Edit</button>
                                    <button  v-on:click="delete_pro(pro.id)"  class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>


                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add Product</div>
                    <div class="card-body">
                        <form action="" @submit.prevent="addproduct" method="POST">


                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control" v-model="form.product_name" name="product_name"
                                    placeholder="e.g, Potato , Wheat ....." required style="border:2px solid #0000FF">


                                <span class="text-danger"></span>


                            </div>


                            <button type="submit" class="btn btn-primary"  ref="btnToggle">Add Product</button>
                        </form>
                    </div>
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
                    product_name:null
                },
                product:[],
                product_id: null,
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
     addproduct(){
        if(this.$refs.btnToggle.innerText == 'Add Product'){
      axios.post('/product/add', this.form)
      .then(res => {
        this.form.product_name = "";

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
          title: error.response.data.errors.product_name[0],
        })


       });
        }
        else{
            axios.post(`/product/update/${this.product_id}`, this.form)
      .then(res => {

        this.form.product_name = "";
         this.$refs.btnToggle.innerText  = 'Add product';

        Toast.fire({
          icon: 'success',
          title: 'product Updated successfully'
        })
        this.read('all');
      })

       .catch(error =>this.errors = error.response.data.errors)
        }
    },
    read(val){

         var url = '/product/list/'+val;
        axios.get(url).then(res => {
            this.product = null;
            this.product= res.data;
        });
    },

    edit: function(name , id){
         //var name = document.getElementsByClassName("name");
        //alert(id)
        this.form.product_name = name;
        this.product_id = id;
        this.$refs.btnToggle.innerText  = 'Update';
    },

    delete_pro(id){

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
                  this.product_id = id;
            axios.post(`/product/delete/${this.product_id}`)
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
