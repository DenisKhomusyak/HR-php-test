<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\BaseController;
use App\Repository\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

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

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request) : View
    {
        $orders = $this->repository
            ->with(['partner', 'products'])
            ->all($request->all());

        return $this->render('index', compact('orders'));
    }
}
