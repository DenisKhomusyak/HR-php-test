<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Product\ProductFilterRequest;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers\Product
 */
class ProductController extends BaseController
{
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
    public function index(ProductFilterRequest $request)
    {
        $products = $this->repository
            ->with(['vendor'])
            ->all($request->validated());

        return $this->render('index', compact('products'));
    }
}
