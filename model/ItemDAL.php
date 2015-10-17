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
    /**
     * 
     * @param Items $items
     * @throws Exception
     */
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
    public function addItem(Item $item)
    {
        try
        {
            $xmlString = file_get_contents($this->itemPath);

            $xmlItems = new SimpleXMLElement($xmlString);
            
            $xmlItem = $xmlItems->addChild("item");
            $xmlItem->addChild("title", $item->getTitle());
            $xmlItem->addChild("author", $item->getAuthor());
            $xmlItem->addChild("text", $item->getText());
            $xmlItem->addChild("uniqueID", $item->getUniqueID());
            
            $xmlItems->asXML($this->itemPath);
            
        }
        catch(Exception $e)
        {
            
        }
    }
}
