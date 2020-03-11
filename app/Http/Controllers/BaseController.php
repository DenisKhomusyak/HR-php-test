<?php

namespace App\Http\Controllers;

use App\Repository\AbstractCrudRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class BaseController
 * @package App\Http\Controllers
 */
class BaseController extends Controller
{
    /**
     * @var AbstractCrudRepository
     */
    public $repository;

    /**
     * Folder views
     * @var string $viewPath
     */
    protected $viewPath = '';

    /**
     * BaseController constructor.
     * @param AbstractCrudRepository $repository
     */
    public function __construct(AbstractCrudRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $view
     * @param array $data
     * @return View
     */
    protected function render(string $view, array $data = []) : View
    {
        return view('frontend.' . $this->viewPath . '.' . $view, $data);
    }
}
