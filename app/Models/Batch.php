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
        return $this->belongsTo(Article::class);
    }

    public static function getNextBatchID(){
        $last = Batch::orderBy('id', 'desc')->first();

        if(!$last){
            $id = 1;
        }else{
            $id = $last->id + 1;
        }

        return $id;
    }
}
