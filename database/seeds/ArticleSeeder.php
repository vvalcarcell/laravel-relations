<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Article;
use App\Author;


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
            $randIndex = array_rand($authorsList, 1);
            $randAuthor = $authorsList[$randIndex];

            $author = new Author();
            $author->name = $randAuthor;
            $author->author_pic = $faker->imageUrl(360, 360);
            $author->email = $faker->email();

            $author->save();
            $listOfAuthorID[] = $author->id;
        }

        $categoryList = [
            'cronaca',
            'sport',
            'opinione',
            'musica',
            'cinema',
            'moda'
        ];

        for ($i = 0; $i < 50; $i++) {
            $randIndex = array_rand($categoryList, 1);
            $randGenre = $categoryList[$randIndex];

            $article = new Article();
            $article->title = $faker->sentence();
            $article->genere = $randGenre;
            $article->main = $faker->paragraph(8);
            $article->picture = $faker->imageUrl(360, 360);

            $article->save();
        }
    }
}
