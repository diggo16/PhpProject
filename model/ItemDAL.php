<?php
/**
 * Description of ItemDAL
 *
 * @author Daniel
 */
class ItemDAL 
{
    private $dirPath;
    private $itemPath;
    
    public function __construct($root) 
    {
        $this->dirPath = $root . "/data/items";
        $this->itemPath = $root . "/data/items.xml";
    }
    public function loadItems(Items $items)
    {
        $xmlString = file_get_contents($this->itemPath);

        $xmlItems = new SimpleXMLElement($xmlString);
        $itemsArr = array();
        foreach($xmlItems as $xmlItem)
        {
            $itemsArr[] = new Item($xmlItem->title, $xmlItem->author, $xmlItem->text);
        }
        $items = new Items($itemsArr);
        //$xml = new SimpleXMLElement($this->itemPath);
        //var_dump($xml);
        //echo $xml->items->item[self::$xmlTitle];
        //echo $xml->bbb->cccc->eeee['name'];
    }
}
