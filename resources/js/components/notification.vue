<template>
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-btn fa-bell"></i>
            <span class="count" v-if="messages.length">{{ messages.length }}</span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#" v-for="notification in messages" :key="notification.id"
            @click="readMessage(notification)">
               订单状态已更新({{ notification.data.cnStatus }})
            </a>
        </div>
    </li>
</template>

<script>
    export default{
        props:{
            user: Object,
            notifications: Array
        },
        data(){
            return {
                messages:this.notifications
            }
        },
        created(){
            this.listenNotification()
        },
        methods:{
            listenNotification(){
//                //监听频道
//                window.Echo.private(`User.${this.user.id}`)
//                //监听事件
//                        .listen('OrderStatusUpdated',(e)=>{
//                            this.buildMessage(e)
//                        })
                //通知监听
                window.Echo.private(`App.User.${this.user.id}`)
                //监听事件
                        .notification((notification)=>{
                            //根据不同的notifition.type指定不同的类
                            this.buildMessage(notification)
                            this.pushMessage(notification)
                        })
            },
            pushMessage(notification){
                this.messages.push({
                    ...notification,
                    data:{
                        id: notification.id,
                        cnStatus: notification.cnStatus,
                        status: notification.status,
                    }
                })
            },
            buildMessage(e){
                this.$notify({
                    title: '订单状态已更新',
                    message: `${e.cnStatus}(请点击查看详情)`,
                    type: 'success',
                    duration: 0,
                    position:"bottom-right",
                    onClick: ()=>{
                        window.location.href=`/users/${this.user.id}/orders`
                    }
                });
            },
            readMessage(notification){
                axios.post('/notification/read',{notification:notification.id}).then(()=>{
                    window.location.href=`/users/${this.user.id}/orders`
                })

            }
        }
    }
</script>

<style>
.count{
    position: absolute;
    bottom: 50%;
    left: 50%;
    padding: 0 4px;
    font-size: 10px;
    color: #fff;
    background-color: #f1403c;
    border: 2px solid #fff;
    border-radius: 10px;
}
</style>
