<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Article;
use App\Author;
use App\Tag;


class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $authorsList = [
            'Marco Travaglio',
            'Francesco Costa',
            'Selvaggia Lucarelli',
            'Giovanni Floris',
            'Lili Gruber',
            'Michele Santoro',
            'Corrado Formigli',
            'Giuliano Ferrara'
        ];

        $listOfAuthorID = [];

        foreach ($authorsList as $author) {
            // $randIndex = array_rand($authorsList, 1);
            // $randAuthor = $authorsList[$randIndex];

            $authorObject = new Author();
            $authorObject->name = $author;
            $authorObject->author_pic = $faker->imageUrl(360, 360);
            $authorObject->email = $faker->email();

            $authorObject->save();
            $listOfAuthorID[] = $authorObject->id;
        }


        for ($i = 0; $i < 100; $i++) {
            // $randIndex = array_rand($categoryList, 1);
            // $randGenre = $categoryList[$randIndex];

            $article = new Article();
            $article->title = $faker->sentence();
            $article->main = $faker->paragraph(8);
            $article->picture = $faker->imageUrl(360, 360);

            $authorID = array_rand(array_flip($listOfAuthorID), 1);
            $article->author_id = $authorID;

            $article->save();
        }

        $tagList = [
            'sport',
            'opinione',
            'cinema',
            'calcio',
            'Italia',
            'Europa',
            'Usa',
            'moda',
            'cronaca',
            'vip',
            'spettacolo'
        ];

        foreach ($tagList as $tag) {
            $tagObj = new Tag();
            $tagObj->name = $tag;
            $tagObj->save();
        }
    }
}
