<?php


namespace Unit\Domain\Entity;


use Core\Domain\Entity\Category;
use Core\Domain\Exception\EntityValidationException;
use PHPUnit\Framework\TestCase;
use Throwable;

class CategoryUniTest extends TestCase
{

    public function testAttibutes()
    {
        $category = new Category(
            'New Cat',
            'sdtfs',
            'New desc',
            true
        );

        $this->assertEquals('sdtfs',$category->name);
        $this->assertEquals('New desc', $category->description);
        $this->assertTrue($category->isActive);

    }

    public function testActivated()
    {
        $category = new Category(
            name: 'stuffs',
            isActive: false
        );

        $this->assertFalse($category->isActive);
        $category->activate();
        $this->assertTrue($category->isActive);


    }

    public function testDesabled()
    {
        $category = new Category(
            name: 'stuffs',
        );

        $this->assertTrue($category->isActive);
        $category->desable();
        $this->assertFalse($category->isActive);

    }

    public function testUpdate()
    {
        $uuid = 'uuid.value';

        $category = new Category(
            id: $uuid,
            name: 'stuffs',
            description: 'desc',
            isActive: true
        );

        $category->update(
            name: 'new_name',
            description: 'new_desc',
        );

        $this->assertEquals('new_name', $category->name);
        $this->assertEquals('new_desc', $category->description);
    }

    public function testUpdateIssetDesc()
    {
        $uuid = 'uuid.value';

        $category = new Category(
            id: $uuid,
            name: 'stuffs',
            description: 'desc',
            isActive: true
        );

        $category->update(
            name: 'new_name'
        );

        $this->assertEquals('new_name', $category->name);
        $this->assertEquals('desc', $category->description);
    }

    public function testException()
    {
        try {

            $category = new Category(
                name: '',
                description: 'desc',
            );

            $this->assertTrue(false);
        }catch (Throwable $e){
            $this->assertInstanceOf(EntityValidationException::class,$e);
        }

    }

}