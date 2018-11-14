<?php

namespace App\Service;

use App\Data\UserDTO;
use App\Repository\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(UserDTO $userDTO, string $confirmPassword): bool
    {
        if ($userDTO->getPassword() !== $confirmPassword) {
            return false;
        }
        if ($this->userRepository->findOneByUsername($userDTO->getUsername()) !== null) {
            return false;
        }

        $this->encryptPassword($userDTO);

        return $this->userRepository->insert($userDTO);
    }

    public function login(string $username, string $password): ?UserDTO
    {
        $currentUser = $this->userRepository->findOneByUsername($username);

        if ($currentUser ===null) {  //===null
            return null;
        }

        $userPasswordHash = $currentUser->getPassword();
        if (password_verify($password, $userPasswordHash)==false) {
            return null;
        }

        return $currentUser;
    }

    public function currentUser(): ?UserDTO
    {
        if (!isset($_SESSION['id'])) {
            return null;
        }

        return $this->userRepository->findOneById($_SESSION['id']);
    }

    public function edit(UserDTO $userDTO): bool
    {
        $currentUser = $this->userRepository->findOneByUsername($userDTO->getUsername());
        if($currentUser !== null){
            return false;
        }

        $this->encryptPassword($userDTO);
        if($this->userRepository->update($_SESSION['id'], $userDTO)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @param UserDTO $userDTO
     */
    private function encryptPassword(UserDTO $userDTO): void
    {
        $plainText = $userDTO->getPassword();
        $passwordHash = password_hash($plainText, PASSWORD_DEFAULT);
        $userDTO->setPassword($passwordHash);
    }

    /**
     * @return \Generator|UserDTO[]
     */
    public function all(): \Generator
    {
        return $this->userRepository->findAll();

    }
}