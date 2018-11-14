<?php

namespace App\DTO;

use Exception;

class BookDTO
{
    const MIN_TITLE_LENGTH = 3;
    const MAX_TITLE_LENGTH = 50;

    const MIN_AUTHOR_LENGTH = 3;
    const MAX_AUTHOR_LENGTH = 50;

    const MIN_DESCRIPTION_LENGTH = 10;
    const MAX_DESCRIPTION_LENGTH = 10000;

    const MIN_IMAGE_LENGTH = 3;
    const MAX_IMAGE_LENGTH = 255;
    /**
     * @var int
     */
    private $bookId;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $author;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $image;
    /**
     * @var GenreDTO
     */
    private $genre;
    /**
     * @var UserDTO
     */
    private $user;
    /**
     * @var string
     */
    private $addedOn;

    /**
     * @return int
     */
    public function getBookId(): int
    {
        return $this->bookId;
    }

    /**
     * @param int $bookId
     */
    public function setBookId(int $bookId): void
    {
        $this->bookId = $bookId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @throws Exception
     */
    public function setTitle(string $title): void
    {
        DTOValidator::validate(
            self::MIN_TITLE_LENGTH,
            self::MAX_TITLE_LENGTH,
            $title, "Book Title must be between "
            . self::MIN_TITLE_LENGTH . " and "
            . self::MAX_TITLE_LENGTH . " characters");

        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @throws Exception
     */
    public function setAuthor(string $author): void
    {
        DTOValidator::validate(
            self::MIN_AUTHOR_LENGTH,
            self::MAX_AUTHOR_LENGTH,
            $author, "Book Author must be between "
            . self::MIN_AUTHOR_LENGTH . " and "
            . self::MAX_AUTHOR_LENGTH . " characters");

        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @throws Exception
     */
    public function setDescription(string $description): void
    {
        DTOValidator::validate(
            self::MIN_DESCRIPTION_LENGTH,
            self::MAX_DESCRIPTION_LENGTH,
            $description, "Book Description must be between "
            . self::MIN_DESCRIPTION_LENGTH . " and "
            . self::MAX_DESCRIPTION_LENGTH . " characters");

        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @throws Exception
     */
    public function setImage(string $image): void
    {
        DTOValidator::validateURL($image,"Book Image must be valid URL with " .
            self::MIN_IMAGE_LENGTH . " and " .
            self::MAX_IMAGE_LENGTH . " characters");
        $this->image = $image;
    }

    /**
     * @return GenreDTO
     */
    public function getGenre(): GenreDTO
    {
        return $this->genre;
    }

    /**
     * @param GenreDTO $genre
     */
    public function setGenre(GenreDTO $genre): void
    {
        $this->genre = $genre;
    }

    /**
     * @return UserDTO
     */
    public function getUser(): UserDTO
    {
        return $this->user;
    }

    /**
     * @param UserDTO $user
     */
    public function setUser(UserDTO $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getAddedOn(): string
    {
        return $this->addedOn;
    }

    /**
     * @param string $addedOn
     */
    public function setAddedOn(string $addedOn): void
    {
        $this->addedOn = $addedOn;
    }


}