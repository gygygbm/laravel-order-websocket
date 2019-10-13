@extends('layouts.app')


@section('content')

    <div class="container">

       @if(count($orders))
           <table class="table">
               <thead>
                <tr>
                    <td>订单号</td>
                    <td>订单用户</td>
                    <td>订单总额</td>
                    <td>下单时间</td>
                    <td>当前状态</td>
                    <td>订单操作</td>
                </tr>
               </thead>
               <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->orderNo }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->cnStatus }}</td>
                            <td><status-steps
                                        :statuses="{{ json_encode($statuses) }}"
                                        :status="{{ json_encode((int)$order->status) }}"
                                        :order="{{ json_encode($order) }}"
                                ></status-steps></td>
                        </tr>
                    @endforeach
               </tbody>
           </table>
           {{ $orders->links() }}
       @endif
    </div>


@endsection