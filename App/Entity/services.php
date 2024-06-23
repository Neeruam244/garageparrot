<?php 

namespace App\Entity;

class Services 
{
    protected ?int $id_service = null;
    protected string $title = '';
    protected string $text_presentation = '';
    protected string $list = '';
    protected string $picture = '';

    

    /**
     * Get the value of id_service
     */
    public function getIdService(): ?int
    {
        return $this->id_service;
    }

    /**
     * Set the value of id_service
     */
    public function setIdService(?int $id_service): self
    {
        $this->id_service = $id_service;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of text_presentation
     */
    public function getTextPresentation(): string
    {
        return $this->text_presentation;
    }

    /**
     * Set the value of text_presentation
     */
    public function setTextPresentation(string $text_presentation): self
    {
        $this->text_presentation = $text_presentation;

        return $this;
    }

    /**
     * Get the value of list
     */
    public function getList(): string
    {
        return $this->list;
    }

    /**
     * Set the value of list
     */
    public function setList(string $list): self
    {
        $this->list = $list;

        return $this;
    }

    /**
     * Get the value of picture
     */
    public function getPicture(): string
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     */
    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
}