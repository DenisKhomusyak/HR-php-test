<?php

namespace App\Events\Order;

use App\Models\Order\Order;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

/**
 * Class OrderUpdated
 * @package App\Events\Order
 */
class OrderDoneEvent
{
    use Dispatchable, SerializesModels;

    /**
     * @var Order
     */
    public $order;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }
}
