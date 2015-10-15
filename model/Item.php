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
     * Set the title and text
     * @param string $title
     * @param string $text
     */
    public function __construct($title, $text) 
    {
        $this->title = $title;
        $this->text = $text;
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
}
