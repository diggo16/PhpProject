<?php
/**
 * View of the item list
 *
 * @author Daniel
 */
class ItemListView 
{
    /**
     *
     * @var string $itemName 
     */
    private static $itemName = "itemID";
    private static $sortLastAdded = "sort::lastAdded";
    private static $sortName = "sort::name";
    private static $formSort = "formSort";
    private static $sortButton = "sortButton";
    public function __construct() 
    {
        
    }
    /**
     * Return a table with the items
     * @return string htmlTable
     */
    public function getTableOutput($items)
    {
        $table = '<p><b>Added</b>   <b>Title</b></p>
            <table style="width:10%; ">
                 <tr>
                 <td>
                 <select name="' . self::$formSort . '">
                   <option value=""></option>
                   <option value="' . self::$sortLastAdded . '">Last added</option>
                   <option value="' . self::$sortName . '">Name</option>
                 </select>
                 </td>
                 <td style="text-align:left;">
                 <button id="' . self::$sortButton . '" type="button" onclick="location.href =\'?' . self::$sortButton . '=1\';">Sort</button>
                 </td>
                 </tr>';
        // add a row to the table
        if($items->getItems() != 0)
        {
            foreach ($items->getItems() as $item) 
            {
                $uniqueID = $item->getUniqueID();
                $title = $item->getTitle();
                $table .= '<tr>
                            <td>' . $item->getDate()
                           .'<td> <a href="?' . self::$itemName . '=' . $uniqueID . '">' . $title . '</a></td>
                           </tr>
                           <tr>
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
        $get = new GetObjects();
        if($get->isGetSet(self::$itemName))
        {
            return true;
        }
        return false;
    }
    /**
     * Clear the getObjects and return to start page
     */
    public function returnToIndex()
    {
        header("location:?");
    }
    public function getSortButtonName()
    {
        return self::$sortButton;
    }
    public function getSortValueName()
    {
        return self::$formSort;
    }
    
            
}
