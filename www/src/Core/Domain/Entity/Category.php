<?php


namespace Core\Domain\Entity;


use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Traits\MethodsMagicsTrait;
use Core\Domain\Validation\DomainValidation;
use Core\Domain\ValueObject\Uuid;

class Category
{
    use MethodsMagicsTrait;

    public function __construct(
        protected Uuid | string $id = '',
        protected string $name ='',
        protected string $description = '',
        protected bool $isActive = true
    )
    {
        $this->id = $this->id ? new Uuid($this->id) : Uuid::random();
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
        DomainValidation::notNull($this->name);
        DomainValidation::strMaxLength($this->name);
        DomainValidation::strMinLength($this->name);
        DomainValidation::strCanNullAndMaxLength($this->description);
        DomainValidation::strMinLength($this->name);
    }

}