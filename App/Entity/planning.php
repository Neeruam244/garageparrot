<?php 

namespace App\Entity;

class Planning 
{
    protected ?int $id_planning = null;
    protected string $jour1;
    protected string $hour1;
    protected string $jour2;
    protected string $hour2;
    protected ?string $jour3 = null;
    protected ?string $hour3 = null;
    protected ?string $jour4 = null;
    protected ?string $hour4 = null;
    protected ?string $jour5 = null;
    protected ?string $hour5 = null;
    protected ?string $jour6 = null;
    protected ?string $hour6 = null;
    protected ?string $jour7 = null;
    protected ?string $hour7 = null;

    

    /**
     * Get the value of id_planning
     */
    public function getIdPlanning(): ?int
    {
        return $this->id_planning;
    }

    /**
     * Set the value of id_planning
     */
    public function setIdPlanning(?int $id_planning): self
    {
        $this->id_planning = $id_planning;

        return $this;
    }

    /**
     * Get the value of jour1
     */
    public function getJour1(): string
    {
        return $this->jour1;
    }

    /**
     * Set the value of jour1
     */
    public function setJour1(string $jour1): self
    {
        $this->jour1 = $jour1;

        return $this;
    }

    /**
     * Get the value of hour1
     */
    public function getHour1(): string
    {
        return $this->hour1;
    }

    /**
     * Set the value of hour1
     */
    public function setHour1(string $hour1): self
    {
        $this->hour1 = $hour1;

        return $this;
    }

    /**
     * Get the value of jour2
     */
    public function getJour2(): string
    {
        return $this->jour2;
    }

    /**
     * Set the value of jour2
     */
    public function setJour2(string $jour2): self
    {
        $this->jour2 = $jour2;

        return $this;
    }

    /**
     * Get the value of hour2
     */
    public function getHour2(): string
    {
        return $this->hour2;
    }

    /**
     * Set the value of hour2
     */
    public function setHour2(string $hour2): self
    {
        $this->hour2 = $hour2;

        return $this;
    }

    /**
     * Get the value of jour3
     */
    public function getJour3(): ?string
    {
        return $this->jour3;
    }

    /**
     * Set the value of jour3
     */
    public function setJour3(?string $jour3): self
    {
        $this->jour3 = $jour3;

        return $this;
    }

    /**
     * Get the value of hour3
     */
    public function getHour3(): ?string
    {
        return $this->hour3;
    }

    /**
     * Set the value of hour3
     */
    public function setHour3(?string $hour3): self
    {
        $this->hour3 = $hour3;

        return $this;
    }

    /**
     * Get the value of jour4
     */
    public function getJour4(): ?string
    {
        return $this->jour4;
    }

    /**
     * Set the value of jour4
     */
    public function setJour4(?string $jour4): self
    {
        $this->jour4 = $jour4;

        return $this;
    }

    /**
     * Get the value of hour4
     */
    public function getHour4(): ?string
    {
        return $this->hour4;
    }

    /**
     * Set the value of hour4
     */
    public function setHour4(?string $hour4): self
    {
        $this->hour4 = $hour4;

        return $this;
    }

    /**
     * Get the value of jour5
     */
    public function getJour5(): ?string
    {
        return $this->jour5;
    }

    /**
     * Set the value of jour5
     */
    public function setJour5(?string $jour5): self
    {
        $this->jour5 = $jour5;

        return $this;
    }

    /**
     * Get the value of hour5
     */
    public function getHour5(): ?string
    {
        return $this->hour5;
    }

    /**
     * Set the value of hour5
     */
    public function setHour5(?string $hour5): self
    {
        $this->hour5 = $hour5;

        return $this;
    }

    /**
     * Get the value of jour6
     */
    public function getJour6(): ?string
    {
        return $this->jour6;
    }

    /**
     * Set the value of jour6
     */
    public function setJour6(?string $jour6): self
    {
        $this->jour6 = $jour6;

        return $this;
    }

    /**
     * Get the value of hour6
     */
    public function getHour6(): ?string
    {
        return $this->hour6;
    }

    /**
     * Set the value of hour6
     */
    public function setHour6(?string $hour6): self
    {
        $this->hour6 = $hour6;

        return $this;
    }

    /**
     * Get the value of jour7
     */
    public function getJour7(): ?string
    {
        return $this->jour7;
    }

    /**
     * Set the value of jour7
     */
    public function setJour7(?string $jour7): self
    {
        $this->jour7 = $jour7;

        return $this;
    }

    /**
     * Get the value of hour7
     */
    public function getHour7(): ?string
    {
        return $this->hour7;
    }

    /**
     * Set the value of hour7
     */
    public function setHour7(?string $hour7): self
    {
        $this->hour7 = $hour7;

        return $this;
    }
}