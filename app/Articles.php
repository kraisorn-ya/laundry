<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Articles extends Model
{
    use Notifiable;
    protected $table = 'articles';
    protected $fillable = [
        'admin_id',
        'articles_category_id',
        'title',
        'description',
        'short_description',
        'image',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function articles_category()
    {
        return $this->belongsTo(ArticlesCategory::class);
    }
}
