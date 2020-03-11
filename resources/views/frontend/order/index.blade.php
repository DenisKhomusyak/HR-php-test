@extends('layouts.frontend')
@section('content')
    <table class="table table-bordered">
        <thead>
            <tr class="thead-dark">
                <th scope="col">ID</th>
                <th scope="col">Partner</th>
                <th scope="col">Price</th>
                <th scope="col">Order</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->partnerName }}</td>
                    <td>{{ $order->totalPrice }}</td>
                    <td>
                        <ul>
                            @forelse($order->products as $product)
                                <li>{{ $product->name }} x {{ $product->quantityInOrder }}</li>
                            @empty
                                <li>No products</li>
                            @endforelse
                        </ul>
                    </td>
                    <td>{{ trans('order.statuses.' . $order->statusName) }}</td>
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="5">No have order yet!</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr class="text-center">
                <td colspan="5">{{ $orders->links() }}</td>
            </tr>
        </tfoot>
    </table>
@endsection