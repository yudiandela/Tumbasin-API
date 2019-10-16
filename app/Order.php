<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Data yang tidak di perbolehkan masuk ke dalam database
     * melalui form inputan dengan eloquent
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the product that owns the order.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Mengubah data status ke dalam text
     *
     * 0 - CANCEL
     * 1 - PROSES
     * 2 - ONGOING
     * 3 - DELIVERY
     * 4 - COMPLETE
     */
    public function getStatusOrderAttribute()
    {
        switch ($this->status) {
            case 0:
                $status = '<span class="badge badge-danger">CANCEL</span>';
                break;

            case 1:
                $status = '<span class="badge badge-info">PROSES</span>';
                break;

            case 2:
                $status = '<span class="badge badge-primary">ONGOING</span>';
                break;

            case 3:
                $status = '<span class="badge badge-warning">DELIVERY</span>';
                break;

            case 4:
                $status = '<span class="badge badge-success">COMPLETE</span>';
                break;

            default:
                $status = null;
                break;
        }

        return $status;
    }

    public function getCreateDateAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d, M Y H:i');
    }
}
