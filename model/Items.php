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
     * Set the item with the unique id $uniqueID to clicked
     * @param string $uniqueID
     */
    public function setClickedItem($uniqueID)
    {
        foreach (self::$items as $item) 
        {
            if($item->compareUniqueID($uniqueID))
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
    public function isUniqueIDTaken($uniqueID)
    {
        foreach (self::$items as $item) 
        {
            if($item->compareUniqueID($uniqueID))
            {
                return true;
            }
        }
        return false;
    }
}
