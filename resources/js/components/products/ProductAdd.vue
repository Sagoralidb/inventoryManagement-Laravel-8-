<template>
    <div class="card card-primary card-outline"><br>
            <h5 class="card-title text-center">Create product</h5>
            <div class="card-body">         
              <form action="" method="post">
          
                <div class="card-body">
                    <div class="form-group">
                        <label for="Name">Product Name</label>
                        <option v-for="(item, index) in categories" :key="index" :value="item.id">
                            {{ item.name }}
                        </option>
                                      
                    </div>
                </div>
                <!-- /.card-body -->
            
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="" type="submit" class="btn btn-secondary float-right">Back</a>
                </div>
            </form>
            
            </div>
          </div><!-- /.card -->
</template>

<script>
import store from '../../store';
// import actions from '../../store/modules/categories/actions';
import * as actions from "../../store/action-types";
import { mapGetters } from 'vuex';
import categories from '../../store/modules/categories';
    export default {
        // Get categories
computed: {
    ...mapGetters({
        'categories' : 'getCategories'
    })
},
       mounted() {
        store.dispatch(actions.GET_CATEGORIES)
       }
    }
</script>


<!-- <script>
import * as actions from "../../store/action-types";

export default {
    mounted() {
        // Fetch categories when the component is mounted
        this.$store.dispatch(actions.GET_CATEGORIES);
    },
    computed: {
        categories() {
            // Return categories from the Vuex store
            // return this.$store.state.categories.categories;
            return this.$store.getters.getCategories;
        }
    }
}
</script> -->
