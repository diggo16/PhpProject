<?php
/**
 * Description of CreateItemRules
 *
 * @author Daniel
 */
class CreateItemRules 
{
    private static $titleMinLength = 3;
    private static $titleMaxLength = 26;
    public function __construct() 
    {
       
    }
    public function checkItem(Item $item)
    {
        $title = $item->getTitle();
        if($this->checkTitleTooShort($title))
        {
            return 1;
        }
        else if($this->checkTitleTooLong($title))
        {
            return 2;
        }
        return 0;
    }
    /**
     * Check if the title is too short
     * @param string $title
     * @return boolean isTooShort
     */
    private function checkTitleTooShort($title)
    {
        if(strlen($title) <= self::$titleMinLength)
        {
            return true;
        }
        return false;
    }
    private function checkTitleTooLong($title)
    {
       if(strlen($title) >= self::$titleMaxLength)
        {
            return true;
        }
        return false; 
    }
}
