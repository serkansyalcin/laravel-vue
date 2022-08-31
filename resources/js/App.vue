<template>
    <div class="container"> 
        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                 <router-link to="/products" class="navbar-brand">Products List</router-link>             
            </div>
            <div class="navbar-header">
               <router-link to="/create" class="navbar-brand">Create Product</router-link>      
            </div>
       
        </div>
        </nav>
        <router-view> </router-view>
    </div>
</template>
 
<script>
    export default {}
</script>