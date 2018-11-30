<template>
    <form class="auth-body" @submit.prevent="register">
        <div class="form-group">
            <input type="text" autocomplete="off" v-model="auth.surname" id="surname" class="form-control" placeholder="First name">
        </div>
        <div class="form-group">
            <input type="text" autocomplete="off" v-model="auth.name" id="name" class="form-control" placeholder="Last Name"  v-bind:class="{'is-invalid': formErrors.name}">
            <span class="invalid-feedback" v-for="name in formErrors.name">{{ name }}</span>
        </div>
        <div class="form-group">
            <input type="text" autocomplete="off" v-model="auth.email" id="email" class="form-control" placeholder="Email Address"  v-bind:class="{'is-invalid': formErrors.email}">
            <span class="invalid-feedback" v-for="email in formErrors.email">{{ email }}</span>
        </div>
        <div class="form-group">
            <input type="password" autocomplete="off"  v-model="auth.password" id="password" class="form-control"  placeholder="Password" v-bind:class="{'is-invalid' : formErrors.password}">
            <small class="invalid-feedback" v-for="password in formErrors.password">{{ password }}</small>
        </div>
        <div class="form-row">
            <div class="form-group">
                <input type="submit"  id="register" class="btn btn-primary" value="Sign Up"><a href="/login" class="btn btn-outline-primary ml-2">I have account</a>
            </div>

        </div>
        <p class="text-mutted">
            By clicking Sign Up, I agree to <a href="">Terms of services</a> and <a href="">privacy policy</a>.
        </p>
    </form>
</template>

<script>
    export default {
        name: "Register",
        data (){
            return {
                auth : [],
                formErrors : []
            }
        },
        methods : {
            register () {
                axios.post('/register',{
                    name : this.auth.name,
                    surname : this.auth.surname,
                    email : this.auth.email,
                    password : this.auth.password
                })
                    .then((r) => {
                        window.location.href = "/";
                    }).catch((error) => {
                    // Error
                    if (error.response) {
                        // The request was made and the server responded with a status code
                        // that falls out of the range of 2xx
                        // console.log(error.response.data);
                        // console.log(error.response.status);
                        // console.log(error.response.headers);
                        this.formErrors = error.response.data.errors
                    } else if (error.request) {
                        // The request was made but no response was received
                        // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                        // http.ClientRequest in node.js
                        //console.log(error.request);
                        //this.formErrors.ser
                    } else {
                        // Something happened in setting up the request that triggered an Error
                        console.log('Error', error.message);
                    }
                    console.log(error.config);
                })
            },
            formCheckEmail(){
                if (this.auth.email){
                    if (this.validEmail(this.auth.email)) {
                        this.formErrors.email = null
                    }else{
                        this.formErrors.email = true
                    }
                }else{
                    this.formErrors.email = true
                }
            },
            formCheckName(){
                //name
                if (this.auth.name){
                    if (this.auth.name.length >= 3){
                        this.formErrors.name = null
                    }else{
                        this.formErrors.name = true
                    }
                }else{
                    this.formErrors.name = true
                }

            },
            formCheckPassword(){
                //password
                if (this.auth.password){
                    if (this.auth.password.length >= 8){
                        this.formErrors.password = null
                    }else{
                        this.formErrors.password = true
                    }
                }else{
                    this.formErrors.password = true
                }
            },
            // validation
            validEmail: function (email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }
        }
    }
</script>

<style scoped>

</style>