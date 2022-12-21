<template>
    <div>
        <div class="container d-flex justify-content-center">
  <div class="authentication-wrapper authentication-basic container-p-y col-md-4 ">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="index.html" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">


</span>
              
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">ລົງທະບຽນ ບັນຊີໃໝ່</h4>
          <div class="alert alert-danger d-flex" role="alert" v-if="show_error">
          <span class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i class='bx bx-info-circle fs-6'></i></span>
          <div class="d-flex flex-column ps-1">
            <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">ຜິດຜາດ!!</h6>
            <span>{{text_error}}</span>
          </div>
        </div>
            <div class="mb-3 fv-plugins-icon-container">
              <label for="email" class="form-label">ຊື່ຜູ້ໃຊ້</label>
              <input type="text" class="form-control"  placeholder="ປ້ອນຊື່ຜູ້..." v-model="name" >
            <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="mb-3 fv-plugins-icon-container">
              <label for="email" class="form-label">ອີເມວລ໌</label>
              <input type="text" class="form-control"  placeholder="ປ້ອນອີເມວລ໌..." v-model="email" >
            <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="mb-3 form-password-toggle fv-plugins-icon-container">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">ລະຫັດຜ່ານ</label>
                
              </div>
              <div class="input-group input-group-merge has-validation">
                <input type="password"  class="form-control"  placeholder="ປ້ອນລະຫັດ..." aria-describedby="password" v-model="password" >
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div><div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="mb-3 form-password-toggle fv-plugins-icon-container">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">ຍືນຍັນລະຫັດຜ່ານ</label>
                
              </div>
              <div class="input-group input-group-merge has-validation">
                <input type="password"  class="form-control"  placeholder="ປ້ອນລະຫັດ..." aria-describedby="password" v-model="password2" >
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div><div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
          
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="button" @click="register()">ລົງທະບຽນ</button>
            </div>
           

        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>
    </div>
</template>

<script>
export default {
    name: 'Minipos5Register',

    data() {
        return {
            name:'',
            email:'',
            password:'',
            password2:'',
            show_error:false,
            text_error:''
        };
    },

    mounted() {
        
    },

    methods: {
        register(){
            if(this.name =='' || this.email == '' || this.password == '' || this.password2 == '' ){

                this.show_error = true;
                this.text_error = " ກະລຸນາປ້ອນຂໍ້ມູນໃຫ້ຄົບຖ້ວນ! ";

            } else {

                if(this.password == this.password2){

                    this.show_error = false;
                    this.text_error = "";

                    this.$axios.post("/api/register",{
                        name: this.name,
                        email: this.email,
                        password: this.password
                    }).then((response)=>{

                        if(response.data.success){
                            this.$router.push('login');
                        } else {
                          this.$swal(
                            'ຜິດຜາດ!',
                            response.data.message,
                            'error'
                          );
                        }
            
                        }).catch((error)=>{
                            console.log(error)
                        });

                } else {

                    this.show_error = true;
                    this.text_error = " ລະຫັດບໍ່ກົງກັນ! ກະລຸນາກວດຄືນ... ";

                }

                

            }
        }
    },
    beforeRouteEnter(to, from, next){
      if(!window.Laravel.isLoggin){
        next();
      }else{
        //window.location.href = "/store"
        location.reload();
      }
    }
};
</script>

<style lang="scss" scoped>

</style>