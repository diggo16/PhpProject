<?php
/**
 * Description of Items
 *
 * @author Daniel
 */
class Items 
{
    /**
     * Static array of the object model/Item
     * @var array $items
     */
    private static $items;
    /**
     * Set $items
     * @param Item[] $items
     */
    public function __construct($items = array()) 
    {
        $this->setItems($items);
    }
    /**
     * 
     * @return Item[] items
     */
    public function getItems()
    {
        return self::$items;
    }
    /**
     * Set the items to the array $items
     * @param array $items
     */
    public function setItems($items)
    {
       self::$items = $items; 
    }
    /**
     * Return an item if one is clicked
     * @return Item $item
     */
    public function getClickedItem()
    {
        foreach (self::$items as $item) 
        {
            return $item;
        }
    }
    /**
     * Set the item with the title $title to clicked
     * @param string $title
     */
    public function setClickedItem($title)
    {
        foreach (self::$items as $item) 
        {
            if($item->getTitle() == $title)
            {
                $item->setIsClicked(TRUE);
            }  
        }
        
    }
    /**
     * Set all items to not clicked
     */
    public function resetItemClicks()
    {
       foreach (self::$items as $item) 
        {
            $item->setIsClicked(FALSE);
        } 
    }
}
