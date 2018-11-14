<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 13.11.2018 г.
 * Time: 17:16
 */

namespace App\Service;

use App\Repository\BookRepositoryInterface;
use App\DTO\BookDTO;
use Exception;

class BookService implements BookServiceInterface
{
    /**
     * @var BookRepositoryInterface
     */
    private $bookRepository;

    /**
     * BookService constructor.
     * @param BookRepositoryInterface $bookRepository
     */
    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function findAll(): \Generator
    {
         return $this->bookRepository->findAll();
    }

    /**
     * @param int $id
     * @return BookDTO|null
     * @throws Exception
     */
    public function findOne(int $id): BookDTO
    {
        $book=$this->bookRepository->findOneById($id);
        if(is_null($book)){
            throw new Exception("You must login first to edit a book!");
        }
        return $book;
    }

    public function findMine(int $id): \Generator
    {
        return $this->bookRepository->findAllById($id);
    }

    public function add(BookDTO $book): bool
    {
        return $this->bookRepository->insert($book);
    }

    /**
     * @param BookDTO $editedBook
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function edit(BookDTO $editedBook, int $id): bool
    {
        if($this->bookRepository->update($editedBook,$id)){
            return true;
        }else{
            throw new Exception("You must login first to edit Book!");
        }
    }

    /**
     * @param int $id
     * @return bool
     * @throws Exception
     */
    public function remove(int $id): bool
    {
        if($this->bookRepository->delete($id)){
            return true;
        }else{
            throw new Exception("Not choosen book to delete");
        }
    }
}