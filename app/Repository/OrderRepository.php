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
}