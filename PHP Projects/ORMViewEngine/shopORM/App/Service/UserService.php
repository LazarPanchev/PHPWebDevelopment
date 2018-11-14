<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 6.11.2018 г.
 * Time: 9:57
 */

namespace App\Service;


use App\Data\UserDTO;
use App\Repository\UserRepositoryInterface;
use Generator;

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

        if (is_null($currentUser)) {
            return null;
        }

        $currentUserPass = $currentUser->getPassword();
        if (!password_verify($password, $currentUserPass)) {
            return null;
        }

        return $currentUser;
    }

    public function currentUser(): ?UserDTO
    {
        if (!isset($_SESSION['id'])) {
            return null;
        }

        $id = $_SESSION['id'];
        return $this->userRepository->findOneById($id);
    }


    public function edit(UserDTO $userDTOEdited): bool
    {
        $desiredUser = $this->userRepository->findOneByUsername($userDTOEdited->getUsername());
        if (!is_null($desiredUser) && $desiredUser->getUsername() !== $userDTOEdited->getUsername()) {
            return false;
        }

        $this->encryptPassword($userDTOEdited);
        if($this->userRepository->update($_SESSION['id'], $userDTOEdited)){
            return true;
        }else{
            return false;
        }
    }


    private function encryptPassword(UserDTO $user)
    {
        $plainText = $user->getPassword();
        $hashPassword = password_hash($plainText, PASSWORD_DEFAULT);
        $user->setPassword($hashPassword);
    }

    /**
     * @return Generator|UserDTO[]
     */
    public function all(): Generator
    {
        return $this->userRepository->getAllUsers();
    }
}