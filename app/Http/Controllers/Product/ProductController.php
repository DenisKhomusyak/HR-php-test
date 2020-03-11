<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Traits\ResponseTrait;
use App\Http\Requests\Product\ProductFilterRequest;
use App\Http\Requests\Product\ProductPriceUpdateRequest;
use App\Http\Requests\Traits\JsonResponse;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class ProductController
 * @package App\Http\Controllers\Product
 */
class ProductController extends BaseController
{
    use ResponseTrait;

    /**
     * @var string
     */
    public $viewPath = 'product';

    /**
     * ProductController constructor.
     * @param ProductRepository $repository
     */
    public function __construct(ProductRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param ProductFilterRequest $request
     * @return \Illuminate\View\View
     */
    public function index(ProductFilterRequest $request) : View
    {
        $products = $this->repository
            ->with(['vendor'])
            ->all($request->validated());

        return $this->render('index', compact('products'));
    }

    /**
     * @param ProductPriceUpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePrice(ProductPriceUpdateRequest $request) : \Illuminate\Http\JsonResponse
    {
        $this->repository->update($request->product_id, ['price' => $request->price]);

        return $this->actionSuccess(['message' => 'Product price has been updated!']);
    }
}
