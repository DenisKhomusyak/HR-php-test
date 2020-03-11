<?php


namespace App\Repository;

use App\Models\Product\Product;

/**
 * Class ProductRepository
 * @package App\Repository
 */
class ProductRepository extends AbstractCrudRepository
{
    /**
     * ProductRepository constructor.
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all(array $data = [])
    {
        if (isset($data['sort'])) {
            $this->query->orderBy($data['sort']['column'], $data['sort']['type']);
        }

        return parent::all($data);
    }
}