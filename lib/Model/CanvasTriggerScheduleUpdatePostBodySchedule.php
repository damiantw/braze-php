<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Braze\Model;

class CanvasTriggerScheduleUpdatePostBodySchedule extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * @var string
     */
    protected $time;
    /**
     * @var bool
     */
    protected $inLocalTime;

    public function getTime(): string
    {
        return $this->time;
    }

    public function setTime(string $time): self
    {
        $this->initialized['time'] = true;
        $this->time = $time;

        return $this;
    }

    public function getInLocalTime(): bool
    {
        return $this->inLocalTime;
    }

    public function setInLocalTime(bool $inLocalTime): self
    {
        $this->initialized['inLocalTime'] = true;
        $this->inLocalTime = $inLocalTime;

        return $this;
    }
}
