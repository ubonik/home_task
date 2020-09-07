<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage ()
    {
        return $this->render("index.html.twig");
    }

    /**
     * @Route("/detail.html.twig", name="app_article_show")
     */
    public function show()
    {
        return $this->render("detail.html.twig");
    }

}