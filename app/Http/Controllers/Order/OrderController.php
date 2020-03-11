<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\BaseController;
use App\Repository\OrderRepository;
use Illuminate\Http\Request;

/**
 * Class OrderController
 * @package App\Http\Controllers\Order
 */
class OrderController extends BaseController
{
    /**
     * @var string
     */
    public $viewPath = 'order';

    /**
     * OrderController constructor.
     * @param OrderRepository $repository
     */
    public function __construct(OrderRepository $repository)
    {
        parent::__construct($repository);
    }

    public function index(Request $request)
    {
        $orders = $this->repository->all($request->all());

        return $this->render('index', compact('orders'));
    }
}
