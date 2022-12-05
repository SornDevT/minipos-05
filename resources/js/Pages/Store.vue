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

  {{ FormStore }} | {{ FormType }}
  <hr>
  {{ StoreData }}
  <hr>
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
          <input type="text" class="form-control" id="exampleFormControlInput1" v-model="FormStore.price_buy" placeholder="ປ້ອນລາຄາຊື້...">
        </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">ລາຄາຂາຍ</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" v-model="FormStore.price_sell" placeholder="ປ້ອນລາຄາຂາຍ...">
        </div>
            </div>
        </div>
    </div>
  </div>
  <div class="table-responsive text-nowrap" v-if="!FormShow">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>ຊື່ສິນຄ້າ</th>
          <th>ລາຄາຊື້</th>
          <th>ຈັດການ</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr v-for="list in StoreData" :key="list.id">
          <td width="50"> {{ list.id }} </td>
          <td> {{ list.name }} </td>
          <td width="200"> {{ list.price_buy }} </td>
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
            EditID:'',
            FormShow: false,
            FormType: false,
            StoreData:[ { "id": 326, "name": "ຄັນຮົ່ມ", "amount": 50, "price_buy": "15000", "price_sell": "30000" }, { "id": 978, "name": "ເກີບຜ້າໃບ", "amount": 20, "price_buy": "20000", "price_sell": "50000" }, { "id": 357, "name": "ໂສ້ງຜູ້ຊາຍ", "amount": 20, "price_buy": "40000", "price_sell": "80000" }, { "id": 128, "name": "ສະບູ່ລ້າງໜ້າ", "amount": 40, "price_buy": "30000", "price_sell": "40000" } ],
            FormStore:{
              name:'',
              amount:'',
              price_buy:'',
              price_sell:''
            },

        };
    },

    mounted() {
        
    },

    methods: {
      add_store(){
        this.FormShow = true;
      },
      close_form(){
        this.FormShow = false;
      },
      save_data(){

        if(this.FormType){ // ຖ້າຫາກວ່າໂຕແປ FormType ມີຄ່າເປັນ True

          // ອັບເດດຂໍ້ມູນ
          this.StoreData.find((i)=>i.id == this.EditID).name = this.FormStore.name;
          this.StoreData.find((i)=>i.id == this.EditID).amount = this.FormStore.amount;
          this.StoreData.find((i)=>i.id == this.EditID).price_buy = this.FormStore.price_buy;
          this.StoreData.find((i)=>i.id == this.EditID).price_sell = this.FormStore.price_sell;


        } else { // ຖ້າຫາກວ່າໂຕແປ FormType ບໍ່ມີຄ່າເປັນ True

          // ເພີ່ມຂໍ້ມູນໃໝ່
          this.StoreData.push({
            id: Math.floor(Math.random()*1000),
            name: this.FormStore.name,
            amount: this.FormStore.amount,
            price_buy: this.FormStore.price_buy,
            price_sell: this.FormStore.price_sell
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
        let item = this.StoreData.find((i)=>i.id == id);

        // ນຳຂໍ້ມູນໃນ item ມາສະແດງໃສ່ ຟອມ
        this.FormStore.name = item.name;
        this.FormStore.amount = item.amount;
        this.FormStore.price_buy = item.price_buy;
        this.FormStore.price_sell = item.price_sell;

        // ສະແດງຟອມ
        this.FormShow = true;


      },
      del_data(id){

        // ຄົ້ນຫາແລ້ວທຳການລຶບຂໍ້ມູນ
        let index = this.StoreData.map((i)=>i.id).indexOf(id);
        this.StoreData.splice(index,1);
      }
    },
};
</script>

<style lang="scss" scoped>

</style>