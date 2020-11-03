<?php

    namespace App\Controller;
    use App\Homework\ArticleContentProviderInterface;
    use App\Repository\ArticleRepository;
    use App\Repository\CommentRepository;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    class ArticleController extends AbstractController
    {
         /**
         * @Route("/", name = "app_homepage")
         */
        public function homepage(ArticleRepository $articleRepository, CommentRepository $commentRepository)
        {
            $articles = $articleRepository->findLatestPublished();
            $latestComments = $commentRepository->findBy([], [], 3);

            return $this->render('/article/homepage.html.twig', ['articles' => $articles, 'latestComments' => $latestComments]);

        }

        /**
         * @Route("/article/{slug}", name = "app_article_show")
         */
        public function show($slug, ArticleRepository $articleRepository)
        {
            $article = $articleRepository->findOneBy(['slug' => $slug]);
            //dd($article->getTags());

            return $this->render('article/detail.html.twig', ['article' => $article]) ;
        }

        /**
         * @Route("/articles/article_content")
         */
        public function showArticle(Request $request, ArticleContentProviderInterface $contentProvider)
        {
            $paragrafs = $request->query->get('paragrafs');
            $word = $request->query->get('word');
            $count = $request->query->get('count');

            $content = $contentProvider->get($paragrafs, $word,  $count);

            return $this->render('articles/article_content/index.html.twig', ['content' => $content]);
        }

    }
