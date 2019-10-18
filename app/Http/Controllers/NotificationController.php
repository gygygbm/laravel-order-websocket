<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function read(Request $request)
    {
        $notification=auth()->user()->notifications()->findOrFail($request->notification);
        //标记已读
        $notification->markAsRead();
    }
}
