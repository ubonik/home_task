<?php

namespace App\Homework;

class ArticleContentProvider implements ArticleContentProviderInterface
{
    private $markArticleWordsWithBold;

    public function __construct(bool $markArticleWordsWithBold)
    {
        $this->markArticleWordsWithBold = $markArticleWordsWithBold;
    }

    public function get(int $paragraphs, string $word = null, int $wordsCount = 0): string
    {

        $text = [
           "Lorem ipsum кофе dolor sit amet, consectetur adipiscing elit, sed
            do eiusmod tempor incididunt [Фронтенд Абсолютович](/) ut labore et dolore magna aliqua.
            Purus viverra accumsan in nisl. Diam `vulputate` ut pharetra sit amet aliquam. Faucibus a
            pellentesque sit amet porttitor eget dolor morbi non. Est ultricies integer quis auctor кофе
            elit sed. Tristique nulla aliquet enim tortor at. Tristique et egestas quis ipsum. Consequat semper viverra nam
            libero. Lectus quam id leo in vitae turpis. In eu mi bibendum neque egestas congue
            quisque egestas diam. кофе blandit turpis cursus in hac habitasse platea dictumst quisque.<br>",

           "Ullamcorper malesuada proin libero nunc consequat interdum varius sit amet. Odio `pellentesque`
            diam volutpat commodo sed egestas. Eget nunc lobortis mattis aliquam. Cursus vitae congue
            mauris rhoncus aenean vel. Pretium viverra suspendisse potenti nullam ac tortor vitae.
            A pellentesque sit amet [porttitor](/) eget кофе dolor. Nisl nunc mi ipsum faucibus vitae. Purus sit amet
            luctus venenatis lectus magna fringilla urna. Sit amet tellus cras adipiscing enim. Euismod
            nisi porta lorem mollis aliquam ut porttitor leo.<br>",

           "Ullamcorper malesuada proin libero nunc consequat interdum varius sit amet. Odio pellentesque
            diam volutpat commodo sed egestas. Eget nunc lobortis mattis aliquam. Cursus vitae congue
            mauris `rhoncus aenean` vel. Pretium viverra suspendisse кофе potenti [nullam](/) ac tortor vitae.
            A pellentesque sit amet porttitor eget dolor. Nisl nunc mi ipsum faucibus vitae. Purus sit amet
            luctus venenatis lectus magna fringilla urna. Sit amet tellus cras adipiscing enim. Euismod
            nisi porta lorem mollis aliquam ut `porttitor` leo.<br>",

           "Ullamcorper malesuada proin libero nunc consequat interdum varius sit amet. Odio pellentesque
            diam volutpat commodo sed egestas. Eget nunc lobortis mattis aliquam. Cursus vitae congue
            `mauris` rhoncus aenean vel. Pretium viverra suspendisse potenti nullam ac tortor vitae.
            A pellentesque кофе sit amet porttitor eget dolor. Nisl nunc mi ipsum faucibus vitae. Purus sit amet
            luctus venenatis lectus [magna](/) fringilla urna. Sit amet tellus cras adipiscing enim. Euismod
            nisi porta lorem mollis aliquam ut porttitor leo.<br>",

           "Ullamcorper malesuada [proin](/) libero nunc consequat interdum varius sit amet. Odio pellentesque
            diam volutpat commodo sed egestas. Eget nunc lobortis mattis aliquam. Cursus vitae `congue`
            mauris rhoncus aenean vel. Pretium viverra suspendisse potenti nullam ac tortor vitae.
            A pellentesque sit amet porttitor eget dolor. Nisl nunc mi ipsum faucibus vitae. Purus sit amet
            luctus venenatis lectus magna fringilla urna. Sit amet tellus cras adipiscing enim. Euismod
            nisi porta lorem mollis aliquam ut кофе porttitor leo.<br>",

           "Ullamcorper malesuada proin libero nunc consequat interdum varius sit amet. Odio pellentesque
            diam volutpat commodo sed egestas. Eget nunc lobortis mattis aliquam. Cursus vitae congue
            mauris rhoncus aenean vel. Pretium viverra suspendisse potenti nullam ac tortor vitae.
            A pellentesque sit amet porttitor eget dolor. Nisl кофе nunc mi ipsum faucibus vitae. Purus sit amet
            luctus venenatis lectus magna fringilla `urna`. Sit amet tellus cras adipiscing enim. Euismod
            nisi porta lorem [mollis](/) aliquam ut porttitor leo.<br>"

        ];

        if (!$paragraphs) {

            return '';
        }

        /**
         *  Формируем текст из случайных параграфов в переменную $content,
         * если $word = null, или $wordsCount = 0, возврщаем $content
         */
        $items = [];

        for ($i = 0; $i <= $paragraphs; $i++) {

            $items[] = rand(0, count($text) - 1);
        }

        $content = '';

        foreach ($items as $item) {

            $content .= ' ' . $text[$item];
        }

        if (!$word || !$wordsCount) {

            return $content;
        }

        /**
         * Вставляем слово нужное количество раз
         */
        if ($this->markArticleWordsWithBold === true) {

            $word = '**' . $word . '**';
        } else {
            $word = '*' . $word . '*';
        }

            $arr = explode(' ', $content);

            $new_arr = array_rand($arr, $wordsCount);

            foreach ($new_arr as $item) {

                $arr[$item] .= ' ' . $word;
            }

        return $text = implode(' ', $arr);

    }

}