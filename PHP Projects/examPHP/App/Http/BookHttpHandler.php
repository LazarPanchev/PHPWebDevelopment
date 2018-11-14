<?php

namespace App\Http;

use App\DTO\BookDTO;
use App\DTO\EditDTO;
use App\DTO\GenreDTO;
use App\Service\BookServiceInterface;
use App\Service\GenreService;
use App\Service\GenreServiceInterface;
use App\Service\UserServiceInterface;
use Exception;

class BookHttpHandler extends HttpHandlerAbstract
{
    public function viewAll(BookServiceInterface $bookService)
    {
        try {
            $allBooks = $bookService->findAll();
            $this->render('books/all_books', $allBooks);
        } catch (Exception $ex) {
            $this->render('users/login');
        }
    }

    public function myBooks(BookServiceInterface $bookService, UserServiceInterface $userService)
    {
        try {
            $user = $userService->getCurrentUser();
            $myBooks = $bookService->findMine($user->getUserId());
            $this->render('books/my_books', $myBooks);
        } catch (Exception $ex) {
            $this->redirect('login.php');
        }
    }

    /**
     * @param BookServiceInterface $bookService
     * @param GenreServiceInterface $genreService
     * @param UserServiceInterface $userService
     * @param array $formData
     */
    public function add(BookServiceInterface $bookService,
                        GenreServiceInterface $genreService,
                        UserServiceInterface $userService,
                        array $formData = [])
    {
        if (isset($formData['Add'])) {
            $this->handleAddProcess($bookService, $genreService, $userService, $formData);
        } else {
            /** @var EditDTO $editDTO */
            $editDTO = new EditDTO();

            $genres = $genreService->getAll();
            /** @var \Generator|GenreDTO[] $genres */
            $editDTO->setGenres($genres);
            $this->render('books/add_book', $editDTO);
        }
    }

    public function edit(BookServiceInterface $bookService,
                         GenreServiceInterface $genreService,
                         array $formData = [],
                         array $getData = [])
    {
        if (isset($formData['Edit'])) {
            $bookId = $getData['id'];
            $this->handleEditProcess($bookService, $genreService, $formData, $bookId);
        } else {
            $book = $bookService->findOne(intval($getData['id']));
            $genres = $genreService->getAll();

            /** @var EditDTO $editDTO */
            $editDTO = new EditDTO();
            /** @var \Generator|GenreDTO[] $genres */
            $editDTO->setBook($book);
            $editDTO->setGenres($genres);
            $this->render('books/edit', $editDTO);
        }
    }

    public function delete(BookServiceInterface $bookService, array $getData = [])
    {
        try {
            $bookService->remove(intval($getData['id']));
            $this->redirect('my_books.php');
        } catch (Exception $ex) {
            $this->render('books/my_books');
        }
    }

    public function view(BookServiceInterface $bookService,
                         UserServiceInterface $userService,
                         GenreServiceInterface $genreService,
                         array $getData = [])
    {

        $currentUser = $userService->getCurrentUser();
        $currentBook = $bookService->findOne($getData['id']);
        $currentBookUser = $currentBook->getUser();
        if($currentUser->getUserId()===$currentBookUser->getUserId()){
            $this->render('books/view', $currentBook);
        }else{
            $this->redirect('login.php');
        }
    }

    private function handleAddProcess(BookServiceInterface $bookService,
                                      GenreServiceInterface $genreService,
                                      UserServiceInterface $userService,
                                      array $formData = [])
    {
        try {
            /** @var BookDTO $book */
            $book = $this->dataBinder->bind($formData, BookDTO::class);

            $genreId = intval($formData['genre_id']);
            $genre = $genreService->findOne($genreId);

            $user = $userService->getCurrentUser();
            $book->setGenre($genre);
            $book->setUser($user);
            $bookService->add($book);
            $this->redirect('my_books.php');
        } catch (Exception $ex) {
            /** @var EditDTO $editDTO */
            $editDTO = new EditDTO();
            $book = $this->dataBinder->bindReflection($formData, BookDTO::class);
            $genres = $genreService->getAll();
            /** @var \Generator|GenreDTO[] $genres */
            $editDTO->setGenres($genres);
            $editDTO->setBook($book);
            $this->render('books/add_book', $editDTO, [$ex->getMessage()]);
        }

    }

    private function handleEditProcess(BookServiceInterface $bookService,
                                       GenreServiceInterface $genreService,
                                       array $formData = [],
                                       $bookId)
    {
        try {
            /** @var BookDTO $editedBook */
            $editedBook = $this->dataBinder->bind($formData, BookDTO::class);
            $genreId = intval($formData['genre_id']);
            $genre = $genreService->findOne($genreId);
            $editedBook->setGenre($genre);
            $bookService->edit($editedBook, $bookId);
            $this->redirect('my_books.php');
        } catch (Exception $ex) {
            /** @var BookDTO $book */
            $book = $this->dataBinder->bindReflection($formData, BookDTO::class);
            $genre = $genreService->findOne($formData['genre_id']);
            $book->setGenre($genre);
            /** @var EditDTO $editDTO */
            $editDTO = new EditDTO();
            $genres = $genreService->getAll();
            $editDTO->setBook($book);
            $editDTO->setGenres($genres);
            $this->render('books/edit', $editDTO, [$ex->getMessage()]);
        }
    }

}