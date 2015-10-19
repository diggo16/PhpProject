<?php
/**
 * Handles GET objects
 *
 * @author Daniel
 */
class GetObjects 
{
    /**
     * If the GET object is set, return it
     * @param string $name
     * @return string
     */
    public function getObject($name)
    {
        // if the object is set
        if(isset($_GET[$name]))
        {
             $object = $_GET[$name];
            return $object; //htmlentities($object);
        }
      return null;
    }
    /**
     * Set the GET object $name to $value
     * @param string $name
     * @param string $value
     */
    public function setObject($name, $value)
    {
        $_GET[$name] = $value;
    }
    /**
     * Return true if the GET object $name is set
     * @param string $name
     * @return boolean isset
     */
    public function isGetSet($name)
    {
        if(isset($_GET[$name]))
        {
            return true;
        }
        return false;
    }
}
