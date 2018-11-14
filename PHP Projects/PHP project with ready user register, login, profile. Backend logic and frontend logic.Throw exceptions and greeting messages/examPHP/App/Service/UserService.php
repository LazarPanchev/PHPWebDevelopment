<?php

namespace App\Service;


use App\DTO\UserDTO;
use App\Repository\UserRepositoryInterface;
use Exception;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository=$userRepository;
    }

    /**
     * @param UserDTO $user
     * @param string $confirmPassword
     * @return bool
     * @throws Exception
     */
    public function register(UserDTO $user, string $confirmPassword): bool
    {
        if($user->getPassword()!==$confirmPassword){
            throw new Exception('Passwords mismatch!');
        }

        if($this->userRepository->findByUsername($user->getUsername()) !==null){
            throw new Exception('Username already exist');
        }

        $this->cryptPassword($user);
        return $this->userRepository->insert($user);
    }

    /**
     * @param string $username
     * @param string $password
     * @return UserDTO|null
     * @throws Exception
     */
    public function login(string $username, string $password): ?UserDTO
    {
        $user=$this->userRepository->findByUsername($username);
        if(is_null($user)){
            throw new Exception("Your username does not exist.
                                         You might want to <a href='register.php'>register</a> first?");
        }

        if(!password_verify($password,$user->getPassword())){
            throw new Exception("Wrong password. Did you forget it?");
        }

        return $user;
    }

    /**
     * @return UserDTO|null
     * @throws Exception
     */
    public function getCurrentUser(): ?UserDTO
    {
        if (!isset($_SESSION['id'])) {
            throw new Exception("No current user! You must login first!");
        }

        return $this->userRepository->findById(intval($_SESSION['id']));
    }


    /**
     * @param UserDTO $user
     * @throws Exception
     */
    private function cryptPassword(UserDTO $user)
    {
        $plainText=$user->getPassword();
        $passwordHash=password_hash($plainText,PASSWORD_DEFAULT);
        $user->setPassword($passwordHash);
    }
}