<template>
    <div>
      
      <div class="col-md-12 col-lg-12">
    
    <div class="row">
        <div class="co-md-12">
            <div class="card">
  <h5 class="card-header">ລາຍການທຸລະກຳ</h5>

  
  <div class="table-responsive text-nowrap mt-2" >

    <table class="table table-hover border">
      <thead>
        <tr>
          <th>ວັນທີ່</th>
          <th>ເລກທີ່ທຸລະກຳ</th>
          <th >ປະເພດທຸລະກຳ</th>
          <th>ລາຍລະອຽດ</th>
          <th>ມູນຄ່າ</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr v-for="list in TranData.data" :key="list.id">
            <td>{{list.created_at}}</td>
            <td>{{list.tran_id}}</td>
            <td>{{list.tran_type}}</td>
            <td>{{list.tran_detail}}</td>
            <td>{{list.price}}</td>
        </tr>
       
   
      </tbody>
    </table>
    <div class="p-2">
       <!-- <pagination :pagination="StoreData" :offset="4" @paginate="getDataStore($event)" /> -->
    </div>
   

  </div>
</div>
        </div>
    </div>
  </div>
    </div>
</template>

<script>
export default {
    name: 'Minipos5Transection',

    data() {
        return {
            TranData:[],
        };
    },

    mounted() {
        
    },

    methods: {
        GetTran(page){
          this.$axios.get("/sanctum/csrf-cookie").then((response)=>{
            this.$axios.get(`api/transection?page=${page}`).then((response)=>{
              this.TranData = response.data;
            }).catch((error)=>{
              console.log(error);
            });
          });

        }
    },
    created(){
      this.GetTran();
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