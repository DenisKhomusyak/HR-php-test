@extends('layouts.frontend')
@section('content')

    <div class="filters pb-2">
        {!! Form::open(['route' => ['product.index'], 'method' => 'get']) !!}
            <div class="form-group">
                <div class="row">
                    {!! Form::label('sort[column]', 'Колонка', ['class' => 'col-sm-2']) !!}
                    <div class="col-sm-9 row">
                        <div class="col-sm-9">
                            {!! Form::select('sort[column]', ['name' => 'name', 'xyz' => 'xyz'], ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

        <div class="form-group">
            <div class="row">
                {!! Form::label('sort[type]', 'Колонка', ['class' => 'col-sm-2']) !!}
                <div class="col-sm-9">
                    <div class="col-sm-9">
                        {!! Form::select('sort[type]', ['asc' => 'asc', 'desc' => 'desc'], ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                {!! Form::label('count', 'Кол-во', ['class' => 'col-sm-2']) !!}
                <div class="col-sm-3">
                    {!! Form::text('count', $products->count(), ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="text-right">
            {!! Form::submit('Применить', ['class' => 'btn btn-success']) !!}
        </div>

        {!! Form::close() !!}
    </div>

    <table class="table table-bordered">
        <thead>
            <tr class="thead-dark">
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Vendor name</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr data-product-id="{{$product->id}}">
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->vendorName }}</td>
                    <td class="form-inline">
                        <div class="form-group mb-2 col-sm-3">
                            <input type="text" name="price" value="{{ $product->price }}"
                                   class="form-control-plaintext">
                        </div>
                        <button class="btn btn-warning btn-sm mb-2 savePriceBtn">save</button>
                    </td>
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="5">No have order yet!</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr class="text-center">
                <td colspan="5">{{ $products->links() }}</td>
            </tr>
        </tfoot>
    </table>
@endsection