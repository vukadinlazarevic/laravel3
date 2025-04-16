<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{

    protected $fillable = [
        'komentar',
        'blog_id',
    ];

    public function blog() {
        return $this->belongsTo(Blog::class);
    }
}
