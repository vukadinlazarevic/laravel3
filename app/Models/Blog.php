<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'naslov',
        'sadrzaj',
    ];

    public function komentari() {
        return $this->hasMany(Komentar::class);
    }
}
