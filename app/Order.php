<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'admin_id',
        'promotion_id',
        'total_price',
        'total_price_discount',
        'total_qty',
        'order_status',
        'address',
        'pay',
        'image',
        'pay_status',
        'date_completed',
        'send_status',
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
