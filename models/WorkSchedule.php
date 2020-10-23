<?php

namespace Entities;
use DateTime;
class WorkSchedule
{
    private int $id;
    private DateTime $entryHour;
    private DateTime $exitHour;
    private float $penalityMinute;
    private DateTime $limitHour;
    private float $penalityDay;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return DateTime
     */
    public function getEntryHour(): DateTime
    {
        return $this->entryHour;
    }

    /**
     * @param DateTime $entryHour
     */
    public function setEntryHour(DateTime $entryHour): void
    {
        $this->entryHour = $entryHour;
    }

    /**
     * @return DateTime
     */
    public function getExitHour(): DateTime
    {
        return $this->exitHour;
    }

    /**
     * @param DateTime $exitHour
     */
    public function setExitHour(DateTime $exitHour): void
    {
        $this->exitHour = $exitHour;
    }

    /**
     * @return float
     */
    public function getPenalityMinute(): float
    {
        return $this->penalityMinute;
    }

    /**
     * @param float $penalityMinute
     */
    public function setPenalityMinute(float $penalityMinute): void
    {
        $this->penalityMinute = $penalityMinute;
    }

    /**
     * @return DateTime
     */
    public function getLimitHour(): DateTime
    {
        return $this->limitHour;
    }

    /**
     * @param DateTime $limitHour
     */
    public function setLimitHour(DateTime $limitHour): void
    {
        $this->limitHour = $limitHour;
    }

    /**
     * @return float
     */
    public function getPenalityDay(): float
    {
        return $this->penalityDay;
    }

    /**
     * @param float $penalityDay
     */
    public function setPenalityDay(float $penalityDay): void
    {
        $this->penalityDay = $penalityDay;
    }

}