<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 3.11.2018 г.
 * Time: 15:08 ч.
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
        $this->userRepository=$userRepository;
    }

    public function register(UserDTO $user, string $confirmPassword): bool
    {
        if($user->getPassword()!==$confirmPassword){
            return false;
        }

        if($this->userRepository->findOneByUsername($user->getUsername())){
            return false;
        }

        $this->cryptPassword($user);
        if(!$this->userRepository->insert($user)){
            return false;
        }else{
            return true;
        }
    }

    public function login(string $username, string $password): ?UserDTO
    {
        $user =$this->userRepository->findOneByUsername($username);

        if(is_null($user)){
            return null;
        }

        $userPasswordHash=$user->getPassword();

        if(!password_verify($password,$userPasswordHash)){
            return null;
        }

        return $user;
    }

    public function currentUser(): ?UserDTO
    {
        $currentId=null;
        if(isset($_SESSION['id'])){
            $currentId=$_SESSION['id'];
        }else{
            return null;
        }


        if(!$currentId){
            return null;
        }

        $user=$this->userRepository->findOneById($currentId);


        if(is_null($user)){
            return null;
        }

        return $user;
    }

    public function edit(UserDTO $editedUser): bool
    {
        $currentId = $_SESSION['id'];
        if(is_null($currentId)){
            return false;
        }
        $userDb=$this->userRepository->findOneByUsername($editedUser->getUsername());
        if($userDb && $userDb->getUsername()!==$editedUser->getUsername()){
            return false;
        }


        $this->cryptPassword($editedUser);
        if($this->userRepository->update($editedUser,$currentId)){
            return true;
        }else{
            return false;
        }
    }

    public function cryptPassword(UserDTO $user){
        $plainText=$user->getPassword();
        $passwordHash=password_hash($plainText,PASSWORD_DEFAULT);
        $user->setPassword($passwordHash);
    }

    /**
     * @return Generator|UserDTO[]
     */
    public function allUsers(): Generator
    {
        return $this->userRepository->findAll();
    }
}