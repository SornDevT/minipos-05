<template>
    <div>
        <div class="row">
          <div class="col-md-8">
            <div class="card">
            <div class="card-body">
              <input type="text" class=" form-control" placeholder="ຄົ້ນຫາສິນຄ້າ....">
            </div>
          </div>

          <div class="row pt-4" style="overflow:auto; height:70vh;">
     
            <div class="col-md-3 mb-4" v-for="item in StoreData.data" :key="item.id">
              <div class="card">
                <img class="card-img-top image_product_cover" :src="('assets/img/'+item.image)" alt="Card image cap" v-if="item.image" >
                <img class="card-img-top image_product_cover" :src="('assets/img/no_img.jpg')" alt="Card image cap" v-if="!item.image">
                <div class="card-body p-2 text-center">
                  {{ item.name }}<br>
                  <span class="text-price-pos"> {{ formatPrice(item.price_sell) }} Kip</span> 
                </div>
              </div>
            </div>
           
          
         
          </div>

          


          </div>
          <div class="col-md-4">
            <div class="card">
              <div class=" card-body" style="overflow:auto; height:82vh;">
                <div class=" d-flex justify-content-between text-allprice mb-2">
                    <span>ລວມຍອດເງິນທັງ:</span>
                    <span>120,000 ກີບ</span>
                </div>
                <button type="button" style="width:100%" class="btn rounded-pill btn-success mb-2">ຊຳລ່ະເງິນ</button>

                <table class="table table-bordered">
        <thead>
          <tr>
            <th>ລາຍການ</th>
            <th>ລາຄາ</th>
            <th>ຍອດລວມ</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <td>aaaa</td>
              <td>aaaa</td>
              <td>aaaa</td>
            </tr>
            <tr>
              <td>aaaa</td>
              <td>aaaa</td>
              <td>aaaa</td>
            </tr>
            <tr>
              <td>aaaa</td>
              <td>aaaa</td>
              <td>aaaa</td>
            </tr>
        </tbody>
      </table>
              </div>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Minipos5Pos',

    data() {
        return {
          search:'',
          StoreData:[],
        };
    },

    mounted() {
        
    },

    methods: {
      formatPrice(value) {
			let val = (value / 1).toFixed(0).replace(",", ".");
			return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
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

<style>
  .text-allprice{
    font-weight: bold;
    color: rgb(42, 205, 246);
  }
  .text-price-pos{
    font-size: 12px;
    font-weight: bold;
    color: rgb(42, 205, 246);
  }
  .image_product_cover{
    width: 100%;
    height: 140px;
    object-fit: cover;
    object-position: center;
  }
</style>