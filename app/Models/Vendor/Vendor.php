<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Class Vendor
 * @package App\Models
 */
class Vendor extends Model
{
    use Notifiable;

    /**
     * Fields model
     * @var array
     */
    protected $fillable = [
        'name',
        'email'
    ];
}
