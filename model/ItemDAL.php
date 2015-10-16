<?php
/**
 * Description of ItemDAL
 *
 * @author Daniel
 */
class ItemDAL 
{
    private $itemPath;
    
    public function __construct($root) 
    {
        $this->itemPath = $root . "/data/items.xml";
    }
    public function loadItems(Items $items)
    {
        try
        {
            $xmlString = file_get_contents($this->itemPath);

            $xmlItems = new SimpleXMLElement($xmlString);
            $itemsArr = array();
            foreach($xmlItems as $xmlItem)
            {
                $itemsArr[] = new Item($xmlItem->title, $xmlItem->author, $xmlItem->text, $xmlItem->uniqueID);
            }
            $items->setItems($itemsArr);
        } 
        catch (Exception $ex) 
        {
            throw new Exception();
        }
    }
}
