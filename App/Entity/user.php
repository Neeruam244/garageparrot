<?php 

namespace App\Entity;

class user 
{
    protected ?int $id_user = null;
    protected string $last_name;
    protected string $first_name;
    protected string $email;
    protected string $password_hash;
    protected string $role;




    /**
     * Get the value of id_user
     */
    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     */
    public function setIdUser(?int $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of last_name
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     */
    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of first_name
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     */
    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password_hash
     */
    public function getPasswordHash(): string
    {
        return $this->password_hash;
    }

    /**
     * Set the value of password_hash
     */
    public function setPasswordHash(string $password_hash): self
    {
        $this->password_hash = $password_hash;

        return $this;
    }

    /**
     * Get the value of role
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * Set the value of role
     */
    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }
}