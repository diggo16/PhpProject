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
        self::$items = $items;
    }
    /**
     * 
     * @return Item[] items
     */
    public function getItems()
    {
        return self::$items;
    }
    public function getClickedItem()
    {
        foreach (self::$items as $item) 
        {
            return $item;
        }
    }
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
    public function resetItemClicks()
    {
       foreach (self::$items as $item) 
        {
            $item->setIsClicked(FALSE);
        } 
    }
}
