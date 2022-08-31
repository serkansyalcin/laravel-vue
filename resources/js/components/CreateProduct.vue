<template>

    <div>
        <div class="row">
            <h3 class="text-left">Create Product</h3>
       
            <div class="col-md-6">
                <form @submit.prevent="addProduct">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="product.name">
                    </div>
                    <div class="form-group">
                        <label>Picture</label>
                        <input type="file" class="form-control" ref="file" v-on:change="handleFileUpload($event)">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
import axios from 'axios';

export default {
    data() {
        return {
            product: {}
        }
    },
    methods: {
        handleFileUpload( event ){
          this.product.picture = event.target.files[0];
        },
        addProduct() {
            let formData = new FormData();
            formData.append('name', this.product.name);
            formData.append('picture', this.product.picture);
            axios
                .post('http://localhost:8000/api/products', formData , {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(response => (
                    this.$router.push({ name: 'products' })
                ))
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
        }
    }
}
</script>