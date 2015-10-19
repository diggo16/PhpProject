<?php
/**
 * An object that contains text and information about it
 *
 * @author Daniel
 */
class Item 
{
    /**
     * The item's title
     * @var string $title
     */
    private $title;
    /**
     * The item's text
     * @var string $text
     */
    private $text;
    /**
     *
     * @var boolean $isClicked 
     */
    private $isClicked;
    /**
     * Author to the text
     * @var string $author
     */
    private $author;
    /**
     * An unique id to identify the item
     * @var string $uniqueID
     */
    private $uniqueID;
    /**
     * Set objects
     * @param type $title
     * @param type $author
     * @param type $text
     * @param type $uniqueID
     */
    public function __construct($title = null, $author = null, $text = null, $uniqueID = null) 
    {
        $this->title = $title;
        $this->text = $text;
        $this->author = $author;
        $this->isClicked = false;
        $this->uniqueID = $uniqueID;
    }
    /**
     * Return the title
     * @return string title
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * Return the text
     * @return string text
     */
    public function getText()
    {
        return $this->text;
    }
    /**
     * Return the author
     * @return string $author
     */
    public function getAuthor()
    {
        return $this->author;
    }
    /**
     * Set if the item is clicked to true or false
     * @param boolean $isClicked
     */
    public function setIsClicked($isClicked)
    {
        $this->isClicked = $isClicked;
    }
    /**
     * Return true if the item is clicked else false
     * @return boolean isClicked
     */
    public function getIsClicked()
    {
        return $this->isClicked;
    }
    /**
     * Return the unique id of the item
     * @return string $uniqueID
     */
    public function getUniqueID()
    {
        return $this->uniqueID;
    }
    /**
     * Set unique id to $id
     * @param string $id
     */
    public function setUniqueID($id)
    {
        $this->uniqueID = $id;
    }
    /**
     * Return true if the strings are the same else false
     * @param string $anotherID
     * @return boolean isSame
     */
    public function compareUniqueID($anotherID)
    {
        if(strcmp($this->uniqueID, $anotherID) == 0)
        {
            return true;
        }
        return false;
    }
    /**
     * Return true if the item haven't any information else return false
     * @return boolean isEmpty
     */
    public function isEmpty()
    {
        if($this->title == null && $this->author == null && $this->text == null)
        {
            return true;
        }
        return false;
    }
}
