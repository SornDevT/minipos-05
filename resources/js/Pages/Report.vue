<template>
    <div>
      <div class="col-md-12 col-lg-12">
    
    <div class="row">
        <div class="col-md-8">
            <div class="card">
            <h5 class="card-header">ລາຍງານ</h5>

            <div class=" d-flex justify-content-end p-2">
              
              <div class="btn-group me-2" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-secondary" @click="month_type = 'm'"> <i class='bx bx-chevron-right' v-if="month_type == 'm'"></i> ເດືອນ</button>
                <button type="button" class="btn btn-secondary" @click="month_type = 'y'"> <i class='bx bx-chevron-right' v-if="month_type == 'y'"></i> ປີ </button>
              </div>

              <input type="date" class=" form-control me-2" style="width:150px" v-model="dmy">

              <button type="button" class="btn rounded-pill btn-success" @click="CreateReport()" :disabled="disre" >ສະແດງການເຄື່ອນໄຫວ</button>
            </div>

            <MonthlyChart/>

          </div>
        </div>
        <div class="col-md-4">
         
        <div class="card mb-4">
            <div class="card-body pb-0">
              <span class="d-block fw-semibold">ລາຍຮັບ</span>
            </div>
            <div class="p-3 pt-2">
              <small class="text-muted d-block text-center">120,000 ກີບ</small>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body pb-0">
              <span class="d-block fw-semibold">ລາຍຈ່າຍ</span>
            </div>
            <div class="p-3 pt-2">
              <small class="text-muted d-block text-center">120,000 ກີບ</small>
            </div>
        </div>
        <div class="card">
            <div class="card-body pb-0">
              <span class="d-block fw-semibold">ກຳໄລ</span>
            </div>
            <div class="p-3 pt-2">
              <small class="text-muted d-block text-center">120,000 ກີບ</small>
            </div>
        </div>

        </div>
    </div>
  </div>
    </div>
</template>

<script>

import MonthlyChart from './../components/MonthlyChart.vue'

export default {
    name: 'Minipos5Report',

    data() {
        return {
          month_type:'y',
          dmy:'',
        };
    },
    components:{
      MonthlyChart
    },

    mounted() {
        
    },
    computed:{
      disre(){
        if(this.dmy==''){
          return true
        } else {
          return false
        }
      }
    },

    methods: {
      CreateReport(){
        this.$axios.get("/sanctum/csrf-cookie").then((response)=>{
            this.$axios.post(`api/report`,{
              month_type: this.month_type,
              dmy: this.dmy
            }).then((response)=>{

         
            }).catch((error)=>{
              console.log(error);
            });
          });
      }
        
    },
    beforeRouteEnter(to, from, next){
      if(window.Laravel.isLoggin){
        next();
      }else{
        window.location.href = "/login"
      }
    }
};
</script>

<style lang="scss" scoped>

</style>