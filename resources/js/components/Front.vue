<template>
    <div class="container" :class="{'loading': loading}">

        <div v-show="!user" class="pt-5">
            <form action="#" @submit.prevent="login">
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                    <div class="col-md-6">
                        <input type="email" id="email" class="form-control" name="email"
                                required autocomplete="email" autofocus v-model="loginData.email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                    <div class="col-md-6">
                        <input type="password" id="password" class="form-control" name="password"
                               required autocomplete="current-password" v-model="loginData.password">
                        <button type="submit" class="btn btn-primary mt-2" @click="login">
                            Login
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row" v-show="user">
            <div class="col-lg-3">
                <h3 class="my-4">Shop Catalog</h3>
                <div class="list-group">
                    <a class="list-group-item" v-for="category in categories">
                        {{ category.name }}
                    </a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row mt-4">
                    <div class="col-lg-4 col-md-6 mb-4" v-for="product in products.data">
                        <div class="card h-100">
                            <a href="#">
                                <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#">{{ product.name }}</a>
                                </h4>
                                <h5>$ {{ product.price }}</h5>
                                <p class="card-text">{{ product.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <pagination :data="products" @pagination-change-page="loadProducts"></pagination>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            categories: [],
            products: {},
            loading: true,
            user: false,
            loginData: {
                email: '',
                password: ''
            }
        }
    },
    created() {
        this.loadCategories();
        this.loadProducts();
    },
    methods: {
        login: function () {
          axios.get('/sanctum/csrf-cookie').then(response => {
              axios.post('/login', this.loginData).then(response => {
                  this.user = true;
                  this.loadCategories();
                  this.loadProducts();
              }).catch(error => console.log(error)); // credentials didn't match
          })
        },
        loadCategories: function () {
            axios.get('/api/categories')
                .then((response) => {
                    this.categories = response.data.data;
                    this.user = true;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        loadProducts(page = 1) {
            axios.get('/api/products?page=' + page)
                .then((response) => {
                    this.products = response.data;
                    this.user = true;
                    this.loading = false;
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
}
</script>
