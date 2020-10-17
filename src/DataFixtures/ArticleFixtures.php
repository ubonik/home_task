<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends BaseFixtures
{
    private static $articleTitles = [
        'Есть ли жизнь после девятой жизни?',
        'Когда в машинах поставят лоток?',
        'В погоне за красной точкой',
        'В чем смысл жизни сосисок',
    ];

    private static $articleAuthors = [
        'Николай',
        'Mr. White',
        'Барон Сосискин',
        'Сметанка',
        'Рыжик',
    ];

    private static $articleImages = [
        'article-1.jpeg',
        'article-2.jpeg',
        'article-3.jpeg',
    ];

    public function loadData(ObjectManager $manager)
    {
        $this->createMany(Article::class, 10, function (Article $article) {
            $article
                ->setTitle($this->faker->randomElement(self::$articleTitles))
                ->setDescription('ut labore et dolore magna aliqua.
                    Purus viverra accumsan in nisl.')
                ->setBody("Lorem ipsum кофе dolor sit amet, consectetur adipiscing elit, sed
            do eiusmod tempor incididunt [Фронтенд Абсолютович](/) ut labore et dolore magna aliqua.
            Purus viverra accumsan in nisl. Diam `vulputate` ut pharetra sit amet aliquam. Faucibus a
            pellentesque sit amet porttitor eget dolor morbi non. Est ultricies integer quis auctor кофе
            elit sed. Tristique nulla aliquet enim tortor at. Tristique et egestas quis ipsum. Consequat semper viverra nam
            libero. Lectus quam id leo in vitae turpis. In eu mi bibendum neque egestas congue
            quisque egestas diam. кофе blandit turpis cursus in hac habitasse platea dictumst quisque.")
                ->setAuthor($this->faker->randomElement(self::$articleAuthors))
                ->setKeywords('tempor, incididunt, ipsum, sed')
                ->setVotecount($this->faker->numberBetween(0, 10))
                ->setImageFilename($this->faker->randomElement(self::$articleImages));

            if ($this->faker->boolean(60)) {
                $article->setPublishedAt($this->faker->dateTimeBetween('-100 days', '-1 deys'));
            }
        });
    }

}
