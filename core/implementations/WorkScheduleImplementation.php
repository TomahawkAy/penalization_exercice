<?php

namespace Implementations;
use Database\Db;
use Interfaces\IWorkSchedule;
use DateTime;
use Entities\User;
use Entities\WorkSchedule;
class WorkScheduleImplementation implements IWorkSchedule
{

    public static function checkForPenality(DateTime $date, User $user): void
    {$old = $user->getSalary();
        $minDiff = (
                ($date->format('H') - $user->getWorkSchedule()->getEntryHour()->format('H')) * (60))

            + ($date->format('i') - $user->getWorkSchedule()->getEntryHour()->format('i'));
        $d = ($user->getWorkSchedule()->getLimitHour()->format('H') - $user->getWorkSchedule()->getEntryHour()->format('H')) * 60;

        if ($minDiff <= 0) {
            echo 'everything is doing well';
        } else if (($minDiff > 0) && ($minDiff < $d)) {

            echo " you are penalised for $minDiff minute ";
            $new = $user->getWorkSchedule()->getPenalityMinute() * $minDiff;
            $user->setSalary($new);
        } else {
            echo 'you are penalised for a day';
            $new = $old -  $user->getWorkSchedule()->getPenalityDay();
            $user->setSalary($new);
            \UserImplementation::updateUser($user);
        }





    }

    public static function getWorkScheduleById(int $id): WorkSchedule
    {
        $db = \Database\Db::getInstance();
        $sql = "SELECT * from workschedule WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindParam(':id',$id);
        $query->execute();
        $result = $query->fetch();
        $ws = new WorkSchedule();
        $ws->setId($result['id']);
        $ws->setEntryHour(new DateTime($result['entryHour']));
        $ws->setExitHour(new DateTime($result['exitHour']));
        $ws->setPenalityDay($result['penalityD']);
        $ws->setPenalityMinute($result['penalityM']);
        $ws->setLimitHour(new DateTime($result['limitH']));
        return $ws;
    }
}