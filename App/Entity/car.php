<?php 

namespace App\Entity;

class Car {
    protected ?int $id_car = null;
    protected string $brand;
    protected string $model;
    protected string $description;
    protected string $created_at;
    protected int $year;
    protected string $mileage;
    protected string $energy;
    protected string $price;
    protected string $transmission;
    protected string $color;
    protected int $door_number;
    protected string $fiscal_power;
    protected string $interior_equipments;
    protected string $exterior_equipments;
    protected string $security_equipments;
    protected string $others_equipments;
    protected ?string $picture = null;

    

    /**
     * Get the value of id_car
     */
    public function getIdCar(): ?int
    {
        return $this->id_car;
    }

    /**
     * Set the value of id_car
     */
    public function setIdCar(?int $id_car): self
    {
        $this->id_car = $id_car;

        return $this;
    }

    /**
     * Get the value of brand
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * Set the value of brand
     */
    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get the value of model
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * Set the value of model
     */
    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     */
    public function setCreatedAt(string $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of year
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * Set the value of year
     */
    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the value of mileage
     */
    public function getMileage(): string
    {
        return $this->mileage;
    }

    /**
     * Set the value of mileage
     */
    public function setMileage(string $mileage): self
    {
        $this->mileage = $mileage;

        return $this;
    }

    /**
     * Get the value of energy
     */
    public function getEnergy(): string
    {
        return $this->energy;
    }

    /**
     * Set the value of energy
     */
    public function setEnergy(string $energy): self
    {
        $this->energy = $energy;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * Set the value of price
     */
    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of transmission
     */
    public function getTransmission(): string
    {
        return $this->transmission;
    }

    /**
     * Set the value of transmission
     */
    public function setTransmission(string $transmission): self
    {
        $this->transmission = $transmission;

        return $this;
    }

    /**
     * Get the value of color
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * Set the value of color
     */
    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of door_number
     */
    public function getDoorNumber(): int
    {
        return $this->door_number;
    }

    /**
     * Set the value of door_number
     */
    public function setDoorNumber(int $door_number): self
    {
        $this->door_number = $door_number;

        return $this;
    }

    /**
     * Get the value of fiscal_power
     */
    public function getFiscalPower(): string
    {
        return $this->fiscal_power;
    }

    /**
     * Set the value of fiscal_power
     */
    public function setFiscalPower(string $fiscal_power): self
    {
        $this->fiscal_power = $fiscal_power;

        return $this;
    }

    /**
     * Get the value of interior_equipments
     */
    public function getInteriorEquipments(): string
    {
        return $this->interior_equipments;
    }

    /**
     * Set the value of interior_equipments
     */
    public function setInteriorEquipments(string $interior_equipments): self
    {
        $this->interior_equipments = $interior_equipments;

        return $this;
    }

    /**
     * Get the value of exterior_equipments
     */
    public function getExteriorEquipments(): string
    {
        return $this->exterior_equipments;
    }

    /**
     * Set the value of exterior_equipments
     */
    public function setExteriorEquipments(string $exterior_equipments): self
    {
        $this->exterior_equipments = $exterior_equipments;

        return $this;
    }

    /**
     * Get the value of security_equipments
     */
    public function getSecurityEquipments(): string
    {
        return $this->security_equipments;
    }

    /**
     * Set the value of security_equipments
     */
    public function setSecurityEquipments(string $security_equipments): self
    {
        $this->security_equipments = $security_equipments;

        return $this;
    }

    /**
     * Get the value of others_equipments
     */
    public function getOthersEquipments(): string
    {
        return $this->others_equipments;
    }

    /**
     * Set the value of others_equipments
     */
    public function setOthersEquipments(string $others_equipments): self
    {
        $this->others_equipments = $others_equipments;

        return $this;
    }

    /**
     * Get the value of picture
     */
    public function getPicture(): ?string
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     */
    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
}