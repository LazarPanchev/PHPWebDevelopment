<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 20.10.2018 г.
 * Time: 22:07 ч.
 */

interface WriterInterface
{
        public function write(Article $article);
}