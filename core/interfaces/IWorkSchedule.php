<?php
namespace Interfaces;
use DateTime;
use Entities\User;
use Entities\WorkSchedule;
interface IWorkSchedule{
    public static function checkForPenality(DateTime $date,User $user) : void;
    public static function getWorkScheduleById(int $id) : WorkSchedule;

}