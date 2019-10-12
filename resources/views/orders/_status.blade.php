{!! Form::open(['route'=>['order.update',$order->id],'method'=>'post']) !!}

    <div class="form-row align-items-center">

        <div class="clo-auto">
            {!! Form::select('status',$statuses,$order->status,['class'=>'form-control form-control-sm','placeholder'=>'请选择订单状态']) !!}
        </div>

        <div class="clo-auto">
            {!! Form::submit('提交',['class'=>'btn btn-sm btn-success']) !!}
        </div>
    </div>


{!! Form::close() !!}