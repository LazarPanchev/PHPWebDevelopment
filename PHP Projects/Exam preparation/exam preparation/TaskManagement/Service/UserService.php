<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 8.11.2018 г.
 * Time: 20:35 ч.
 */

namespace TaskManagement\Service;
use Exception;
use TaskManagement\DTO\userDTO;
use TaskManagement\Repository\UserRepositoryInterface;

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
        $this->userRepository = $userRepository;
    }


    /**
     * @param userDTO $user
     * @param string $confirmPassword
     * @return void
     * @throws Exception
     */
    public function register(UserDTO $user, string $confirmPassword): void
    {
        if($user->getPassword()!==$confirmPassword){
            throw new Exception('Username already exist or password mismatch!');
        }

        if($this->userRepository->findOneByUsername($user->getUsername())){
            throw new Exception('Username already exist or password mismatch!');
        }

        $this->cryptPassword($user);
        if(!$this->userRepository->insert($user)){
            throw new Exception('Username already exist or password mismatch!');
        }
    }

    /**
     * @param string $username
     * @param string $password
     * @return null|userDTO
     * @throws Exception
     */
    public function login(string $username, string $password): ?UserDTO
    {
        $user =$this->userRepository->findOneByUsername($username);
        if(is_null($user)){
            throw new Exception("Invalid username or password!");
        }
        $userPasswordHash=$user->getPassword();
        if(!password_verify($password,$userPasswordHash)){
            throw new Exception("Invalid username or password!");
        }
        return $user;
    }

    /**
     * @return null|userDTO
     * @throws Exception
     */
    public function currentUser(): ?UserDTO
    {
        $currentId=null;
        if(isset($_SESSION['id'])){
            $currentId=$_SESSION['id'];
        }else{
            return null;
        }

        $user=$this->userRepository->findOneById($currentId);

        if(is_null($user)){
            throw new Exception("Not exist user!");
        }
        return $user;
    }


    /**
     * @param userDTO $user
     * @throws \Exception
     */
    public function cryptPassword(UserDTO $user) :void{
        $plainText=$user->getPassword();
        $passwordHash=password_hash($plainText,PASSWORD_DEFAULT);
        $user->setPassword($passwordHash);
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function isLogged(): bool
    {
        if($this->currentUser() === null){
            return false;
        }
        return true;
    }

//    /**
//     * @param string $username
//     * @return null|userDTO
//     * @throws Exception
//     */
//    public function findOne(string $username): ?UserDTO
//    {
//        $user=$this->userRepository->findOneByUsername($username);
//
//        if(is_null($user)){
//            throw new Exception("Not exist user!");
//        }
//        return $user;
//    }
}