<template>
    <div>
        <h2 class="text-center">Products List</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Picture</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="product in products" :key="product.id">
                <td>{{ product.id }}</td>
                <td>{{ product.name }} </td>
                <td><img :src="product.picture" height="100" width="100"/>
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: product.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteProduct(product.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
import axios from 'axios';
export default {
    data() {
        return {
            products: []
        }
    },
    created() {
        axios
            .get('http://localhost:8000/api/products/')
            .then(response => {
                console.log(response);
                this.products = response.data;
            });
    },
    methods: {
        deleteProduct(id) { 
            axios
                .delete(`http://localhost:8000/api/products/${id}`)
                .then(response => {
                    let i = this.products.map(data => data.id).indexOf(id);
                    this.products.splice(i, 1)
                });
        }
    }
}
</script>