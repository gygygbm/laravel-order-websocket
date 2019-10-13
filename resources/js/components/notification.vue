<template>

</template>

<script>
    export default{
        props:{
            user: Object
        },
        created(){
            this.listenNotification()
        },
        methods:{
            listenNotification(){
                //监听频道
                window.Echo.private(`User.${this.user.id}`)
                //监听事件
                        .listen('OrderStatusUpdated',(e)=>{
                            this.buildMessage(e)
                        })
            },
            buildMessage(e){
                this.$notify({
                    title: '订单状态已更新',
                    message: `${e.cnStatus}(请点击查看详情)`,
                    type: 'success',
                    duration: 0,
                    onClick: ()=>{
                        window.location.href=`/users/${this.user.id}/orders`
                    }
                });
            }
        }
    }
</script>

<style>

</style>
