<?php

require_once "ButtonToolBar.php";

class ButtonToolBarYear extends ButtonToolBar
{
    function __construct(iItemCollection $itemCollection, array $selectedValues = null)
    {
        /**
         * $displayValues - the values to be displayed, eiter years (1901, 1902 ...) or alphabet (A, B, C ...) 
         * $selectedValue - the value that was selected 
         * $queryString - the values that need to be added to the hyperlinks of the selected values
         */
        parent::__construct($itemCollection, $selectedValues);
        $this->_itemCount = 13;
    }
}
