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
        if($this->checkTitleTooShort($item->getTitle()))
        {
            return 1;
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
        if(strlen($title) < 3)
        {
            return true;
        }
        return false;
    }
}
