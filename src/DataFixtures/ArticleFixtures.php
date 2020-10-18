<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Homework\ArticleContentProviderInterface;
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

    /**
     * @var ArticleContentProviderInterface
     */
    private $articleContent;

    public function __construct(ArticleContentProviderInterface $articleContent)
    {
        $this->articleContent = $articleContent;
    }

    public function loadData(ObjectManager $manager)
    {
        $this->createMany(Article::class, 10, function (Article $article) {
            $article
                ->setTitle($this->faker->randomElement(self::$articleTitles))
                ->setDescription($this->faker->text(100))
                ->setBody($this->articleContent->get(
                    $this->faker->numberBetween(2, 10),
                    $this->faker->numberBetween(0, 9) > 2 ? $this->faker->word : '',
                    $this->faker->numberBetween(5, 10)
                ))
                ->setAuthor($this->faker->randomElement(self::$articleAuthors))
                ->setKeywords(join(', ', $this->faker->words($this->faker->numberBetween(2,10))))
                ->setVotecount($this->faker->numberBetween(0, 10))
                ->setImageFilename($this->faker->randomElement(self::$articleImages));

            if ($this->faker->boolean(60)) {
                $article->setPublishedAt($this->faker->dateTimeBetween('-100 days', '-1 deys'));
            }
        });
    }

}
