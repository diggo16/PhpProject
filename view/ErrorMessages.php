<?php
/**
 * Handles error messages
 *
 * @author Daniel
 */
class ErrorMessages 
{
    /*
     * Strings
     */
    private static $title = "title";
    private static $author = "author";
    private static $text = "text";
    /**
     * Return error in loading items message
     * @return string ErrorInLoadingItems
     */
    public function getErrorInLoadingItems()
    {
        return "Error in loading the items";
    }
    /**
     * Return created item message
     * @return string CreatedItemMesssage
     */
    public function getCreatedItemMesssage()
    {
        return "Created item!";
    }
    /**
     * Get the correct errorMessage depending on the number
     * @param int $number
     * @return string errorMessage
     */
    public function getMessageByNumber($number)
    {
        $message = "";
        /*
         * Check which message that should be returned
         */
        switch ($number) 
        {
            case 1:
            {
                $message = $this->getTitleTooShort();
                break;
            }
            case 2:
            {
                $message = $this->getTitleTooLong();
                break;
            }
            case 3:
            {
                $message = $this->getAuthorTooShort();
                break;
            }
            case 4:
            {
                $message = $this->getAuthorTooLong();
                break;
            }
            case 5:
            {
                $message = $this->getTextTooShort();
                break;
            }
            case 6:
            {
                $message = $this->getTextTooLong();
                break;
            }
            default:
            {
                break;
            }       
        }
        return $message;
    }
    /**
     * Return message title too short
     * @return string titleTooShort
     */
    private function getTitleTooShort()
    {
        return $this->tooShort(self::$title, "3");
    }
    /**
     * Return message title too long
     * @return string titleTooLong
     */
    private function getTitleTooLong()
    {
        return $this->tooLong(self::$title, "26");
    }
    /**
     * Return message author too short
     * @return string authorTooShort
     */
    private function getAuthorTooShort()
    {
        return $this->tooShort(self::$author, "2");
    }
    /**
     * Return message author too long
     * @return string authorTooLong
     */
    private function getAuthorTooLong()
    {
        return $this->tooLong(self::$author, "26");
    }
    /**
     * Return message text too short
     * @return string textTooShort
     */
    private function getTextTooShort()
    {
        return $this->tooShort(self::$text, "8");
    }
    /**
     * Return message text too long
     * @return string textTooLong
     */
    private function getTextTooLong()
    {
        return $this->tooLong(self::$text, "360");
    }
    /**
     * Return a string that $name must be minimum $value characters
     * @param string $name
     * @param int $value
     * @return string tooShort
     */
    private function tooShort($name, $value)
    {
        return $name . " must be minimum " . $value . " characters";
    }
    /**
     * Return a string that $name must be maximum $value characters
     * @param string $name
     * @param int $value
     * @return string tooLong
     */
    private function tooLong($name, $value)
    {
        return $name . " must be maximum " . $value . " characters";
    }
}
