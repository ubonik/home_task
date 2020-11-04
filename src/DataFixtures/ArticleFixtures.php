<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Tag;
use App\Homework\CommentContentProviderInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends BaseFixtures  implements DependentFixtureInterface
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

    private $commentContent;

    public function __construct(CommentContentProviderInterface $commentContent)
    {
        $this->commentContent = $commentContent;
    }


    public function loadData(ObjectManager $manager)
    {
        $this->createMany(Article::class, 10, function (Article $article) use($manager) {
            $article
                ->setTitle($this->faker->randomElement(self::$articleTitles))
                ->setDescription($this->faker->text(100))
                ->setBody($this->commentContent->get(
                    $this->faker->numberBetween(0, 9) > 2 ? $this->faker->word : '',
                    $this->faker->numberBetween(1, 5) ? : 0
                ))
                ->setAuthor($this->faker->randomElement(self::$articleAuthors))
                ->setKeywords(join(', ', $this->faker->words($this->faker->numberBetween(2,10))))
                ->setVotecount($this->faker->numberBetween(1, 10))
                ->setImageFilename($this->faker->randomElement(self::$articleImages));

            if ($this->faker->boolean(60)) {
                $article->setPublishedAt($this->faker->dateTimeBetween('-100 days', '-1 deys'));
            }

            /** @var Tag[] $tags  */
            $tags = [];
            for ($i = 0; $i < $this->faker->numberBetween(0, 5); $i++) {
                $tags[] = $this->getRandomReference(Tag::class);
            }
            foreach ($tags as $tag) {
                $article->addTag($tag);
            }

        });
    }

    public function getDependencies()
    {
        return [
            TagFixtures::class,
        ];
    }

}
