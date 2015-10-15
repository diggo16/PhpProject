<?php
/**
 * Description of Item
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
     * Set the title and text
     * @param string $title
     * @param string $text
     */
    public function __construct($title, $author, $text) 
    {
        $this->title = $title;
        $this->text = $text;
        $this->author = $author;
        $this->isClicked = false;
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
}
