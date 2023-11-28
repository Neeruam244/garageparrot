<?php 

namespace App\Entity;

class Opinion
{
    protected ?int $id_opinion = null;
    protected string $client_name;
    protected string $opinion;
    protected string $note;

    

    /**
     * Get the value of id_opinion
     */
    public function getIdOpinion(): ?int
    {
        return $this->id_opinion;
    }

    /**
     * Set the value of id_opinion
     */
    public function setIdOpinion(?int $id_opinion): self
    {
        $this->id_opinion = $id_opinion;

        return $this;
    }

    /**
     * Get the value of client_name
     */
    public function getClientName(): string
    {
        return $this->client_name;
    }

    /**
     * Set the value of client_name
     */
    public function setClientName(string $client_name): self
    {
        $this->client_name = $client_name;

        return $this;
    }

    /**
     * Get the value of opinion
     */
    public function getOpinion(): string
    {
        return $this->opinion;
    }

    /**
     * Set the value of opinion
     */
    public function setOpinion(string $opinion): self
    {
        $this->opinion = $opinion;

        return $this;
    }

    /**
     * Get the value of note
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * Set the value of note
     */
    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
    }
}