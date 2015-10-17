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
    
    private static $authorMinLength = 2;
    private static $authorMaxLength = 26;
    
    private static $textMinLength = 8;
    public function __construct() 
    {
       
    }
    public function checkItem(Item $item)
    {
        $title = $item->getTitle();
        $author = $item->getAuthor();
        $text = $item->getText();
        if($this->checkTitleTooShort($title))
        {
            return 1;
        }
        else if($this->checkTitleTooLong($title))
        {
            return 2;
        }
        else if($this->checkAuthorTooShort($author))
        {
            return 3;
        }
        else if($this->checkAuthorTooLong($author))
        {
            return 4;
        }
        else if($this->checkTextTooShort($text))
        {
            return 5;
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
        return $this->checkTooShort($title, self::$titleMinLength);     
    }
    private function checkTitleTooLong($title)
    {
       return $this->checkTooLong($title, self::$titleMaxLength);
    }
    private function checkAuthorTooShort($author)
    {
        return $this->checkTooShort($author, self::$authorMinLength);     
    }
    private function checkAuthorTooLong($author)
    {
        return $this->checkTooLong($author, self::$authorMaxLength);     
    }
    private function checkTextTooShort($text)
    {
        return $this->checkTooShort($text, self::$textMinLength);     
    }
    private function checkTooLong($string, $length)
    {
        if(strlen($string) >= $length)
        {
            return true;
        }
        return false; 
    }
     private function checkTooShort($string, $length)
    {
        if(strlen($string) <= $length)
        {
            return true;
        }
        return false; 
    }
    public function trimString(&$str)
    {
        $str = filter_var(trim($str), FILTER_SANITIZE_STRING);
    }
}
