<?php
/**
 * Description of ItemListView
 *
 * @author Daniel
 */
class ItemListView 
{
    private $items;
    public function __construct(Items $items) 
    {
        $this->items = $items;
    }
    public function getTableOutput()
    {
       $table = '<table style="width:100%">';
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
