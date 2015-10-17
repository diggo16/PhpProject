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
            default:
            {
                break;
            }       
        }
        return $message;
    }
    private function getTitleTooShort()
    {
        return "Title must be minimum 3 characters";
    }
}
