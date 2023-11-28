<?php 

namespace App\Entity;

class Publish_Opinion
{
    protected ?int $id_publish = null;
    protected string $client_name;
    protected string $opinion;
    protected string $note;

    

    /**
     * Get the value of id_publish
     */
    public function getIdPublish(): ?int
    {
        return $this->id_publish;
    }

    /**
     * Set the value of id_publish
     */
    public function setIdPublish(?int $id_publish): self
    {
        $this->id_publish = $id_publish;

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