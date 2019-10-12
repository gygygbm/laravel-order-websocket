<template>

    <div v-if="orders.data.length">

        <div class="card mb-3" v-for="order in orders.data" :key="order.id">

            <div class="card-header d-flex flex-row justify-content-between">

                <span>订单号：{{ order.orderNo }}</span>

                <span>订单金额：{{ order.total }}</span>

                <span>订单用户：{{ user.name }}</span>

            </div>

            <div class="card-body">

            </div>
        </div>
    </div>

</template>

<script>

export default{
    props:{
        orders : Object,
        user : Object
    }
}

</script>

<style>

</style>