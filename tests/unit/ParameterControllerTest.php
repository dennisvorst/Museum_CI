<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ParameterControllerTest extends TestCase
{
    function testClassParameterControllerExists()
    {
        $this->assertTrue(class_exists("ParameterController"));
    }

    function testCanbeInstantiatedWithoutParameters()
    {
        $object = new ParameterController([]);
        $this->assertInstanceOf(ParameterController::class, $object);

        $object = new ParameterController();
        $this->assertInstanceOf(ParameterController::class, $object);
    }

    function testCanbeInstantiatedWithParameters()
    {
        $object = new ParameterController(["class" => "articles"]);
        $this->assertInstanceOf(ParameterController::class, $object);
    }

    function testCanbeInstantiatedOnlyWithKeyValuePairs()
    {
        $object = new ParameterController([1]);
        $this->assertInstanceOf(ParameterController::class, $object);
    }

    function testGeneratesHyperlink()
    {
        $object = new ParameterController(["a" => "orange", "b" => "banana", "c" => "apple"]);
        $result = $object->getHyperlink();
        $expected = "index.php?a=orange&b=banana&c=apple";
        $this->assertEquals($expected, $result);
    }
}
?>

