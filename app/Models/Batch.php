<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = [
        "article_id",
        "code",
        "quantity",
    ];

    //relations
    public function article(){
        return $this->hasOne(Article::class);
    }
}
