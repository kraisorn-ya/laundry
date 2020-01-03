<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Promotion extends Model
{
    use Notifiable;
    protected $table = 'promotions';
    protected $fillable = [
        'admin_id',
        'title',
        'description',
        'start_date',
        'end_date',
        'articles_category_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

//    public function articles_category()
//    {
//        return $this->belongsTo(ArticlesCategory::class);
//    }
}
