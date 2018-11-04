<?php

class Book
{
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $author;

    /**
     * @var float
     */
    protected $price;

    /**
     * Book constructor.
     * @param string $title
     * @param string $author
     * @param float $price
     * @throws Exception
     */
    public function __construct(string $title, string $author, float $price)
    {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPrice($price);
    }

    /**
     * @param string $title
     * @throws Exception
     */
    private function setTitle(string $title): void
    {
        if (strlen($title) < 3) {
            throw new Exception('Title not valid!');
        }
        $this->title = $title;
    }

    /**
     * @param string $author
     * @throws Exception
     */
    private function setAuthor(string $author): void
    {
        $nameTokens = explode(' ', $author);
        $secondName = $nameTokens[1];
        if (is_numeric($secondName[0])) {
            throw new Exception('Author not valid!');
        }
        $this->author = $author;
    }

    /**
     * @param float $price
     * @throws Exception
     */
    protected function setPrice(float $price): void
    {
        if (floatval($price) <= 0) {
            throw new Exception('Price not valid!');
        }
        $this->price = $price;
    }

    public function getPrice(){
        return $this->price;
    }

    public function __toString()
    {
        $result = 'OK' . PHP_EOL;
        $result .= $this->getPrice();
        return $result;
    }


}