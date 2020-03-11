<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Order\OrderUpdateRequest;
use App\Models\Order\Order;
use App\Repository\OrderRepository;
use App\Repository\PartnerRepository;
use Illuminate\Http\RedirectResponse;
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

    /**
     * @param int $id
     * @param PartnerRepository $repositoryPartner
     * @return View
     */
    public function edit(int $id, PartnerRepository $repositoryPartner) : View
    {
        $order = $this->repository->with(['partner'])->get($id);
        $statusesArray = Order::getStatuses();
        $partnersArray = $repositoryPartner->all(['count' => -1])
            ->pluck('name', 'id')
            ->toArray();

        return $this->render('edit', compact('order', 'statusesArray', 'partnersArray'));
    }

    /**
     * @param OrderUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(OrderUpdateRequest $request, int $id) : RedirectResponse
    {
        return redirect()->route('order.edit', $this->repository->update($id, $request->validated()));
    }
}
