<?php


namespace Core\Domain\Entity;


use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Traits\MethodsMagicsTrait;

class Category
{
    use MethodsMagicsTrait;

    public function __construct(
        protected string $id ='',
        protected string $name ='',
        protected string $description = '',
        protected bool $isActive = true
    )
    {
        $this->validate();

    }

    public function activate(): void
    {
        $this->isActive = true;
    }

    public function desable(): void
    {
        $this->isActive = false;
    }

    public function update(string $name, string $description = null)
    {
        $this->validate();

        $this->name = $name;
        $this->description = $description ?? $this->description;
    }

    public function validate()
    {
        if(empty($this->name)){
            throw new EntityValidationException("Nome informado não preenche os requisitos");
        }

        if(strlen($this->name) >= 255 || strlen($this->name) <= 2){
            throw new EntityValidationException("A descrição não preenche os requisitos");
        }

        if(!empty($this->description) && (strlen($this->description) >= 255 || strlen($this->description) <= 5)){
            throw new EntityValidationException("A descrição não preenche os requisitos");
        }

    }

}