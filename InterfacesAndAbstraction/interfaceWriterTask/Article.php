<?php
class Article
{
    public $title;

    public $author;

    public $price;

    /**
     * Article constructor.
     * @param $title
     * @param $author
     * @param $price
     */
    public function __construct($title, $author, $price)
    {
        $this->title=$title;
        $this->author=$author;
        $this->price=$price;
    }
}