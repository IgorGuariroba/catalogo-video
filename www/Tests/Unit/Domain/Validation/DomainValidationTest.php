<?php


namespace Unit\Domain\Validation;


use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Validation\DomainValidation;
use PHPUnit\Framework\TestCase;
use Throwable;

class DomainValidationTest extends TestCase
{
    public function testNotNull()
    {
        try {
            DomainValidation::notNull('');
            $this->assertTrue(false);
        }catch ( Throwable $e){
            $this->assertInstanceOf(EntityValidationException::class,$e);
        }

    }

    public function testNotNullCustomMessageException()
    {
        try {

            DomainValidation::notNull('','custom message exception');
            $this->assertTrue(false);
        }catch ( Throwable $e){
            $this->assertInstanceOf(EntityValidationException::class,$e,'custom message exception');
        }

    }

    public function testStrMaxLength()
    {
        try {

            DomainValidation::strMaxLength('Teste',4,'custom message');
            $this->assertTrue(false);
        }catch ( Throwable $e){
            $this->assertInstanceOf(EntityValidationException::class,$e,'custom message');
        }

    }

    public function testStrMinLength()
    {
        try {
            DomainValidation::strMinLength('Teste',6,'custom message');
            $this->assertTrue(false);
        }catch ( Throwable $e){
            $this->assertInstanceOf(EntityValidationException::class,$e,'custom message');
        }

    }

    public function testStrNullMaxLength()
    {
        try {
            DomainValidation::strCanNullAndMaxLength('Teste',3,'custom message');
            $this->assertTrue(false);
        }catch ( Throwable $e){
            $this->assertInstanceOf(EntityValidationException::class,$e,'custom message');
        }

    }
}