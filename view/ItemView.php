<?php
/**
 * Description of ItemView
 *
 * @author Daniel
 */
class ItemView 
{
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
     * return a string if there is a clicked item else return null
     * @return string HTMLString
     */
    public function getItemHTMLString()
    {
        $item = $this->getClickedItem();
        if($item != null)
        {
            return '<b>' . $item->getTitle() . '</b>
                    ' . $item->getText();
        }
        return null;
    }
    private function getClickedItem()
    {
        foreach ($this->items->getItems() as $item) 
        {
            if($item->getIsClicked())
            {
                return $item;
            }
        }
        return null;
    }
}
