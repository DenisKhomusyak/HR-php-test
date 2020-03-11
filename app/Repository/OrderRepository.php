<?php


namespace App\Repository;

use App\Models\Order\Order;

/**
 * Class OrderRepository
 * @package App\Repository
 */
class OrderRepository extends AbstractCrudRepository
{
    /**
     * OrderRepository constructor.
     * @param Order $model
     */
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all(array $data = [])
    {
        if (isset($data['type'])) {
            $this->query->ofType($data['type']);
        }

        if ($this->query->getQuery()->limit) {
            $data['count'] = -1;
        }

        return parent::all($data); // TODO: Change the autogenerated stub
    }
}