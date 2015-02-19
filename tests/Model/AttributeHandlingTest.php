<?php namespace Model;

use Packedge\Mongorm\Model;

class Kiwi extends Model {}

class AttributeHandlingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Kiwi
     */
    protected $model;

    public function setUp()
    {
        $this->model = new Kiwi;
    }

    /** @test */
    public function it_can_set_an_attribute_value()
    {
        $this->model->setAttribute('name', 'John');
        $this->assertArrayHasKey('name', $this->model->getAttributes());
        $this->assertSame('John', $this->model->getAttributes()['name']);
    }

    /** @test */
    public function it_can_set_an_attribute_value_via_magic_methods()
    {
        $this->model->age = 27;
        $this->assertArrayHasKey('age', $this->model->getAttributes());
        $this->assertSame(27, $this->model->getAttributes()['age']);
    }

    // TODO: set via array access

    /** @test */
    public function it_can_get_an_attribute_value()
    {
        $this->model->setAttribute('name', 'Dave');
        $this->assertSame('Dave', $this->model->getAttribute('name'));
    }

    /** @test */
    public function it_can_get_an_attribute_via_magic_methods()
    {
        $this->model->setAttribute('age', 22);
        $this->assertSame(22, $this->model->age);
    }

    // TODO: get via array access

    /** @test */
    public function it_returns_null_for_non_existent_attribute()
    {
        $this->assertNull($this->model->getAttribute('eye_colour'));
        $this->assertNull($this->model->eye_colour);
        // TODO: get via array access
    }
}
 