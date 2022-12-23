<template>
    <div>
      
      <div class="col-md-12 col-lg-12">
        
        <DashGrap/>

    <div class="row">
        <div class="co-md-12">
            <div class="card">
  <h5 class="card-header">ລາຍການທຸລະກຳ</h5>

            <div class=" d-flex justify-content-end p-2">
              
              <div class="btn-group me-2" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-secondary" @click="month_type = 'm'"> <i class='bx bx-chevron-right' v-if="month_type == 'm'"></i> ເດືອນ</button>
                <button type="button" class="btn btn-secondary" @click="month_type = 'y'"> <i class='bx bx-chevron-right' v-if="month_type == 'y'"></i> ປີ </button>
              </div>

              <input type="date" class=" form-control me-2" style="width:150px" v-model="dmy">

              <button type="button" class="btn rounded-pill btn-success" @click="GetTran()" >ສະແດງການເຄື່ອນໄຫວ</button>
            </div>

            

  <div class="table-responsive text-nowrap mt-2 p-2" >

    <table class="table table-hover border">
      <thead>
        <tr>
          <th>ວັນທີ່</th>
          <th>ເລກທີ່ທຸລະກຳ</th>
          <th >ປະເພດທຸລະກຳ</th>
          <th>ລາຍລະອຽດ</th>
          <th class="text-center">ມູນຄ່າ</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr v-for="list in TranData.data" :key="list.id">
            <td> {{date(list.created_at)}} </td>
            <td>{{list.tran_id}}</td>
            <td>{{list.tran_type}}</td>
            <td>{{list.tran_detail}}</td>
            <td class="text-end">{{formatPrice(list.price)}}</td>
        </tr>
       
   
      </tbody>
    </table>
    <div class="p-2">
       <pagination :pagination="TranData" :offset="4" @paginate="GetTran($event)" /> 
    </div>
   

  </div>
</div>
        </div>
    </div>
  </div>
    </div>
</template>

<script>

  import moment from "moment";

export default {
    name: 'Minipos5Transection',

    data() {
        return {
            TranData:[],
            month_type:'y',
            dmy:''
        };
    },
    components:{
      moment
    },

    mounted() {
        
    },

    methods: {
      formatPrice(value) {
        let val = (value / 1).toFixed(0).replace(",", ".");
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      },
      date(value){
        return moment(value).format("DD/MM/YYYY");
      },
        GetTran(page){
          this.$axios.get("/sanctum/csrf-cookie").then((response)=>{
            this.$axios.post(`api/transection?page=${page}`,{
              month_type: this.month_type,
              dmy: this.dmy
            }).then((response)=>{
              this.TranData = response.data;
            }).catch((error)=>{
              console.log(error);
            });
          });

        }
    },
    created(){
      this.GetTran();
      if(!this.$storage.getStorageSync('isLoggin')){
        window.location.href = "/login"
      }
    },
    beforeRouteEnter(to, from, next){
      if(window.Laravel.isLoggin){
        next();
      }else{
        
        window.location.href = "/login"
        //location.reload();
      }
    }
};
</script>

<style lang="scss" scoped>

</style>