<?php

    namespace App\Controller;
    use App\Homework\ArticleContentProviderInterface;
    use App\Service\MarkdownParser;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
           return $this->render('index.html.twig', ['articles' => $this->articles]);
        }


        /**
         * @Route("/articles/{slug}", name = "app_article_show")
         */
        public function show($slug, MarkdownParser $markdownParser, ArticleContentProviderInterface $articleContentProvider)
        {
            /**
             * foreach для вывода данных в статью для тестирования
             */
            $var = null;

            foreach($this->articles as $key => $article){

                if($slug == $key){

                    $var = $key;
                }
            }
            /**
             * выбор случайного слова $word из массива $words
             */
            $words = ['кофе', 'молоко', 'чай', 'сок', 'вода', 'какао', 'пепси'];

            $num = rand(1, 10);
            $word = ($num <= 7) ? $words[array_rand($words)] : null;

            $wordsCount = ($num <= 7) ? rand(5, 30) : 0;

            $articleContent = $articleContentProvider->get(rand(2, 10),  $word, $wordsCount);

            $articleContent = $markdownParser->parse($articleContent);

            return $this->render('articles/detail.html.twig',['article' => $this->articles[$var],
                 'articleContent' => $articleContent]);

        }

    }
