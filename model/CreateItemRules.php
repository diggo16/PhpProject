<?php
/**
 * A class that validates an item
 *
 * @author Daniel
 */
class CreateItemRules 
{
    /**
     * Minimum length on the title
     * @var int $titleMinLength 
     */
    private static $titleMinLength = 3;
    /**
     * Maximum length on the title
     * @var int $titleMaxLength 
     */
    private static $titleMaxLength = 60;
    /**
     * Minimum length on the author
     * @var int $authorMinLength 
     */
    private static $authorMinLength = 2;
    /**
     * Maximum length on the author
     * @var int $authorMaxLength 
     */
    private static $authorMaxLength = 26;
    /**
     * Minimum length on the text
     * @var int $textMinLength 
     */
    private static $textMinLength = 8;
    /**
     * Maximum length on the text
     * @var int $textMaxLength 
     */
    private static $textMaxLength = 10000;
    /**
     * Return a number that represent an error, if everything is correct return 0
     * @param Item $item
     * @return int errorCode
     */
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
        else if($this->checkTextTooLong($text))
        {
            return 6;
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
    /**
     * Check if the title is too long
     * @param string $title
     * @return boolean isTooLong
     */
    private function checkTitleTooLong($title)
    {
       return $this->checkTooLong($title, self::$titleMaxLength);
    }
    /**
     * Check if the author is too short
     * @param string $author
     * @return boolean isTooShort
     */
    private function checkAuthorTooShort($author)
    {
        return $this->checkTooShort($author, self::$authorMinLength);     
    }
    /**
     * Check if the author is too long
     * @param string $author
     * @return boolean isTooLong
     */
    private function checkAuthorTooLong($author)
    {
        return $this->checkTooLong($author, self::$authorMaxLength);     
    }
    /**
     * Check if the text is too short
     * @param string $text
     * @return boolean isTooShort
     */
    private function checkTextTooShort($text)
    {
        return $this->checkTooShort($text, self::$textMinLength);     
    }
    /**
     * Check if the text is too long
     * @param string $text
     * @return boolean isTooLong
     */
    private function checkTextTooLong($text)
    {
       return $this->checkTooLong($text, self::$textMaxLength);     
    }
    /**
     * Check if the string length is longer than the in
     * @param string $string
     * @param int $length
     * @return boolean tooLong
     */
    private function checkTooLong($string, $length)
    {
        if(strlen($string) >= $length)
        {
            return true;
        }
        return false; 
    }
    /**
     * Check if the string length is shorter than the int
     * @param string $string
     * @param int $length
     * @return boolean tooShort
     */
    private function checkTooShort($string, $length)
    {
        if(strlen($string) <= $length)
        {
            return true;
        }
        return false; 
    }
}
