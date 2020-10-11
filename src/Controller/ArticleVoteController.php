<?php

namespace App\Controller;
use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleVoteController extends AbstractController
{
    /**
     * @Route("/articles/{slug}/vote/up", name="article_vote_up", methods="POST")
     */
    public function up($slug, Article $article, EntityManagerInterface $em)
    {
        $article->setVoteCount($article->getVoteCount() + 1);
        $em->flush();
        return $this->json(['votes' => $article->getVoteCount()]);
    }

    /**
     * @Route("/articles/{slug}/vote/down", name="article_vote_down", methods="POST")
     */
    public function down($slug, Article $article, EntityManagerInterface $em)
    {
        $article->setVoteCount($article->getVoteCount() - 1);
        $em->flush();
        return $this->json(['votes' => $article->getVoteCount()]);
    }
}
