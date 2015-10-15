<?php
/**
 * Description of Items
 *
 * @author Daniel
 */
class Items 
{
    /**
     * Array of the object model/Item
     * @var array $items
     */
    private $items;
    /**
     * Set $items
     * @param Item[] $items
     */
    public function __construct($items = array()) 
    {
        $this->items = $items;
        if(count($items) == 0)
        {
           /*
           * temporary data
           */
           $item1 = new Item("sports", "fotball, basket, tennis");
           $item2 = new Item("games", "lol, cs, dota, fifa");
           $itemArr = array($item1, $item2);
           $this->items = $itemArr;
        }
    }
    /**
     * 
     * @return Item[] items
     */
    public function getItems()
    {
        return $this->items;
    }
}
