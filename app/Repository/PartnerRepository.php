<?php


namespace App\Repository;

use App\Models\Partner\Partner;

/**
 * Class PartnerRepository
 * @package App\Repository
 */
class PartnerRepository extends AbstractCrudRepository
{
    /**
     * PartnerRepository constructor.
     * @param Partner $model
     */
    public function __construct(Partner $model)
    {
        parent::__construct($model);
    }
}