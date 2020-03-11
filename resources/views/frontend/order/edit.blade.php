@extends('layouts.frontend')
@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Order id: {{$order->id}}</h5>
                    </div>
                    <div class="ibox-content">
                        {!! Form::open(['route' => ['order.update', $order], 'method' => 'put']) !!}
                            @include('frontend.order._form', ['model' => $order])

                            <div class="form-group">
                                <div class="row">
                                    {!! Form::label('products', 'Products', ['class' => 'col-form-label col-sm-2']) !!}
                                    @include('frontend.order.include.table.order_products', ['orderProducts' => $order->products])
                                </div>
                            </div>

                            <div class="text-right">
                                <span class="btn btn-info btn-lg">Total price: {{$order->totalPrice}}</span>
                                {!! Form::submit('Сохранить', ['class' => 'btn btn-primary btn-lg']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection