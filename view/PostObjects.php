<?php
/**
 * Handles POST objects
 *
 * @author Daniel
 */
class PostObjects 
{
    /**
     * Check if the button is pushed
     * @param string $buttonName
     * @return boolean
     */
    public function isButtonPushed($buttonName) 
    {
        if(isset($_POST[$buttonName]))
        {
            return true;
        }
        return false;
    }
    /**
     * Return the string on the POST $POSTName
     * @param string $POSTName
     * @return string $_POST[$POSTName]
     */
    public function getString($POSTName)
    {
        if(isset($_POST[$POSTName]))
        {
            return filter_input(INPUT_POST,$POSTName,FILTER_SANITIZE_STRING);
        }
        return "";
        
    }
    /**
     * Return the string from POST with the name $POSTName 
     * without filtering the string first
     * @param string $POSTName
     * @return string postString
     */
    public function getStringWithoutFilter($POSTName)
    {
        return $_POST[$POSTName];
    }
    public function setString($name, $string)
    {
        $_POST[$name] = $string;
    }
}
