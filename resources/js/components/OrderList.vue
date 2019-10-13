<template>

    <div v-if="orders.data.length">

        <div class="card mb-3" v-for="order in orders.data" :key="order.id">

            <div class="card-header d-flex flex-row justify-content-between">

                <span>订单号：{{ order.orderNo }}</span>

                <span>订单金额：{{ order.total }}</span>

                <span>订单用户：{{ user.name }}</span>

            </div>

            <div class="card-body">

                <el-timeline>
                    <el-timeline-item
                            v-for="(status, index) in order.statuses"
                            :key="index"
                            :timestamp="status.created_at">
                        {{ cnStatus(status.name) }}
                        <br>
                        <small class="text-muted">
                            {{ cnReason(status.name) }}
                        </small>
                    </el-timeline-item>
                </el-timeline>
            </div>
        </div>
    </div>

</template>

<script>

export default{
    props:{
        orders : Object,
        user : Object,
        statuses : Object
    },
    data(){
      return {
          reasons:{
              1:"用户已下单并支付",
              2:"卖家已接单，请耐心等待～",
              3:"卖家已发货，正在等待运送",
              4:"骑手已取货，正在运送中",
              5:"已送达，订单完成"
          }
      }
    },
    created(){
//      this.pushCreateStatus()
    },
    methods:{
        pushCreateStatus(){
            this.orders.data.forEach((order)=>{
                order.statuses.push({
                    name : 0,
                    created_at: order.created_at
                })
            })
        },
        cnStatus(key){
            return this.statuses[key]
        },
        cnReason(key){
            return this.reasons[key]
        }
    }
}

</script>

<style>

</style>