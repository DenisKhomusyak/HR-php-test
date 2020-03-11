Заказ № {{ $order->id }} завершен <br>
{{ $order->products->pluck('name')->implode(', ') }}, {{ $order->totalPrice }}
