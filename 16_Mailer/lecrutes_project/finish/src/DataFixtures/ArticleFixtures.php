<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Tag;
use App\Entity\User;
use App\Service\FileUploader;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ArticleFixtures extends BaseFixtures implements DependentFixtureInterface
{
    private static $articleTitles = [
        'Есть ли жизнь после девятой жизни?',
        'Когда в машинах поставят лоток?',
        'В погоне за красной точкой',
        'В чем смысл жизни сосисок',
    ];

    private static $articleImages = [
        'car1.jpg',
        'car2.jpg',
        'car3.jpeg',
    ];

    /**
     * @var FileUploader
     */
    private $articleFileUploader;

    public function __construct(FileUploader $articleFileUploader)
    {
        $this->articleFileUploader = $articleFileUploader;
    }

    public function loadData(ObjectManager $manager)
    {
        $this->createMany(Article::class, 10, function (Article $article) use ($manager) {
            $article
                ->setTitle($this->faker->randomElement(self::$articleTitles))
                ->setBody('Lorem ipsum **красная точка** dolor sit amet, consectetur adipiscing elit, sed
do eiusmod tempor incididunt [Сметанка](/) ut labore et dolore magna aliqua
' . $this->faker->paragraphs($this->faker->numberBetween(2, 5), true))
            ;

            if ($this->faker->boolean(60)) {
                $article->setPublishedAt($this->faker->dateTimeBetween('-10 days', '-1 days'));
            }
            
            $fileName = $this->faker->randomElement(self::$articleImages);

            $article
                ->setAuthor($this->getRandomReference(User::class))
                ->setLikeCount($this->faker->numberBetween(0, 10))
                ->setImageFilename(
                    $this->articleFileUploader->uploadFile(new File(dirname(dirname(__DIR__)) . '/public/images/' . $fileName))
                )
            ;
            
            /** @var Tag $tags */
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
            UserFixtures::class,
        ];
    }
}
