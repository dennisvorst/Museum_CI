<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ButtonToolBarTest extends TestCase
{
    function testClassButtonToolBarExists()
    {
        $this->assertTrue(class_exists("ButtonToolBar"));
    }

    function testFirstParameterIsMandatory()
    {
        /** we expect an exception */
        $this->expectException(InvalidArgumentException::class);

        $object = new ButtonToolBar([], "");
    }

    function testListOfDisplayValuesCannotBeEmpty()
    {
        /** we expect an exception */
        $this->expectException(InvalidArgumentException::class);

        $object = new ButtonToolBar([], "someValue");
    }

    function testSelectedValueCanBeEmpty()
    {
        $object = new ButtonToolBar(["A", "B"], "");
        $result = $object->getSelectedValue();
        $this->assertEmpty($result);
    }

    function testSelectedValueIsDisabled()
    {
        $object = new ButtonToolBar(["A"], "A");
        $result = $object->show();
        $this->assertStringContainsString('disabled', $result);
    }

    function testUnselectedValueIsEnabled()
    {
        $object = new ButtonToolBar(["A"], "B");
        $result = $object->show();
        $this->assertStringContainsString('enabled', $result);
    }

}
?>

