<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ArticlesCategory extends Model
{
    use Notifiable;
    protected $table = 'articles_categories';
    protected $fillable = [
        'name',
    ];

    public function articles()
    {
        return $this->hasMany(Articles::class);
    }

//    public function promotion()
//    {
//        return $this->hasMany(Promotion::class);
//    }
}
