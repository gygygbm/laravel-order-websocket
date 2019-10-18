<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

//Broadcast::channel('User.{id}', function ($user, $id) {
//    return (int) $user->id === (int) $id;
//});
//通知监听
Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
//广播监听
Broadcast::channel('Order.{order}', function ($user,\App\Order $order) {
    $id=$order->user_id;
    return (int) $user->id === (int) $id;
});
