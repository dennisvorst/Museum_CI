<?php

require_once "ButtonToolBar.php";

class ButtonToolBarAlphabet extends ButtonToolBar
{

    function __construct(iItemCollection $itemCollection, array $selectedValues)
    {
        /**
         * $displayValues - the values to be displayed 
         * $selectedValue - the value that was selected 
         * $queryString - the values that need to be added to the hyperlinks of the selected values
         */
        parent::__construct($itemCollection, $selectedValue);
        $this->_itemCount = 27;
    }
}
