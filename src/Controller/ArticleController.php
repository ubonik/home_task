<?php

    namespace App\Controller;
    use App\Homework\ArticleContentProviderInterface;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;

    class ArticleController extends AbstractController
    {
        protected $articles = [
            ['title' => 'Что делать, если надо верстать?', 'image' => 'images/article-2.jpeg',
                'author' => 'Хэтээмэль Цеэсесович', 'clock' => '3 дня назад', 'comment' => 5,
                'src' => 'https://robohash.org/хэтээмэль_цеэсесович.png?set=set3',
                'badgies' => ['Html', 'Css']
            ],

            ['title' => 'Facebook ест твои данные', 'image' => 'images/article-1.jpeg',
                'author' => 'Not Facebook', 'clock' => '26 дней назад', 'comment' => 0,
                'src' => 'https://robohash.org/not_facebook.png?set=set3',
                'badgies' => ['Facebook']
            ],

            ['title' => 'Когда пролил кофе на клавиатуру', 'image' => 'images/article-3.jpg',
                'author' => 'Поливайкин', 'clock' => '1 месяц назад', 'comment' => 300,
                'src' => 'https://robohash.org/поливайкин.png?set=set3',
                'badgies' => ['Балбес', 'Криворучка', 'Рукопоп']
            ],
            ['title' => 'Что делать, если надо верстать?', 'image' => 'images/article-2.jpeg',
                'author' => 'Хэтээмэль Цеэсесович', 'clock' => '3 дня назад', 'comment' => 5,
                'src' => 'https://robohash.org/хэтээмэль_цеэсесович.png?set=set3',
                'badgies' => ['Html', 'Css']
            ],
            ['title' => 'Когда пролил кофе на клавиатуру', 'image' => 'images/article-3.jpg',
                'author' => 'Поливайкин', 'clock' => '1 месяц назад', 'comment' => 300,
                'src' => 'https://robohash.org/поливайкин.png?set=set3',
                'badgies' => ['Балбес', 'Криворучка', 'Рукопоп']
            ]
        ];

        /**
         * @Route("/", name = "app_homepage")
         */
        public function homepage()
        {
            return $this->render('/article/homepage.html.twig', ['articles' => $this->articles]);
        }

        /**
         * @Route("/article/{slug}", name = "app_article_show")
         */
        public function show($slug, ArticleContentProviderInterface $articleContentProvider)
        {

            if (isset($this->articles[$slug])) {

                /**
                 * выбор случайного слова $word из массива $words
                 */
                $words = ['кофе', 'молоко', 'чай', 'сок', 'вода', 'какао', 'пепси'];

                $num = rand(1, 10);
                $word = ($num <= 7) ? $words[array_rand($words)] : null;

                $wordsCount = ($num <= 7) ? rand(5, 30) : 0;

                $articleContent = $articleContentProvider->get(rand(2, 10), $word, $wordsCount);

                return $this->render('article/detail.html.twig', ['article' => $this->articles[$slug],
                    'articleContent' => $articleContent]);

            }
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
