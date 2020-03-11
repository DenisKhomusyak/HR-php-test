<?php

namespace App\Models\Order;

use App\Models\Partner\Partner;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

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
    public const STATUS_CONFIRMED = 10;
    public const STATUS_DONE = 20;

    /**
     * Array of statuses
     */
    public const STATUSES = [
      self::STATUS_NEW => 'new',
      self::STATUS_CONFIRMED => 'confirmed',
      self::STATUS_DONE => 'done',
    ];

    /**
     * @return string|null
     */
    public function getStatusNameAttribute() : ?string
    {
        return array_key_exists($this->status, self::STATUSES) ? self::STATUSES[$this->status] : 'unkhown';
    }

    /**
     * Get name of partner
     * @return string
     */
    public function getPartnerNameAttribute() : string
    {
        return $this->partner->name ?? '';
    }

    /**
     * Get total price of products
     * @return int
     */
    public function getTotalPriceAttribute() : int
    {
        return $this->getTotalPrice();
    }

    /**
     * Calculate total price
     * @return int
     */
    public function getTotalPrice() : int
    {
        return $this->products->sum( function ($product) {
            return $product->pivot->price * $product->pivot->quantity;
        });
    }

    /**
     * Get all statuses
     * @return array
     */
    public static function getStatuses()
    {
        return self::STATUSES;
    }

    /**
     * Partner relationship
     * @return BelongsTo
     */
    public function partner() : BelongsTo
    {
        return $this->belongsTo(Partner::class, 'partner_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function products() : BelongsToMany
    {
//        return $this->hasManyThrough(Product::class, OrderProduct::class,
//            'order_id', 'id', 'id', 'product_id');
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id')
            ->withPivot(['quantity', 'price'])
            ->orderBy('created_at')
            ->withTimestamps();
    }
}
