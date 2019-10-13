@extends('layouts.app')


@section('content')

    <div class="container">
        {{--vue组建--}}
        <order-list
                :orders="{{ json_encode($orders) }}"
                :user="{{ json_encode(auth()->user()) }}"
                :statuses="{{ json_encode($statuses) }}"
        ></order-list>

    </div>


@endsection