<template>
    <div>
    <div class="col-md-12 col-lg-12">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-6 mb-4">
        <div class="card">
          <div class="card-body pb-0">
            <span class="d-block fw-semibold">ລາຍຮັບ</span>
          </div>
         
          <div class="p-3 pt-2 d-flex justify-content-between">
            <i class='menu-icon bx bx-line-chart'></i>
            <span>aaaa</span>
          </div>
        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 139px; height: 199px;"></div></div><div class="contract-trigger"></div></div></div>
      </div>

      <div class="col-lg-3 col-md-3 col-6 mb-4">
        <div class="card">
          <div class="card-body pb-0">
            <span class="d-block fw-semibold">ລາຍຈ່າຍ</span>
          </div>
         
          <div class="p-3 pt-2 d-flex justify-content-between">
            <i class=' menu-icon bx bx-line-chart'></i>
            <span>aaaa</span>
          </div>
        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 139px; height: 199px;"></div></div><div class="contract-trigger"></div></div></div>
      </div>

      <div class="col-lg-3 col-md-3 col-6 mb-4">
        <div class="card">
          <div class="card-body pb-0">
            <span class="d-block fw-semibold">ກຳໄລ</span>
          </div>
         
          <div class="p-3 pt-2 d-flex justify-content-between">
            <i class='menu-icon bx bx-line-chart'></i>
            <span>aaaa</span>
          </div>
        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 139px; height: 199px;"></div></div><div class="contract-trigger"></div></div></div>
      </div>

      <div class="col-lg-3 col-md-3 col-6 mb-4">
        <div class="card">
          <div class="card-body pb-0">
            <span class="d-block fw-semibold">ສະຕ໋ອກສິນຄ້າ</span>
          </div>
         
          <div class="p-3 pt-2 d-flex justify-content-between">
            <i class='menu-icon bx bx-line-chart'></i>
            <span>aaaa</span>
          </div>
        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 139px; height: 199px;"></div></div><div class="contract-trigger"></div></div></div>
      </div>

      
  
   
     
    </div>
    <div class="row">
        <div class="co-md-12">
            <div class="card">
  <h5 class="card-header">Hoverable rows</h5>

  <!-- {{ FormStore }} | {{ FormType }}
  <hr>
  {{ StoreData }}
  <hr> -->
  <div class=" d-flex justify-content-end "> 
    <button type="button" class="btn btn-info me-2" v-if="!FormShow" @click="add_store()">ເພີ່ມ</button>
    <button type="button" class="btn btn-success me-2" v-if="FormShow" @click="save_data()" >ບັນທຶກ</button>
    <button type="button" class="btn btn-danger me-2" v-if="FormShow" @click="close_form()" >ຍົກເລີກ</button>
  </div>
  <div class="row p-2" v-if="FormShow">
    <div class="col-md-4">
      aaaa
    </div>
    <div class="col-md-8">
      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">ຊື່ສິນຄ້າ</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" v-model="FormStore.name" placeholder="ປ້ອນຊື່ສິນຄ້າ...">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">ຈຳນວນ</label>
          <input type="number" class="form-control" id="exampleFormControlInput1" v-model="FormStore.amount" placeholder="ປ້ອນຈຳນວນ...">
        </div>
        <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">ລາຄາຊື້</label>
          <cleave :options="options" class="form-control" id="exampleFormControlInput1" v-model="FormStore.price_buy" placeholder="ປ້ອນລາຄາຊື້..." />
        </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">ລາຄາຂາຍ</label>
          <cleave :options="options" class="form-control" id="exampleFormControlInput1" v-model="FormStore.price_sell" placeholder="ປ້ອນລາຄາຂາຍ..." />
        </div>
            </div>
        </div>
    </div>
  </div>
  <div class="table-responsive text-nowrap mt-2" v-if="!FormShow">
    <div class="row p-2">
      <div class="col-md-6"></div>
      <div class="col-md-6">
        <input type="text" class="form-control"   placeholder="ຄົ້ນຫາ..." v-model="search" @keyup.enter="getDataStore()">
      </div>
    </div>
    <table class="table table-hover border">
      <thead>
        <tr>
          <th>ID</th>
          <th>ຊື່ສິນຄ້າ</th>
          <th class="text-center">ລາຄາຊື້</th>
          <th>ຈັດການ</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr v-for="list in StoreData.data" :key="list.id">
          <td width="50"> {{ list.id }} </td>
          <td> {{ list.name }} </td>
          <td width="200" class="text-end"> {{ formatPrice(list.price_buy) }} </td>
          <td width="150">
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);" @click="edit_data(list.id)"><i class="bx bx-edit-alt me-1"></i> ແກ້ໄຂ</a>
                <a class="dropdown-item" href="javascript:void(0);" @click="del_data(list.id)"><i class="bx bx-trash me-1"></i> ລຶບ</a>
              </div>
            </div>
          </td>
        </tr>
        
       
   
      </tbody>
    </table>
    <div class="p-2">
       <pagination :pagination="StoreData" :offset="4" @paginate="getDataStore($event)" />
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
    name: 'Minipos5Store',

    data() {
        return {
            search:'',
            EditID:'',
            FormShow: false,
            FormType: false,
            StoreData:[],
            FormStore:{
              name:'',
              amount:'',
              price_buy:'',
              price_sell:''
            },
            options: {
                  //prefix: '₭ ',
                  numeral: true,
                  numeralPositiveOnly: true,
                  noImmediatePrefix: true,
                  rawValueTrimPrefix: true,
                  numeralIntegerScale: 10,
                  numeralDecimalScale: 2,
                  numeralDecimalMark: '.',
                  delimiter: ','
                },
        };
    },

    mounted() {
        
    },

    methods: {
      formatPrice(value) {
			let val = (value / 1).toFixed(0).replace(",", ".");
			return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		},
      add_store(){
        this.FormShow = true;
      },
      close_form(){
        this.FormShow = false;
      },
      save_data(){

        if(this.FormType){ // ຖ້າຫາກວ່າໂຕແປ FormType ມີຄ່າເປັນ True

          // ອັບເດດຂໍ້ມູນ
          // this.StoreData.find((i)=>i.id == this.EditID).name = this.FormStore.name;
          // this.StoreData.find((i)=>i.id == this.EditID).amount = this.FormStore.amount;
          // this.StoreData.find((i)=>i.id == this.EditID).price_buy = this.FormStore.price_buy;
          // this.StoreData.find((i)=>i.id == this.EditID).price_sell = this.FormStore.price_sell;


          // ທຳການ ຍິງຂໍ້ມູນ ໄປທີ່ back-end ເພື່ອທຳການ ອັບເດດຂໍ້ມູນ ລົງຖານຂໍ້ມູນ
            let formDataStore = new FormData();
            formDataStore.append("name", this.FormStore.name);
            formDataStore.append("amount", this.FormStore.amount);
            formDataStore.append("price_buy", this.FormStore.price_buy);
            formDataStore.append("price_sell", this.FormStore.price_sell);

           // console.log(formDataStore);
           this.$axios.get("/sanctum/csrf-cookie").then((response)=>{
            this.$axios.post(`/api/store/update/${this.EditID}`, formDataStore).then((response) => {
                console.log('update data success!');
                this.getDataStore();
            }).catch((error)=>{
              console.log(error);
            });
          });


        } else { // ຖ້າຫາກວ່າໂຕແປ FormType ບໍ່ມີຄ່າເປັນ True

          // ເພີ່ມຂໍ້ມູນໃໝ່
          // this.StoreData.push({
          //   id: Math.floor(Math.random()*1000),
          //   name: this.FormStore.name,
          //   amount: this.FormStore.amount,
          //   price_buy: this.FormStore.price_buy,
          //   price_sell: this.FormStore.price_sell
          // });

          // ທຳການ ຍິງຂໍ້ມູນ ໄປທີ່ back-end ເພື່ອທຳການ ບັນທຶກຂໍ້ມູນ ລົງຖານຂໍ້ມູນ
          let formDataStore = new FormData();
          formDataStore.append("name", this.FormStore.name);
          formDataStore.append("amount", this.FormStore.amount);
          formDataStore.append("price_buy", this.FormStore.price_buy);
          formDataStore.append("price_sell", this.FormStore.price_sell);

          this.$axios.get("/sanctum/csrf-cookie").then((response)=>{
            this.$axios.post("/api/store/add", formDataStore).then((response) => {
                //console.log('Sent data success!');
                this.getDataStore();
            }).catch((error)=>{
              console.log(error);
            });
          });

          

        }

          



          // ເຄີຍຂໍ້ມູນໃນຟອມ
          this.FormStore.name = '';
          this.FormStore.amount = '';
          this.FormStore.price_buy = '';
          this.FormStore.price_sell = '';

          // ປິດຟອມ
          this.FormShow = false;

          // ກຳນົດສະຖານະຟອມເປັນ false ເພື່ອເພີ່ມຂໍ້ມູນໃໝ່
          this.FormType = false;

      },
      edit_data(id){

        // ເກັບໂຕແປ id ໄວ້ເພື່ອອັບເດດ
          this.EditID = id;


        // ກຳນົດສະຖານະຟອມເປັນ true ເພື່ອອັບເດດຂໍ້ມູນເກົ່າ
        this.FormType = true;

        // ທຳການຄົ້ນຫາຂໍ້ມູນ ເມື່ອພົບເຫັນ ໃຫ້ເອົາເກັບໄວ້ໃນໂຕແປ item
        //let item = this.StoreData.find((i)=>i.id == id);
        this.$axios.get("/sanctum/csrf-cookie").then((response)=>{
          this.$axios.get(`api/store/edit/${id}`).then((response)=>{

            // ນຳຂໍ້ມູນໃນ item ມາສະແດງໃສ່ ຟອມ
            this.FormStore.name = response.data.name;
            this.FormStore.amount = response.data.amount;
            this.FormStore.price_buy = response.data.price_buy;
            this.FormStore.price_sell = response.data.price_sell;

          }).catch((error)=>{
            console.log(error);
          });      
        });

        // ນຳຂໍ້ມູນໃນ item ມາສະແດງໃສ່ ຟອມ
        // this.FormStore.name = item.name;
        // this.FormStore.amount = item.amount;
        // this.FormStore.price_buy = item.price_buy;
        // this.FormStore.price_sell = item.price_sell;

        // ສະແດງຟອມ
        this.FormShow = true;


      },
      del_data(id){

        // ຄົ້ນຫາແລ້ວທຳການລຶບຂໍ້ມູນ
        // let index = this.StoreData.map((i)=>i.id).indexOf(id);
        // this.StoreData.splice(index,1);

        this.$swal({
          title: 'ທ່ານແນ່ໃຈບໍ່?',
          text: "ທີ່ຈະລຶບຂໍ້ມູນນີ້!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'ຕົກລົງ!',
          cancelButtonText:'ຍົກເລີກ'
        }).then((result) => {
          if (result.isConfirmed) {
            this.$axios.get("/sanctum/csrf-cookie").then((response)=>{
            this.$axios.delete(`api/store/delete/${id}`).then((response)=>{

                  this.$swal(
                  'ການລຶບຂໍ້ມູນ!',
                  response.data.message,
                  'success'
                );
              // ອັບເດດລາຍການຂໍ້ມູນ
                this.getDataStore();
            }).catch((error)=>{
              console.log(error)
            });
          });

            
          }
        });

          

      },
      getDataStore(page){
        this.$axios.get("/sanctum/csrf-cookie").then((response)=>{
        this.$axios.get(`api/store?page=${page}&search=${this.search}`).then((response)=>{
          this.StoreData = response.data;
        }).catch((error)=>{
          console.log(error);
        });
      });

      },
      showAlert() {
        // Use sweetalert2
        this.$swal('Hello Vue world!!!');
      },
    },
    watch:{
      "search"(){
          if(this.search == ''){
            this.getDataStore();
          }
      }
    },
    created(){
      this.getDataStore();
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