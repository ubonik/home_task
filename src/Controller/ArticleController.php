<?php

    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;

    class ArticleController extends AbstractController
    {
    protected $articles = [
        ['title' => 'Что делать, если надо верстать?', 'image' => 'images/article-2.jpeg',
        'author' =>'Хэтээмэль Цеэсесович','clock' =>'3 дня назад','comment'=> 5,
        'src' => 'https://robohash.org/хэтээмэль_цеэсесович.png?set=set3',
        'badgies' => ['Html','Css']
          ],

        ['title' => 'Facebook ест твои данные', 'image' => 'images/article-1.jpeg',
        'author' =>'Not Facebook','clock' =>'26 дней назад', 'comment'=> 0,
        'src' => 'https://robohash.org/not_facebook.png?set=set3',
        'badgies' => ['Facebook']
          ],

        ['title' => 'Когда пролил кофе на клавиатуру', 'image' => 'images/article-3.jpg',
        'author' =>'Поливайкин','clock' =>'1 месяц назад',  'comment'=>300,
        'src' => 'https://robohash.org/поливайкин.png?set=set3',
        'badgies' => ['Балбес','Криворучка','Рукопоп']
          ],
        ['title' => 'Что делать, если надо верстать?', 'image' => 'images/article-2.jpeg',
        'author' =>'Хэтээмэль Цеэсесович','clock' =>'3 дня назад','comment'=> 5,
        'src' => 'https://robohash.org/хэтээмэль_цеэсесович.png?set=set3',
        'badgies' => ['Html','Css']
          ],
        ['title' => 'Когда пролил кофе на клавиатуру', 'image' => 'images/article-3.jpg',
        'author' =>'Поливайкин','clock' =>'1 месяц назад',  'comment'=>300,
        'src' => 'https://robohash.org/поливайкин.png?set=set3',
        'badgies' => ['Балбес','Криворучка','Рукопоп']
          ]
      ];

    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage ()
    {
        return $this->render("index.html.twig", ['articles'=>$this->articles]);
    }

    /**
     * @Route("/detail.html.twig", name="app_article_show")
     */
    public function show()
    {
        $article = $this->articles[2];
        $article['src'] = "https://robohash.org/флекс_абсолютович.jpg?set=set3";
        $article['author'] = 'Флекс Абсолютович';

        return $this->render("detail.html.twig", ['article'=>$article]);
    }

}