<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrlShortened extends Model
{
    protected $table = 'url_shortened';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
