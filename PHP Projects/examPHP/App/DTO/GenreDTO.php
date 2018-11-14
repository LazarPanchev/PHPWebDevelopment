<?php

namespace App\DTO;

use Exception;

class GenreDTO
{
    const MIN_NAME_LENGTH=3;
    const MAX_NAME_LENGTH=50;
    /**
     * @var int
     */
    private $genreId;

    /**
     * @var string
     */
    private $name;

    /**
     * @return int
     */
    public function getGenreId(): int
    {
        return $this->genreId;
    }

    /**
     * @param int $genreId
     */
    public function setGenreId(int $genreId): void
    {
        $this->genreId = $genreId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @throws Exception
     */
    public function setName(string $name): void
    {
        DTOValidator::validate(
            self::MIN_NAME_LENGTH,
            self::MAX_NAME_LENGTH,
            $name, "Genre Name must be between "
            . self::MIN_NAME_LENGTH . " and "
            . self::MAX_NAME_LENGTH . " characters");

        $this->name = $name;
    }
}