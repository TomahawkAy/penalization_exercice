<?php
namespace Interfaces;
use Entities\User;
interface IUser{
    public static function login(string $username,string $password) : bool ;
    public static function updateUser(User $user):void;
}