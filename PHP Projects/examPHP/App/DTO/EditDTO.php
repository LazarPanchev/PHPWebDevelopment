<?php

namespace App\DTO;


class EditDTO
{
    /**
     * @var BookDTO
     */
    private $book;
    /**
     * @var GenreDTO[]
     */
    private $genres;

    /**
     * @return BookDTO|null
     */
    public function getBook(): ?BookDTO
    {
        return $this->book;
    }

    /**
     * @param BookDTO $book
     */
    public function setBook(BookDTO $book): void
    {
        $this->book = $book;
    }

    /**
     * @return GenreDTO[]
     */
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * @param GenreDTO[]|\Generator $genres
     */
    public function setGenres($genres): void
    {
        $this->genres = $genres;
    }


}