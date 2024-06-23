<?php 

namespace App\Entity;

class openingHours 
{
    protected ?int $id_openinghours = null;
    protected string $day_of_week;
    protected ?string $opening_time = null;
    protected ?string $closing_time = null;


    /**
     * Get the value of id_openinghours
     */
    public function getIdOpeninghours(): ?int
    {
        return $this->id_openinghours;
    }

    /**
     * Set the value of id_openinghours
     */
    public function setIdOpeninghours(?int $id_openinghours): self
    {
        $this->id_openinghours = $id_openinghours;

        return $this;
    }

    /**
     * Get the value of day_of_week
     */
    public function getDayOfWeek(): string
    {
        return $this->day_of_week;
    }

    /**
     * Set the value of day_of_week
     */
    public function setDayOfWeek(string $day_of_week): self
    {
        $this->day_of_week = $day_of_week;

        return $this;
    }

    /**
     * Get the value of opening_time
     */
    public function getOpeningTime(): ?string
    {
        return $this->opening_time;
    }

    /**
     * Set the value of opening_time
     */
    public function setOpeningTime(?string $opening_time): self
    {
        $this->opening_time = $opening_time;

        return $this;
    }

    /**
     * Get the value of closing_time
     */
    public function getClosingTime(): ?string
    {
        return $this->closing_time;
    }

    /**
     * Set the value of closing_time
     */
    public function setClosingTime(?string $closing_time): self
    {
        $this->closing_time = $closing_time;

        return $this;
    }
}