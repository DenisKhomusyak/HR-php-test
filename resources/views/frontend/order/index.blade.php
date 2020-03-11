@extends('layouts.frontend')
@section('content')

    <ul class="nav nav-tabs">
        <li>
            <a href="{{route('order.index')}}"
               class="nav-link @if(Request::has('type') === false) active @endif">
                All
            </a>
        </li>
        <li>
            <a href="{{route('order.index', ['type' => 'past'])}}"
               class="nav-link @if(Request::get('type') === 'past') active @endif">
                Past
            </a>
        </li>
        <li>
            <a href="{{route('order.index', ['type' => 'current'])}}"
               class="nav-link @if(Request::get('type') === 'current') active @endif">
                Current
            </a>
        </li>
        <li>
            <a href="{{route('order.index', ['type' => 'new'])}}"
               class="nav-link @if(Request::get('type') === 'new') active @endif">
                New
            </a>
        </li>
        <li>
            <a href="{{route('order.index', ['type' => 'done'])}}"
               class="nav-link @if(Request::get('type') === 'done') active @endif">
                Done
            </a>
        </li>
    </ul>
    <div class="ibox-content">
        <div class="tab-content">
{{--                    @includeIf('frontend.address.includes._' . $view_page)--}}
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr class="thead-dark">
                <th scope="col">ID</th>
                <th scope="col">Partner</th>
                <th scope="col">Price</th>
                <th scope="col">Order</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->partnerName }}</td>
                    <td>{{ $order->totalPrice }}</td>
                    <td>
                        @include('frontend.order.include.table.order_products', ['orderProducts' => $order->products])
                    </td>
                    <td>{{ trans('order.statuses.' . $order->statusName) }}</td>
                    <td>
                        <a href="{{route('order.edit', $order)}}" class="btn btn-warning">
                            Edit
                        </a>
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
                {{-- SO BAD --}}
                @if (($orders instanceof \Illuminate\Support\Collection) === false)
                    <td colspan="5">{{ $orders->links()  }}</td>
                @endif
            </tr>
        </tfoot>
    </table>
@endsection