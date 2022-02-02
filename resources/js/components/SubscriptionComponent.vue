<template>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subscription Form</div>
                <div class="card-body">
                    <div class="alert alert-success" role="alert" v-if="isFormSubmitted">
                        Thanks for signing up!
                    </div>
                    <div v-else>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input ref="email" type="email" id="exampleFormControlInput1" class="form-control" :class="this.errors.email ? errorClass : ''" v-model="formdata.email" placeholder="name@example.com">
                            <div class="invalid-feedback">{{this.errors.email}}</div>
                        </div>
                        <div class="mb-3">
                            <button :disabled="loading" type="button" class="btn btn-primary" @click="submitSubscribtion">Subscribe Me</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                errors: {
                    email: null
                },
                formdata: {
                    email: 'i@bakhtiyor.tj'
                },
                errorClass: 'is-invalid',
                loading: false,
                isFormSubmitted: false
            }
        },
        methods: {
            submitSubscribtion: function(e){
                this.loading = true;
                let hasErrors = false;
                if (!this.formdata.email) {
                    this.errors.email = 'Email required';
                    hasErrors = true;
                }else if (!this.validEmail(this.formdata.email)) {
                    this.errors.email = 'Valid email required';
                    hasErrors = true;
                }
                if (!hasErrors) {
                    this.resetErrors();
                    axios
                        .post('/api/subscription/store', {email: this.formdata.email})
                        .then(response => {
                            this.isFormSubmitted = true;
                        })
                        .catch(error => {
                            this.errors.email = (error.response.data.message) ? error.response.data.message : 'Some server error';
                        })
                        .finally(()=>this.loading = false)
                }
                e.preventDefault();
            },
            resetErrors: function(){
                this.errors = {
                    email: null
                }
            },
            validEmail: function (email) {
                var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }
        },
    }
</script>
