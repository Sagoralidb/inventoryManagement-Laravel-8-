<template>
    <form @submit.prevent="submitForm" role="form" method="post">

            <show-error></show-error>

    <div class="row">
        <div class="col-sm-6">
        <div class="card card-primary card-outline"><br>
                <h5 class="card-title text-center">Stock Manage</h5>
                <div class="card-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Name">Product <span class="text-danger">*</span> </label>
                            <Select2 @change="selectedProduct" v-model="form.product_id" :options="products" :settings ="{placeholder:'Select Product'}"></Select2>
                        </div>
                        <div class="form-group">
                            <label for="Name">Date <span class="text-danger">*</span> </label>
                                <input type="date" class="form-control" v-model="form.date">
                        </div>
                        <div class="form-group">
                            <label for="Name">Stock status <span class="text-danger">*</span> </label>
                            <Select v-model="form.stock_type" class="form-control">
                                <option value="in">IN</option>
                                <option value="out">Our</option>
                            </Select>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><li class="fa fa-save"></li> Submit</button>
                        <a href="" type="submit" class="btn btn-secondary float-right">Back</a>
                    </div>


                </div>
            </div><!-- /.card -->
        </div>

        <div class="col-sm-6">
        <div class="card card-primary card-outline"><br>
                <div class="card-body">
                    <h5 class="card-title text-center">Product Size</h5>
                    <br>
                    <table class="table table-sm">
                        <tr v-for="(item, index) in form.items" :key="index">
                            <td>{{ item.size }}</td>
                            <td>
                                <input class="form-control" v-model="item.quantity" placeholder="Quantity">
                            </td>
                        </tr>
                    </table>

                </div>

            </div><!-- /.card -->
        </div>
    </div>
</form>
</template>

<script>
import store from '../../store';
import * as actions from "../../store/action-types";
import { mapGetters } from 'vuex';
import Select2 from 'v-select2-component'
import sizes from '../../store/modules/sizes';
// import ShowError from './utils/ShowError';
import ShowError from '../products/utils/ShowError.vue';

export default {
    components: {
        Select2,
        ShowError,
    },
    data() {
        return {
            form: {
                date: '',
                stock_type:'in',
                product_id: '',
                items : [],
            }
        }
    },
        // Get products
computed: {
    ...mapGetters({
        'products' : 'getProducts',
    })
},
       mounted() {
        //Get Products
        store.dispatch(actions.GET_PRODUCTS)
       },
       methods: {
            selectedProduct(id){
                this.form.items =[]
                let product = this.products.filter(product=>product.id == id)

                product[0].product_stocks.map(stock=>{
                    let item ={
                        size : stock.size.size,
                        size_id : stock.size_id,
                        quantity: ''
                    }
                    this.form.items.push(item)
                })
            },
            submitForm(){
                store.dispatch(actions.SUBMIT_STOCKS, this.form)
            }
        }
    }
</script>

<style>
.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 19px !important;
}
.select2-container--default .select2-selection--single {
    padding-top: 10px !important;
    padding-bottom: 23px !important;
}
</style>
