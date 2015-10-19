<?php
/**
 * View of the item list
 *
 * @author Daniel
 */
class ItemListView 
{
    /**
     * Variable of the object model/Items
     * @var Items $items
     */
    private $items;
    /**
     *
     * @var GetObjects $get 
     */
    private $get;
    /**
     *
     * @var string $itemName 
     */
    private static $itemName = "itemID";
    /**
     * Set $items
     * @param Items $items
     */
    public function __construct(Items $items) 
    {
        $this->setItems($items);
        $this->get = new GetObjects();
    }
    /**
     * Return a table with the items
     * @return string htmlTable
     */
    public function getTableOutput()
    {
        $table = '<table style="width:100%">';
        // add a row to the table
        if($this->items->getItems() != 0)
        {
            foreach ($this->items->getItems() as $item) 
            {
                $uniqueID = $item->getUniqueID();
                $title = $item->getTitle();
                $table .= '<tr>
                            <td> <a href="?' . self::$itemName . '=' . $uniqueID . '">' . $title . '</a></td>
                           </tr>';
            }
            $table .= '</table>';
        }       
        return $table; 
    }
    /**
     * Return the item name
     * @return string itemName
     */
    public function getItemName()
    {
        return self::$itemName;
    }
    /**
     * Set the items
     * @param Items $items
     */
    public function setItems(Items $items)
    {
        $this->items = $items;
    }
    /**
     * Check if any item is viewed
     * @return boolean isItemViewed
     */
    public function isItemViewed()
    {
        if($this->get->isGetSet(self::$itemName))
        {
            return true;
        }
        return false;
    }
}
