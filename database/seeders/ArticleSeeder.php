<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Batch;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = 5;
        $batch_prefix = "-21.50.01.0";

        //Artikel codes
        $prefixes = [
            "BRA-FR-",
            "ALT-FR-",
            "FLI-FR-",
            "FAV-FR-",
            "SOS-FR-",
            "FLA-FR-",
            "FUR-FR-",
            "HAD-FR-",
            "FLN-FR-",
        ];

        foreach ($prefixes as $prefix) {
            for ($i = 1; $i <= $count; $i++) {
                $code = $prefix . $i;


                //Artikel aanmaken
                $article = Article::create([
                    "code" => $code,
                ]);






                //Per artikel, tussen 1 en 5 batches
                $batch_count = rand(1,5);

                for($j=1; $j<=$batch_count; $j++){
                    Batch::create([
                        "article_id" => $article->id,
                        "code" => $code . $batch_prefix . $j,
                        'quantity' => rand(1,100000),
                    ]);
                }
            }
        }

    }
}
