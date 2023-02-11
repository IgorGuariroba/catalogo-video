<?php

namespace Unit;

use Core\Tested;
use PHPUnit\Framework\TestCase;

Class TestUnitTest extends TestCase
{
    public function testCallMethodFoo()
    {
        $test = new Tested();

        $response = $test->foo();

        $this->assertEquals('123',$response);

    }

}