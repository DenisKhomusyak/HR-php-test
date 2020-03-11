<?php

namespace App\Listeners\Order;

use App\Events\Order\OrderDoneEvent;
use App\Models\Order\Order;
use App\Notifications\Order\OrderDoneNotification;
use Illuminate\Support\Facades\Notification;

/**
 * Class OrderDoneListener
 * @package App\Listeners
 */
class SendOrderDoneNotification
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $order = $event->order;
        $order->load('partner', 'products.vendor');

        $notified = collect();
        $notified->push($order->partner);

        $order->products->map(function ($product) use ($notified) {
            $notified->push($product->vendor);
        });

        Notification::send($notified, new OrderDoneNotification($order));
    }
}
