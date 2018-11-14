<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 13.11.2018 г.
 * Time: 17:18
 */

namespace App\Repository;


use App\DTO\BookDTO;
use App\DTO\GenreDTO;
use App\DTO\UserDTO;
use Core\DataBinderInterface;
use Database\DatabaseInterface;

class BookRepository implements BookRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * @var DataBinderInterface
     */
    private $dataBinder;

    /**
     * BookRepository constructor.
     * @param DatabaseInterface $db
     * @param DataBinderInterface $dataBinder
     */
    public function __construct(DatabaseInterface $db, DataBinderInterface $dataBinder)
    {
        $this->db = $db;
        $this->dataBinder = $dataBinder;
    }

    public function findAll(): \Generator{
        $lazyBookResult = $this->db->query(
                         "SELECT b.book_id, 
                                b.title, b.author, 
                                b.genre_id AS genreId,
                                b.user_id AS userId,
                                g.name, u.username
                                FROM books AS b 
                                INNER JOIN genres AS g 
                                ON b.genre_id = g.genre_id
                                INNER JOIN users AS u
                                ON b.user_id = u.user_id;")
            ->execute()
            ->fetch();
        foreach ($lazyBookResult as $row){
            /** @var BookDTO $book */
            $book= $this->dataBinder->bind($row,BookDTO::class);
            $genre=$this->dataBinder->bind($row,GenreDTO::class);
            $user=$this->dataBinder->bind($row, UserDTO::class);
            $book->setGenre($genre);
            $book->setUser($user);

            yield $book;
        }
    }

    public function findAllById(int $id): \Generator
    {
        $lazyBookResult= $this->db
            ->query("SELECT b.book_id, 
                                b.title, b.author, 
                                b.genre_id AS genreId,
                                b.user_id AS userId,
                                g.name, u.username
                                FROM books AS b 
                                INNER JOIN genres AS g 
                                ON b.genre_id = g.genre_id
                                INNER JOIN users AS u
                                ON b.user_id = u.user_id
                                WHERE b.user_id = :id;")
            ->execute([':id'=>$id])
            ->fetch();
        foreach ($lazyBookResult as $row){
            /** @var BookDTO $book */
            $book=$this->dataBinder->bind($row,BookDTO::class);
            $genre=$this->dataBinder->bind($row,GenreDTO::class);
            $book->setGenre($genre);
            yield $book;
        }
    }

    public function findOneById(int $id): ?BookDTO
    {
        $row =  $this->db->query("SELECT book_id AS bookId,
                                b.title, b.author,
                                b.description, b.image,
                                b.genre_id AS genreId,
                                g.name,
                                b.user_id AS userId
                                FROM books AS b
                                INNER JOIN genres AS g
                                ON b.genre_id = g.genre_id 
                                WHERE book_id = :id;")
            ->execute(['id'=>$id])
            ->fetch()
            ->current();
        $book=$this->dataBinder->bind($row,BookDTO::class);
        /** @var BookDTO $book */
        $genre= $this->dataBinder->bind($row,GenreDTO::class);
        $user=$this->dataBinder->bind($row,UserDTO::class);
        $book->setGenre($genre);
        $book->setUser($user);
        return $book;
    }



    public function insert(BookDTO $bookDTO): bool
    {
        $this->db->query("INSERT INTO books 
                              (title,
                              author,
                              description,
                              image,
                              genre_id,
                              user_id)
                              VALUES(
                              :title,
                              :author,
                              :description,
                              :image,
                              :genreId,
                              :userId);")
            ->execute([
                ':title'=>$bookDTO->getTitle(),
                ':author'=>$bookDTO->getAuthor(),
                ':description'=>$bookDTO->getDescription(),
                ':image'=>$bookDTO->getImage(),
                ':genreId'=>$bookDTO->getUser()->getUserId(),
                ':userId'=>$bookDTO->getUser()->getUserId()
            ]);
        return true;
    }


    public function update(BookDTO $editedBookDTO, int $id): bool
    {
        $this->db
            ->query("UPDATE books
                                SET title=:title, author=:author,
                                description=:description, 
                                image=:image, genre_id=:genreId
                                WHERE book_id = :id;")
            ->execute([
                ':title'=>$editedBookDTO->getTitle(),
                ':author'=>$editedBookDTO->getAuthor(),
                ':description'=>$editedBookDTO->getDescription(),
                ':image'=>$editedBookDTO->getImage(),
                ':genreId'=>$editedBookDTO->getGenre()->getGenreId(),
                ':id'=>$id
                ]);

        return true;
    }

    public function delete(int $id): bool
    {
        $this->db
            ->query("DELETE FROM books
                           WHERE book_id=:id;")
            ->execute([':id'=>$id]);

        return true;
    }
}