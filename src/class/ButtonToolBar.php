<?php
class ButtonToolBar
{
    private $_displayValues = [];
    private $_selectedValue;

    function __construct(array $displayValues, string $selectedValue = null)
    {
        if (empty($displayValues)) 
        {
            throw new InvalidArgumentException("ButtonToolBar:__construct : Parameter displayValues is mandatory.");
        }
        $this->_displayValues = $displayValues;
        $this->_selectedValue = $selectedValue;
    }

    function show()
    {
        return "
            <div class=\"btn-toolbar\" role=\"toolbar\">
                <div class=\"btn-group\" role=\"group\">
                    {$this->_createButtons()}
                </div>
            </div>
        ";
    }

    private function _createButtons() : string
    {
        $html = "";
        foreach ($this->_displayValues as $displayValue) 
        {
            /** if the valuie was selected make it disabled, so we can't select it again. */
            if ($displayValue == $this->_selectedValue)
            {
                $html .= "<button type=\"button\" class=\"btn btn-secondary\" disabled>{$displayValue}</button>\n";
            } else {
                $html .= "<button type=\"button\" class=\"btn btn-secondary\" enabled>{$displayValue}</button>\n";
            }
        }
        return $html;
    }

    function getSelectedValue() : string 
    {
        return $this->_selectedValue;
    }
    function getDisplayValues() : string 
    {
        return $this->_displayuValues;
    }
}