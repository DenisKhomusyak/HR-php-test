<?php

namespace App\Models\Partner;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Class Partner
 * @package App\Models
 */
class Partner extends Model
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
