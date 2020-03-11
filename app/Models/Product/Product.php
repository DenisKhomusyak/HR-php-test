<?php

namespace App\Models\Product;

use App\Models\Vendor\Vendor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Product
 * @package App\Models
 */
class Product extends Model
{
    /**
     * Fields model
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'vendor_id'
    ];

    /**
     * Columns has may by ordered
     * @var array
     */
    protected static $sortColumns = [
        'name'
    ];

    /**
     * Quantity products in current Order
     * @return int
     */
    public function getQuantityInOrderAttribute() : int
    {
        return $this->pivot->quantity ?? 0;
    }

    /**
     * Get vendor name
     * @return string
     */
    public function getVendorNameAttribute() : string
    {
        return $this->vendor->name ?? '';
    }

    public static function getSortColumns()
    {
        return self::$sortColumns;
    }

    /**
     * Vendor relationship
     * @return BelongsTo
     */
    public function vendor() : BelongsTo
    {
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
    }
}
