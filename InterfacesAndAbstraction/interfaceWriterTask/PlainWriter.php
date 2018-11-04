<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 20.10.2018 г.
 * Time: 22:24 ч.
 */

class PlainWriter implements WriterInterface
{
    public function write(Article $article)
    {
        return 'Title: ' . $article->title . " Author: " .
            $article->author . " Price: " . $article->price . PHP_EOL;
    }

}