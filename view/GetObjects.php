<?php
/**
 * Description of GetObjects
 *
 * @author Daniel
 */
class GetObjects 
{
    public function __construct() 
    {
        
    }
    public function getObject($name)
    {
       $object = $_GET[$name];
       return $object;
    }
    public function setObject($name, $value)
    {
        $_GET[$name] = $value;
    }
    public function isGetSet($name)
    {
        if(isset($_GET[$name]))
        {
            return true;
        }
        return false;
    }
}
