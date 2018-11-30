<template>
    <form class="auth-body" @submit.prevent="login">
        <!--<div class="form-group"><input type="text" name="surname" id="surname" class="form-control" placeholder="First Name"></div>
        <div class="form-group"><input type="text" name="name" id="name" class="form-control" placeholder="Last Name"></div>-->
        <div class="form-group">
            <input type="text" autocomplete="off" v-model="auth.email" id="email" class="form-control" placeholder="Email Address" @keyup="formCheckEmail" v-bind:class="{'is-invalid': formErrors.email}">
            <span class="invalid-feedback">Invalid Email Address</span>
        </div>
        <div class="form-group"><input type="password" autocomplete="off"  v-model="auth.password" id="password" class="form-control" placeholder="Password" v-bind:class="{'is-invalid' : formErrors.login}"></div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" v-model="auth.remember" id="remember">
                <label class="form-check-label" for="remember">
                    Remember Me
                </label>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <input type="submit"  id="login" class="btn btn-primary" value="Login now"> <a href="/register" class="btn btn-outline-primary ml-2">Create account</a>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        name: "Login",
        data (){
            return {
                auth : [],
                formErrors : []
            }
        },
        methods : {
            login () {
                if (this.validEmail(this.auth.email)){
                    axios.post('/login',{
                        email : this.auth.email,
                        password : this.auth.password,
                        remember : this.auth.remember
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
                            this.formErrors.login
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
                    });
                }else{
                    this.formErrors.email = true
                }
            },
            formCheckEmail(){
                if (!this.validEmail(this.auth.email)) {
                    this.formErrors.email = true
                }else{
                    this.formErrors.email = false
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