<?php

namespace App\Homework;

use Faker\Factory;

class CommentContentProvider implements CommentContentProviderInterface
{
    public function get(string $word = null, int $wordsCount = 0): string
    {
        $faker = Factory::create();

        $paragraph = $faker->paragraph;

        if (!$word || $wordsCount) {

            return $paragraph;

        }

        $arr = explode(' ', $paragraph);

        $new_arr = array_rand($arr, $wordsCount);

        foreach ($new_arr as $item) {

            $arr[$item] .= ' ' . $word;
        }

        return $paragraph = implode(' ', $arr);
    }
}