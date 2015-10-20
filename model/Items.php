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
    private $items;
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
        return $this->items;
    }
    /**
     * Set the items to the array $items
     * @param array $items
     */
    public function setItems($items)
    {        
       $this->items = $items; 
    }
    /**
     * Return an item if one is clicked
     * @return Item $item
     */
    public function getClickedItem()
    {
        foreach ($this->items as $item) 
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
        foreach ($this->items as $item) 
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
       foreach ($this->items as $item) 
        {
            $item->setIsClicked(FALSE);
        } 
    }
    /**
     * Check if the unique ID is taken by another item
     * @param string $uniqueID
     * @return boolean isTaken
     */
    public function isUniqueIDTaken($uniqueID)
    {
        foreach ($this->items as $item) 
        {
            if($item->compareUniqueID($uniqueID))
            {
                return true;
            }
        }
        return false;
    }
    public function removeItem($uniqueID)
    {
        for($i = 0; $i < $this->items; $i++)
        {
            if(!isset($this->items[$i]))
            {
                throw new Exception();
            }
            if($this->items[$i]->compareUniqueID($uniqueID))
            {
                unset($this->items[$i]);
                $this->items = array_values($this->items);
                return;
            }
        }
        throw new Exception();
    }
}
