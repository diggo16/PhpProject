<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RandomString
 *
 * @author Daniel
 */
class RandomString 
{
    /**
     * Generate a random secure hashcode of a random number and the title
     * @param string $title
     * @return string randomString
     */
    public function generateUniqueID($title)
    {
        $salt = uniqid(mt_rand(), true);
        return sha1($title + $salt); 
    }
}
