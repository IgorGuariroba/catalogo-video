<?php


namespace Core\Domain\Traits;


use Exception;

trait MethodsMagicsTrait
{
    /**
     * @throws Exception
     */
    public function __get(string $property)
    {
        if(isset($this->{$property})){
            return $this->{$property};
        }

        $className = get_class($this);
        throw new Exception("Property {$property} not found is class {$className}");
    }

}