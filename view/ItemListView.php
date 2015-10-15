<?php
/**
 * Description of ItemListView
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
     * Set $items
     * @param Items $items
     */
    public function __construct(Items $items) 
    {
        $this->items = $items;
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
                $title = $item->getTitle();
                $table .= '<tr>
                            <td> <a href="?item=' . $title . '">' . $title . '</a></td>
                           </tr>';
            }
            $table .= '</table>';
        }       
        return $table; 
    }
}