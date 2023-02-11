<?php


namespace Core\Domain\Validation;


use Core\Domain\Exception\EntityValidationException;

class DomainValidation
{

    public static function notNull(string $value, string $exceptMessage = null)
    {
        if (empty($value)) {
            throw new EntityValidationException($exceptMessage ?? 'should not empty');
        }
    }

    public static function strMaxLength(string $value, int $length = 255, string $exceptMessage = null)
    {
        if (strlen($value) > $length) {
            throw new EntityValidationException(
                $exceptMessage ?? "the value must not be grater than $length characters"
            );
        }
    }

    public static function strMinLength(string $value, int $length = 2, string $exceptMessage = null)
    {
        if (strlen($value) < $length) {
            throw new EntityValidationException(
                $exceptMessage ?? "the value must not be grater than $length characters"
            );
        }
    }

    public static function strCanNullAndMaxLength(string $value = '', int $length = 255, string $exceptMessage = null)
    {
        if (!empty($value) && strlen($value) > $length) {
            throw new EntityValidationException(
                $exceptMessage ?? "the value must not be grater than $length characters"
            );
        }
    }
}