<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 13.11.2018 г.
 * Time: 18:26
 */

namespace App\Service;
use App\DTO\GenreDTO;
use App\Repository\GenreRepositoryInterface;
use Exception;

class GenreService implements GenreServiceInterface
{
    /**
     * @var GenreRepositoryInterface
     */
    private $genreRepository;

    public function __construct(GenreRepositoryInterface $genreRepository)
    {
        $this->genreRepository=$genreRepository;
    }


    /**
     * @param int $id
     * @return GenreDTO
     * @throws Exception
     */
    public function findOne(int $id): GenreDTO
    {
        $genre = $this->genreRepository->findById($id);
        if(is_null($genre)){
           throw new Exception("Non valid Genre. Please select Genre!");
        }

        return $genre;
    }

    /**
     * @return \Generator|GenreDTO[]
     */
    public function getAll(): \Generator
    {
         return $this->genreRepository->findAll();
    }
}