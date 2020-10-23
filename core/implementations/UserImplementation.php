<?php
use Interfaces\IUser;
use Entities\User;
use Database\Db;
use Implementations\WorkScheduleImplementation;
class UserImplementation  implements IUser
{

    public static function login(string $username, string $password): bool
    {
        $db = Db::getInstance();
        $sql = " SELECT * FROM USER WHERE login = :login and password = :password";
        $query = $db->prepare($sql);
        $query->bindParam(':login',$username);
        $query->bindParam(':password',$password);
        $query->execute();
        $result = $query->fetchAll();
        if (count($result) === 1) {
            $user = new User();
            $user->setId($result[0]['id']);
            $user->setName($result[0]['fullName']);
            $user->setLogin($result[0]['login']);
            $user->setPassword($result[0]['password']);
            $user->setSalary($result[0]['salary']);
            $user->setWorkSchedule(WorkScheduleImplementation::getWorkScheduleById($result[0]['idws']));
            $_SESSION['user'] = $user;
            $_SESSION['entry-time'] = new DateTime('now');
            return true;
        }
        return false;
     }

    public static function updateUser(User $user): void
    {
    $db = Db::getInstance();
    $sql= 'UPDATE user SET salary= :salary WHERE id=:id';
    $query= $db->prepare($sql);
    $id = $user->getId();
    $salary = $user->getSalary();
    $query->bindParam(':id',$id);
    $query->bindParam('salary',$salary);
    $query->execute();

    }
}