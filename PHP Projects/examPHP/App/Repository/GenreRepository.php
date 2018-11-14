<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 13.11.2018 г.
 * Time: 18:27
 */

namespace App\Repository;


use App\DTO\GenreDTO;
use Database\PDODatabase;

class GenreRepository implements GenreRepositoryInterface
{
    /**
     * @var PDODatabase
     */
    private $db;

    public function __construct(PDODatabase $db)
    {
        $this->db = $db;
    }

    public function findById(int $id): ?GenreDTO
    {
        return $this->db
            ->query("SELECT genre_id AS genreId, name
                                FROM genres
                                WHERE genre_id=:id;")
            ->execute([':id' => $id])
            ->fetch(GenreDTO::class)
            ->current();
    }

    /**
     * @return \Generator|GenreDTO[]
     */
    public function findAll(): \Generator
    {
        return $this->db
            ->query("SELECT genre_id AS genreId,
                                `name` 
                                FROM genres;")
            ->execute()
            ->fetch(GenreDTO::class);

    }
}

