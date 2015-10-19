<?php
/**
 * Create a random string
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
