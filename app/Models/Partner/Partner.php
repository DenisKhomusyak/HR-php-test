<?php

namespace App\Models\Partner;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Partner
 * @package App\Models
 */
class Partner extends Model
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
