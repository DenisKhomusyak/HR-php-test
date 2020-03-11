<?php

namespace App\Observers;

use App\Events\Order\OrderDoneEvent;
use App\Models\Order\Order;

/**
 * Class OrderObserver
 * @package App\Observers
 */
class OrderObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  Order $order
     * @return void
     */
    public function updated(Order $order)
    {
        if ($order->isDirty(['status']) && $order->isDone()) {
            event(new OrderDoneEvent($order));
        }
    }
}