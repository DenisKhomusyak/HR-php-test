<?php

namespace App\Models\Order;

use App\Models\Partner\Partner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Order
 * @package App\Models
 */
class Order extends Model
{
    /**
     * Fields model
     * @var array
     */
    protected $fillable = [
        'status',
        'client_email',
        'partner_id',
        'delivery_dt',
    ];

    /**
     * Dates casts
     * @var array
     */
    protected $dates = [
        'delivery_dt'
    ];

    public const STATUS_NEW = 0;
    public const STATUS_DELIVERY = 10;
    public const STATUS_DONE = 20;

    /**
     * Array of statuses
     */
    public const STATUSES = [
      self::STATUS_NEW,
      self::STATUS_DELIVERY,
      self::STATUS_DONE,
    ];

    /**
     * Partner relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner() : BelongsTo
    {
        return $this->belongsTo(Partner::class, 'partner_id', 'id');
    }
}
