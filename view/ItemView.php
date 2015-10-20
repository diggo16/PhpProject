<?php
/**
 * View for the item
 *
 * @author Daniel
 */
class ItemView 
{
    /**
     * model/Items
     * @var Items $items
     */
    private $items;
    private static $removeName = "remove";
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
            return '<b>' . $item->getTitle() . '</b> <br />
                    ' . $item->getText() . '<br />
                    By: ' . $item->getAuthor() . "<br />
                    <button type='button' onclick=\"location.href ='?" . self::$removeName . "=" . $item->getUniqueID() . "';\">Remove</button><br />";
        }
        return null;
    }
    /**
     * Get the item that is clicked if there is any
     * @return Item $item
     */
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
    /**
     * Return a HTML string of the back button
     * @return string HTMLString
     */
    public function getBackButton()
    {
        return " <button type='button' onclick=\"location.href ='?';\">Back</button>";
    }
    /**
     * 
     * @return string removeName
     */
    public function getRemoveName()
    {
        return self::$removeName;
    }
}
