<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 20.10.2018 г.
 * Time: 22:05 ч.
 */

class HTMLWriter implements WriterInterface
{
    public function write(Article $article){
        $html='<h1>' . $article->title . '</h1>';
        $html.='<h2>' . $article->author  . '</h2>';
        $html.='<div>' . $article->price . '</div>';

        return $html;
    }
}