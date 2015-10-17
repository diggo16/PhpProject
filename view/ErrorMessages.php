<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ErrorMessages
 *
 * @author Daniel
 */
class ErrorMessages 
{
    private static $title = "title";
    private static $author = "author";
    private static $text = "text";
    
    public function getErrorInLoadingItems()
    {
        return "Error in loading the items";
    }
    public function getCreatedItemMesssage()
    {
        return "Created item!";
    }
    public function getMessageByNumber($number)
    {
        $message = "";
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
            default:
            {
                break;
            }       
        }
        return $message;
    }
    private function getTitleTooShort()
    {
        return $this->tooShort(self::$title, "3");
    }
    private function getTitleTooLong()
    {
        return $this->tooLong(self::$title, "26");
    }
    private function getAuthorTooShort()
    {
        return $this->tooShort(self::$author, "2");
    }
    private function getAuthorTooLong()
    {
        return $this->tooLong(self::$author, "26");
    }
    private function getTextTooShort()
    {
        return $this->tooShort(self::$text, "8");
    }
    private function tooShort($name, $value)
    {
        return $name . " must be minimum " . $value . " characters";
    }
    private function tooLong($name, $value)
    {
        return $name . " must be maximum " . $value . " characters";
    }
}
