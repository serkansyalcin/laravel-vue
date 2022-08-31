<template>
    <div>
        <h3 class="text-left">Edit Product</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateProduct">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="product.name">
                    </div>
                    <div class="form-group">
                        <label>Picture</label>
                        <img :src="product.picture" height="100" width="100"/>                     
                        <input type="file" class="form-control" v-on:change="handleFileUpload($event)" >
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
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
    created() {
        axios
            .get(`http://localhost:8000/api/products/${this.$route.params.id}`)
            .then((res) => {
                this.product = res.data;
            });
    },
    methods: {
        handleFileUpload( event ){
          this.product.file = event.target.files[0];
        },
        updateProduct() {
            let formData = new FormData();
            formData.append('name', this.product.name);
            formData.append('picture', this.product.file);
            axios
                .post(`http://localhost:8000/api/product/update/${this.$route.params.id}`, formData , {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then((res) => {
                    this.$router.push({ name: 'products' });
                });
        }
    }
}
</script>