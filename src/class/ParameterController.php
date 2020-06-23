<?php

class ParameterController
{
    private $_file = "index.php";
    private $_params = [];

    function __construct(array $params = null)
    {
        $this->_params = $params;

    }

    function getHyperlink() : string
    {
        // $html = $this->_file; 
        // $html .= (empty($this->_params) ? "" : "?");
        // $html .= $this->_createQueryString();
        // print_r($html);
        // echo $html;
        return $this->_file . (empty($this->_params) ? "" : "?" . $this->_createQueryString());
//        return $html;
    }

    private function _createQueryString() : string
    {
        $result ="";

        foreach ($this->_params as $key => $value)
        {
            $result .= (empty($result) ? "" : "&") . $key . "=" . $value;
        }
        return $result;
    }
}
?>