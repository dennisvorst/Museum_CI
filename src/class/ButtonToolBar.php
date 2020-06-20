<?php
class ButtonToolBar
{
    protected $_html;
    protected $_itemCount = -1;
    protected $_displayValues = [];
    protected $_selectedValue;

    protected $_firstVisibleMenuItem = 0;
    protected $_first = 0;
    protected $_last;
    protected $_previous;
    protected $_next;

    function __construct(iItemCollection $itemCollection, array $params)
    {
        /**
         * $displayValues - the values to be displayed 
         * $params - the other params such as selected value, landingpage  
         */
        $this->_displayValues = $itemCollection->getMenuBarValues();
        $this->_selectedValue = (array_key_exists('selected', $params) ? $params['selected'] : 0);
        $this->_selectedValue = (empty($this->_selectedValue) ? 0 : array_search ($this->_selectedValue, $this->_displayValues));

        $this->_firstVisibleMenuItem = (array_key_exists('firstVisibleMenuItem', $params) ? $params['firstVisibleMenuItem'] : 0);


                // /** do additional calculation */
                // $this->_first = $this->_displayValues[0];
                // $this->_last = $this->_displayValues[count($this->_displayValues) - $this->_itemCount];;
                // $this->_previous = $this->_displayValues[$this->_firstVisibleMenuItem - $this->_itemCount];
                // $this->_next = $this->_displayValues[$this->_firstVisibleMenuItem + $this->_itemCount];
        
    }

    function show()
    {
        return "
            <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
                <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNavAltMarkup\" aria-controls=\"navbarNavAltMarkup\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>
                <div class=\"collapse navbar-collapse\" id=\"navbarNavAltMarkup\">
                    <div class=\"navbar-nav\">
                        {$this->_showMenuItems()}
                    </div>
                </div>
            </nav>
        ";
    }

    /**
     * show the list of displayitems, but no more than allowed in 
     */
    protected function _showMenuItems() : string
    {
        /** determine begin and end */
        $selected =  $this->_selectedValue;
        $begin = $selected - floor($this->_itemCount / 2);
        $end = $selected + ceil($this->_itemCount / 2);

        /** show all when there is more realestate than the number of displayvalues */
        if (count($this->_displayValues) < $this->_itemCount) 
        {
            $begin = 0;
            $end = count($this->_displayValues);
        } 
        /** if the selected value is closer to the first value than show the first item to the most left  */
        elseif ($begin < 0)
        {
            $begin = 0;
            $end = $this->_itemCount;
        } 
        /** if the selected value is closer to the last value than show the last item to the most right */
        elseif ($end > count($this->_displayValues))
        {
            $begin = count($this->_displayValues) - $this->_itemCount;
            $end = count($this->_displayValues);
        }

        /** chreate the html */
        $html = "";
        if ($begin > 0) 
        {
            $html .= $this->_showBackwardNavigationButtons();
        }
        for ($i = $begin; $i < $end ; $i++)
        {
            $value = $this->_displayValues[$i];
            if ($i == $selected)
            {
                $html .= "<a class=\"nav-item nav-link active\" href=\"#\">{$value} <span class=\"sr-only\">(current)</span></a>\n";
            } 
            else
            {
                $html .= "<a class=\"nav-item nav-link\" href=\"#\">{$value}</a>\n";
            }
        }
        if ($end < count($this->_displayValues)) 
        {
            $html .= $this->_showForwardNavigationButtons();
        }

        return $html;
    }

    /**
     * Show the < and << buttons 
     * 
     */
    protected function _showBackwardNavigationButtons() : string
    {
        $html = "";
        if (count($this->_displayValues) > $this->_itemCount)
        {
            $html .= "<a class=\"nav-item nav-link\" href=\"#\"><<</a>\n";
            $html .= "<a class=\"nav-item nav-link\" href=\"#\"><</a>\n";
        } 
        return $html;
    }

    /**
     * Show the > and >> buttons 
     * 
     */
    protected function _showForwardNavigationButtons() : string
    {
        $html = "";
        if (count($this->_displayValues) > $this->_itemCount)
        {
            $html .= "<a class=\"nav-item nav-link\" href=\"#\">></a>\n";
            $html .= "<a class=\"nav-item nav-link\" href=\"#\">>></a>\n";
        } 
        return $html;
    }
}