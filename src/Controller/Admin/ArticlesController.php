<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Homework\ArticleContentProviderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends AbstractController
{

    /**
     * @Route("/admin/articles/create", name="app_admin_articles_create")
     */
    public function create(EntityManagerInterface $em, ArticleContentProviderInterface $articleContentProvider)
    {
        /**
         * выбор случайного слова $word из массива $words
         */

        $words = ['кофе', 'молоко', 'чай', 'сок', 'вода', 'какао', 'пепси'];

        $num = rand(1, 10);
        $word = ($num <= 7) ? $words[array_rand($words)] : null;

        $wordsCount = ($num <= 7) ? rand(5, 30) : 0;

        $articleContent = $articleContentProvider->get(rand(2, 10), $word, $wordsCount);


        $article = new Article();
        $article
            ->setTitle('Есть ли жизнь после девятой жизни?')
            ->setSlug('is-there-life-after--the-ninth-life-' . rand(100, 999))
            ->setDescription('ut labore et dolore magna aliqua.
            Purus viverra accumsan in nisl.')
            ->setBody($articleContent)
            ->setAuthor('Хэтээмэль Цеэсесович')
            ->setKeywords('tempor, incididunt, ipsum, sed')
            ->setVotecount(rand(-100, 100))
            ->setImageFilename('article-3.jpg');

        if (rand(1, 10) > 4) {
            $article->setPublishedAt(new \DateTime(sprintf('- %d days', rand(0, 50))));
               }

            $em->persist($article);
            $em->flush();

            return new Response(sprintf('Создана статья id: %d, slug: %s', $article->getId(), $article->getSlug()));
        }
}
