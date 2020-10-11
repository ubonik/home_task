<?php

    namespace App\Controller;
    use App\Homework\ArticleContentProviderInterface;
    use App\Repository\ArticleRepository;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    class ArticleController extends AbstractController
    {
         /**
         * @Route("/", name = "app_homepage")
         */
        public function homepage(ArticleRepository $repository)
        {
            $articles = $repository->findLatestPublished();
            foreach ($articles as $article) {
                if (!empty($article->getKeywords())) {
                    $keywords = explode(',', $article->getKeywords());
                }
            }
            return $this->render('/article/homepage.html.twig', ['articles' => $articles,'keywords' => $keywords ]);
        }

        /**
         * @Route("/article/{slug}", name = "app_article_show")
         */
        public function show($slug, ArticleContentProviderInterface $articleContentProvider, ArticleRepository $repository)
        {
            $article = $repository->findOneBy(['slug' => $slug]);
            if (!$article) {
                throw $this->createNotFoundException(sprintf('статья: %s не найдена', $slug));
            }

            $keywords = explode(',', $article->getKeywords());

                return $this->render('article/detail.html.twig', ['article' => $article, 'keywords' => $keywords]) ;
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
