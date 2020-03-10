<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vendor
 * @package App\Models
 */
class Vendor extends Model
{
    /**
     * Fields model
     * @var array
     */
    protected $fillable = [
        'name',
        'email'
    ];
}
