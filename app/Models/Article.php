<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        "code"
    ];

    public static function boot()
    {
        parent::boot();

        static::updating(function ($article) {
            if($article->isDirty("code")){ // Als artikel code word veranderd moet ook de code in de batch aangepast worden.
                $original = $article->getOriginal("code");
                $article->load("batches");

                foreach($article->batches as $batch){
                    $new = str_replace($original, $article->code, $batch->code); //Replace het oude article code stukje met het nieuwe.
                    $batch->update(["code" => $new]);
                }
            }
        });

        static::deleting(function ($article) {
            foreach($article->batches as $batch){
                $batch->delete();
            }
        });
    }

    //relations
    public function batches(){
        return $this->hasMany(Batch::class);
    }

    public static function getNextArticleID(){
        $last = Article::orderBy('id', 'desc')->first();

        if(!$last){
            $id = 1;
        }else{
            $id = $last->id + 1;
        }

        return $id;
    }
}
