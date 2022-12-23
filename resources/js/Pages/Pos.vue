<template>
  <div>
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <input
              type="text"
              class="form-control"
              placeholder="ຄົ້ນຫາສິນຄ້າ...."
            />
          </div>
        </div>

        <div class="row pt-4" style="overflow: auto; height: 70vh">
          <div
            class="col-md-3 mb-4"
            v-for="item in StoreData.data"
            :key="item.id"
          >
            <div class="card poiter" @click="add_product(item.id)">
              <span v-for="li in ListOrder" :key="li.id">
                <span class="box-num" v-if="item.id == li.id">
                  {{ li.order_amount }}
                </span>
              </span>
              <img
                class="card-img-top image_product_cover"
                :src="'assets/img/' + item.image"
                alt="Card image cap"
                v-if="item.image"
              />
              <img
                class="card-img-top image_product_cover"
                :src="'assets/img/no_img.jpg'"
                alt="Card image cap"
                v-if="!item.image"
              />
              <div class="card-body p-2 text-center">
                {{ item.name }}<br />
                <span class="text-price-pos">
                  {{ formatPrice(item.price_sell) }} Kip</span
                >
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body p-2" style="overflow: auto; height: 82vh">
            <div class="d-flex justify-content-between text-allprice mb-2">
              <span>ລວມຍອດເງິນທັງ:</span>
              <span> {{ formatPrice(TotalAmount) }} ກີບ</span>
            </div>
            <button
              type="button"
              style="width: 100%"
              @click="BT_Play()"
              class="btn rounded-pill btn-success mb-2"
              :disabled="CheckNumPay"
            >
              ຊຳລ່ະເງິນ
            </button>

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ລາຍການ</th>
                  <th>ລາຄາ</th>
                  <th>
                    ຍອດລວມ (<i
                      class="bx bxs-x-circle poiter text-danger"
                      @click="DeleteAll()"
                    ></i
                    >)
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="list in ListOrder" :key="list.id">
                  <td>{{ list.name }}</td>
                  <td class="text-end">
                    <i
                      class="bx bxs-minus-circle poiter text-info"
                      @click="Remove_one(list.id)"
                    ></i>
                    {{ list.order_amount }}
                    <i
                      class="bx bxs-plus-circle poiter text-info" 
                      @click="add_product(list.id)"
                    ></i>
                    |
                    <i
                      class="bx bxs-x-circle poiter text-danger"
                      @click="Delete(list.id)"
                    ></i>
                    <br />
                    {{ formatPrice(list.price_sell) }}
                  </td>
                  <td class="text-end">
                    {{ formatPrice(list.order_amount * list.price_sell) }}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">ຊຳລະສິນຄ້າ</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <h5 class="d-flex justify-content-between">
              <span>ລວມຍອດເງິນ:</span>
              <span>{{ formatPrice(TotalAmount) }} ກີບ</span>
            </h5>
            <h5 class="d-flex justify-content-between">
              <span>ເງິນທີ່ຮັບນຳລູກຄ້າ:</span>
              <span> {{ formatPrice(CashAmount) }} ກີບ</span>
            </h5>
            <h5 class="d-flex justify-content-between text-danger" v-if="CashBack>0">
              <span>ເງິນທອນ:</span>
              <span> {{ formatPrice(CashBack) }} ກີບ</span>
            </h5>
            
            <cleave :options="options" class="form-control" v-model="CashAmount" style="text-align:right" />

            <div class="p-2 justify-content-center d-flex">
              <div class="row" style="width: 250px">
                <div class="col-4 text-center mt-2">
                  <a @click="AddNum(1)"
                    class="btn btn-primary btn-lg text-white"
                    style="width: 60px"
                    >1</a
                  >
                </div>
                <div class="col-4 text-center mt-2">
                  <a @click="AddNum(2)"
                    class="btn btn-primary btn-lg text-white"
                    style="width: 60px"
                    >2</a
                  >
                </div>
                <div class="col-4 text-center mt-2">
                  <a @click="AddNum(3)"
                    class="btn btn-primary btn-lg text-white"
                    style="width: 60px"
                    >3</a
                  >
                </div>
                <div class="col-4 text-center mt-2">
                  <a @click="AddNum(4)"
                    class="btn btn-primary btn-lg text-white"
                    style="width: 60px"
                    >4</a
                  >
                </div>
                <div class="col-4 text-center mt-2">
                  <a @click="AddNum(5)"
                    class="btn btn-primary btn-lg text-white"
                    style="width: 60px"
                    >5</a
                  >
                </div>
                <div class="col-4 text-center mt-2">
                  <button @click="AddNum(6)"
                    type="button"
                    class="btn btn-primary btn-lg text-white"
                    style="width: 60px"
                  >
                    6
                  </button>
                </div>
                <div class="col-4 text-center mt-2">
                  <a @click="AddNum(7)"
                    class="btn btn-primary btn-lg text-white"
                    style="width: 60px"
                    >7</a
                  >
                </div>
                <div class="col-4 text-center mt-2">
                  <a @click="AddNum(8)"
                    class="btn btn-primary btn-lg text-white"
                    style="width: 60px"
                    >8</a
                  >
                </div>
                <div class="col-4 text-center mt-2">
                  <a @click="AddNum(9)"
                    class="btn btn-primary btn-lg text-white"
                    style="width: 60px"
                    >9</a
                  >
                </div>
                <div class="col-4 text-center mt-2">
                  <a @click="AddNum('00')"
                    class="btn btn-primary btn-lg text-white"
                    style="width: 60px"
                    >00</a
                  >
                </div>
                <div class="col-4 text-center mt-2">
                  <a @click="AddNum(0)"
                    class="btn btn-primary btn-lg text-white"
                    style="width: 60px"
                    >0</a
                  >
                </div>
                <div class="col-4 text-center mt-2">
                  <a @click="AddNum('-')"
                    class="btn btn-danger btn-lg text-white"
                    style="width: 60px"
                    > <i class='bx bx-left-arrow-alt'></i> </a>
                </div>
              </div>
            </div>
            <div class=" text-center pt-4">
              <button
              type="button"
              @click="Confirm_Play()"
              class="btn rounded-pill btn-info mb-2"
              :disabled="CheckConfirmPay"
            >
              ຍືນຍັນຊຳລ່ະເງິນ
            </button>
            </div>
            

          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-label-secondary"
              data-bs-dismiss="modal"
            >
              ປິດ
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Minipos5Pos",

  data() {
    return {
      search: "",
      CashAmount:'',
      StoreData: [],
      ListOrder: [],
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

  mounted() {},
  computed: {
    CashBack(){
      return this.CashAmount-this.TotalAmount;
    },
    TotalAmount() {
      return this.ListOrder.reduce(
        (num, item) => num + item.price_sell * item.order_amount,
        0
      );
    },
    
    CheckNumPay() {
      if (this.TotalAmount > 0) {
        return false;
      } else {
        return true;
      }
    },
    CheckConfirmPay() {
      if (this.CashAmount >= this.TotalAmount) {
        return false;
      } else {
        return true;
      }
    },
  },
  methods: {
    Confirm_Play(){
     // console.log('Confirm Pay!!');

      this.$axios.get("/sanctum/csrf-cookie").then((response)=>{
            this.$axios.post(`/api/transection/add`, {
              acc_type:'income',
              listorder: this.ListOrder
            } ).then((response) => {

              // ປິດ ບ໋ອກຊຳລະເງິນ
              $("#modalCenter").modal("hide");
              // clear ລາຍການສັ່ງຊື້
              this.ListOrder = [];
              // clear ເງິນທີ່ຮັບນຳລູກຄ້າ
              this.CashAmount = "";
              // ອັບເດດລາຍການ ສັ່ງຊື້
              this.getDataStore();

                if(response.data.success){
                      this.$swal(
                      response.data.message,
                      response.data.message,
                      'success'
                    );
                }
           
            }).catch((error)=>{
              console.log(error);
            });
          });

    },
    AddNum(num){
        //console.log(num);
        if(num == '-'){
          this.CashAmount = this.CashAmount.slice(0,-1);
        } else {
          this.CashAmount = this.CashAmount + num;
        }
    },
    BT_Play() {
      $("#modalCenter").modal("show");
    },
    // Add_one(id) {
    //   this.ListOrder.find((i) => i.id == id).order_amount++;
    // },
    Remove_one(id) {
      this.ListOrder.find((i) => i.id == id).order_amount--;

      let item = this.ListOrder.find((i) => i.id == id).order_amount;

      if (item < 1) {
        //console.log(item);
        this.ListOrder.splice(this.ListOrder.map((i) => i.id).indexOf(id), 1);
      }
    },
    Delete(id) {
      this.ListOrder.splice(this.ListOrder.map((i) => i.id).indexOf(id), 1);
    },
    DeleteAll() {
      this.ListOrder = [];
    },
    add_product(id) {

     // console.log('Add one!')
      let item = this.StoreData.data.find((i) => i.id == id);

      //console.log(item)

      if(item.amount>0){
        //console.log('Ok')

        let list_order = this.ListOrder.find((i) => i.id == id);

        if(list_order){ // ກວດຊອບວ່າ ລາຍການສັ່ງ ລະຫັດສິນຄ້ານີ້ ມີຢູ່ລາຍການສັ່ງຊື້ຫຼືບໍ່
          
          let old_order_amount = list_order.order_amount;

          console.log('ຈຳນວນໃນສະຕ໋ອກ: '+item.amount)

          if(item.amount - old_order_amount > 0){ // ກວດຊອບ ລາຍການສິນຄ້າ ກັບ ລາຍການສັ່ງຊື້

                  // ກວດຊອບ ເພີ່ມລາຍການສິນຄ້າ
                if (this.ListOrder.find((i) => i.id == id)) {
                  this.ListOrder.find((i) => i.id == id).order_amount++;
                } else {
                  this.ListOrder.push({
                    id: item.id,
                    name: item.name,
                    price_sell: item.price_sell,
                    order_amount: 1,
                  });
                }

          } else {
            this.$swal.fire("ຜິດຜາດ!","ສິນຄ້າໝົດແລ້ວ!","error");
          }

        } else {

          // ກວດຊອບ ເພີ່ມລາຍການສິນຄ້າ
          if (this.ListOrder.find((i) => i.id == id)) {
                  this.ListOrder.find((i) => i.id == id).order_amount++;
                } else {
                  this.ListOrder.push({
                    id: item.id,
                    name: item.name,
                    price_sell: item.price_sell,
                    order_amount: 1,
                  });
                }

        }
      } else {
        this.$swal.fire("ຜິດຜາດ!","ສິນຄ້າໝົດແລ້ວ!","error");
      }
    },
    formatPrice(value) {
      let val = (value / 1).toFixed(0).replace(",", ".");
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    },
    getDataStore(page) {
      this.$axios.get("/sanctum/csrf-cookie").then((response) => {
        this.$axios
          .get(`api/store?page=${page}&search=${this.search}`)
          .then((response) => {
            this.StoreData = response.data;
          })
          .catch((error) => {
            console.log(error);
          });
      });
    },
  },
  watch: {},
  created() {
    this.getDataStore();
    
    // if(!this.$storage.getStorageSync('isLoggin')){
    //     window.location.href = "/login"
    //   }
  },
  // beforeRouteEnter(to, from, next) {
  //   if (window.Laravel.isLoggin) {
  //     next();
  //   } else {
   
  //     window.location.href = "/login";
  //     //location.reload();
  //   }
  // },
};
</script>

<style>
.text-allprice {
  font-weight: bold;
  color: rgb(42, 205, 246);
}
.text-price-pos {
  font-size: 12px;
  font-weight: bold;
  color: rgb(42, 205, 246);
}
.image_product_cover {
  width: 100%;
  height: 140px;
  object-fit: cover;
  object-position: center;
}

.box-num {
  position: absolute;
  background-color: blueviolet;
  color: white;
  padding: 5px;
  right: 0px;
  border-radius: 0px 10px 0px 10px;
}
.poiter {
  cursor: pointer;
}
</style>