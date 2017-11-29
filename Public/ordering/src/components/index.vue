<template>
    <div class="frame" v-cloak>
        <header>
            <img src="../static/images/arrow-left.png" alt="" class="back-icon">
            <p class="header-title">柚子餐厅</p>
            <p class="header-nav">首页</p>
        </header>
        <div class="notice-box">
            <div class="notice-info-box">
                <img src="../static/images/hornfill.png" alt="" class="horn">
                <p class="notice-info">门店装修中，开店时间为12月初</p>
            </div>
            <img src="../static/images/ios-close-outline.png" alt="" class="close-btn">
        </div>
        <div class="rank-list">
            <p class="rank-item">价格
                <img src="../static/images/arrow-down-unselect.png" alt="" class="arrow-down">
            </p>
            <p class="rank-item">销量
                <img src="../static/images/arrow-down-unselect.png" alt="" class="arrow-down">
            </p>
            <p class="rank-item">评价
                <img src="../static/images/arrow-down-unselect.png" alt="" class="arrow-down">
            </p>
        </div>
        <div class="dishes-list">
            <div class="dishes-class">
                <div class="class-item" v-for="(item,index) in dishesClass" @click="selectClass(index,item)" :class="{'cur-class':index===curClassIndex}">{{item}}</div>
            </div>
            <div class="dishes-class-detail">
                <div class="class-detail-item" v-for="(item,index) in dishes">
                    <img :src="item.img" alt="" class="detail-img">
                    <div class="detail-content">
                        <p class="detail-title">{{item.dishesname}}</p>
                        <p class="detail-comment">售{{item.sale}}人
                            <span>赞{{item.praise}}人</span>
                        </p>
                        <div class="order-operation">
                            <p class="detail-price">￥{{item.price}}/份</p>
                            <div class="operation-box">
                                <img src="../static/images/minus.png" alt="" class="minus" @click="minus(item.id)" v-show="item.selectnum>0">
                                <input type="text" readonly class="number" placeholder="1" v-model="item.selectnum" v-show="item.selectnum>0">
                                <img src="../static/images/plus.png" alt="" class="plus" @click="plus(item.id)">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <footer>
            <div class="shopping-car-box">
                <div class="car-box">
                    <img src="../static/images/un-shopping-cart.png" alt="" class="shopping-car-icon" v-show="shoppingCar.length===0">
                    <img src="../static/images/shoppinged-cart.png" alt="" class="shopping-car-icon" v-show="shoppingCar.length>0">
                    <div class="selected-num" v-if="totalNum>0">{{totalNum}}</div>
                </div>
                <p class="total-price" v-if="totalPrice>0">￥{{totalPrice}}元</p>
            </div>
            <button class="confirm-btn" v-show="shoppingCar.length>0" @click="submitOrder">选好了</button>
            <button class="confirm-btn-disabled" v-show="shoppingCar.length===0">选好了</button>
        </footer>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                orignDishes: [],
                dishes: [],
                dishesClass: [],
                shoppingCar: [],
                totalNum: 0,
                totalPrice: 0,
                curClassIndex: 0
            }
        },
        created: function () {
            this.getDishes();
        },
        methods: {
            //获取所有菜品
            getDishes: function () {
                this.publicHttp('', 'post', '/Dishes/dishes', (res) => {
                    if (res.status == 200) {
                        this.orignDishes = res.data;
                        this.dishes = this.orignDishes;
                        this.dishesClass = Array.from(new Set(this.getDishesClass(res.data)));
                    }
                })
            },
            //添加菜品
            plus: function (id) {
                this.dishes.forEach((item, index) => {
                    if (item.id == id) {
                        item.selectnum++;
                    }
                });
                this.shoppingCar = this.shoppingCarFunc();
                this.totalPriceNum(this.shoppingCar);
            },
            //移除菜品
            minus: function (id) {
                this.dishes.forEach((item, index) => {
                    if (item.id == id) {
                        item.selectnum--;
                    }
                });
                this.shoppingCar = this.shoppingCarFunc();
                this.totalPriceNum(this.shoppingCar);
            },
            //菜品分类
            getDishesClass: function (array) {
                let arr = ['全部'];
                array.forEach((item, index) => {
                    arr.push(item.class);
                })
                return arr;
            },
            //购物车函数
            shoppingCarFunc: function () {
                let arr = [];
                this.dishes.forEach((item, index) => {
                    if (item.selectnum != 0) {
                        arr.push(item);
                    }
                })
                return arr;
            },
            //计算购物数量及价格函数
            totalPriceNum: function (array) {
                let sumNum = 0;
                let sumPrice = 0;
                array.forEach((item, index) => {
                    sumNum += item.selectnum;
                    sumPrice += item.price * item.selectnum;
                })
                this.totalNum = sumNum;
                this.totalPrice = sumPrice;
            },
            //提交订单
            submitOrder: function () {
                let obj = {
                    orderList: this.shoppingCar,
                    num: this.totalNum,
                    price: this.totalPrice
                }
                this.publicHttp(obj, 'post', '/Order/order', (res) => {
                    console.log(res)
                })
            },
            //选择菜品分类
            selectClass: function (index, item) {
                let arr = [];
                this.curClassIndex = index;
                if (item == '全部') {
                    this.dishes = this.orignDishes;
                } else {
                    this.orignDishes.forEach((ele, index1) => {
                        if (ele.class == item) {
                            arr.push(ele);
                        }
                    })
                    this.dishes = arr;
                }

            }

        },
        destroyed: function () {}
    }
</script>
<style scoped>
    .frame {
        width: 100%;
        height: 100%;
    }

    header {
        width: 100%;
        height: 50px;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .back-icon {
        width: 18px;
        height: 20px;
        margin-left: 3%;
    }

    .header-title {
        font-size: 18px;
    }

    .header-nav {
        margin-right: 3%;
    }

    .notice-box {
        width: 100%;
        height: 40px;
        background: #fffcd1;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-top: 1px solid #eaeaea;
    }

    .horn {
        width: 20px;
        height: 20px;
        margin-right: 5px;
    }

    .close-btn {
        width: 20px;
        height: 20px;
        margin-right: 3%;
    }

    .notice-info-box {
        margin-left: 3%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        font-size: 16px;
    }

    .rank-list {
        width: 100%;
        height: 50px;
        display: flex;
        align-items: center;
        border-top: 1px solid #eeeeee;
    }

    .rank-item {
        width: 33%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 14px;
    }

    .arrow-down {
        width: 20px;
        height: 20px;
        margin-left: 5px;
    }

    .dishes-list {
        width: 100%;
        height: 500px;
        border-top: 1px solid #eeeeee;
        overflow-y: scroll;
        display: flex;
    }

    .dishes-class {
        width: 30%;
        height: 94%;
        background: #f8f8f8;
    }

    .dishes-class-detail {
        width: 70%;
        height: 94%;
        border-left: 1px solid #eaeaea;
    }

    .class-item {
        width: 100%;
        height: 60px;
        border-bottom: 1px solid #eaeaea;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .cur-class {
        background: #fff;
        color: #cb0d17;
    }

    .class-detail-item {
        width: 100%;
        display: flex;
        align-items: center;
        position: relative;
        border-bottom: 1px solid #eaeaea;
    }

    .detail-img {
        width: 60px;
        height: 60px;
        margin-left: 10px;
    }

    .detail-content {
        width: 70%;
        margin-left: 10px;
        overflow: hidden;
    }

    .detail-title {
        font-size: 18px;
        font-weight: bold;
    }

    .detail-comment {
        font-size: 16px;
    }

    .order-operation {
        width: 100%;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .detail-price {
        font-size: 16px;
        height: 100%;
        color: #cb0d17;
        width: 60%;
    }

    .operation-box {
        position: relative;
        width: 40%;
        height: 100%;
        right: 0;
        bottom: 3px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .number {
        width: 30px;
        height: 20px;
        border: none;
        outline: none;
        background: #fff;
        font-size: 16px;
        color: #000;
        position: absolute;
        left: 20px;
        top: 7px;
        text-align: center;
    }

    .plus {
        width: 20px;
        height: 20px;
        position: absolute;
        right: 5%;
        top: 6px;
    }

    .minus {
        width: 20px;
        height: 20px;
        position: absolute;
        left: 0;
        top: 6px;
    }

    footer {
        width: 100%;
        height: 55px;
        background: rgba(32, 29, 29, 0.93);
        position: fixed;
        bottom: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .shopping-car-box {
        height: 100%;
        display: flex;
        align-items: center;
        color: #fff;
        margin-left: 3%;
        font-size: 16px;
    }

    .car-box {
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        margin-right: 20px;
    }

    .shopping-car-icon {
        width: 25px;
        height: 25px;
    }

    .selected-num {
        position: absolute;
        width: 20px;
        height: 15px;
        border-radius: 15px;
        background: #fff;
        font-size: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #cb0d17;
        top: -5px;
        right: -10px;
        font-weight: bold;
    }

    .confirm-btn {
        width: 130px;
        height: 40px;
        border: none;
        outline: none;
        background: #cb0d17;
        border-radius: 5px;
        margin-right: 3%;
        color: #fff;
        font-size: 16px;
    }

    .confirm-btn-disabled {
        width: 130px;
        height: 40px;
        border: none;
        outline: none;
        background: #7d7374;
        border-radius: 5px;
        margin-right: 3%;
        color: #fff;
        font-size: 16px;
    }
</style>