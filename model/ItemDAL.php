<?php
/**
 * Handles the saved data about the items
 *
 * @author Daniel
 */
class ItemDAL 
{
    /**
     * File path to the item xml file
     * @var string $itemPath 
     */
    private $itemPath;
    /**
     * Set the item path
     * @param type $root Root path for the application
     */
    public function __construct($root) 
    {
        $webPath = "/home/a4521600";
        $this->itemPath = $root . "/data/items.xml";
        //$this->itemPath = $webPath . "/data/items.xml";
    }
    /**
     * Load the items
     * @param Items $items
     * @throws Exception
     */
    public function loadItems(Items &$items)
    {
        try
        {
            // Load the file and save it in a string
            $xmlString = file_get_contents($this->itemPath);

            // Convert the string to a xml object
            $xmlItems = new SimpleXMLElement($xmlString);
            $itemsArr = array();
            // Put the information from the xml object in an Item array
            foreach($xmlItems as $xmlItem)
            {
                $comments = (array) $xmlItem->comments->comment;
                $date = $xmlItem->date;
                $item = new Item($xmlItem->title, $xmlItem->author, $xmlItem->text, $xmlItem->uniqueID, $comments, $date);
                $item->setDate($date);
                $itemsArr[] = $item;
            }
            // Set the items to the
            $items->setItems($itemsArr);
        } 
        catch (Exception $ex) 
        {
            throw new Exception("Failed to load items");
        }
    }
    /**
     * Add the item
     * @param Item $item
     */
    public function addItem(Item $item)
    {
        try
        {
            // Collect the xml document in a string
            $xmlString = file_get_contents($this->itemPath);
            // Convert it to an xml object
            $xmlItems = new SimpleXMLElement($xmlString);
            
            //date
            $year = date("Y");
            $month = date("m");
            $day = date("d");
            $date = $day . "-" . $month . "-" . $year;
            echo  $date;
            // create the new item in the xml object
            $xmlItem = $xmlItems->addChild("item");
            $xmlItem->addChild("title", $item->getTitle());
            $xmlItem->addChild("author", $item->getAuthor());
            $xmlItem->addChild("text", $item->getText());
            $xmlItem->addChild("uniqueID", $item->getUniqueID());
            $xmlItem->addChild("date", $date);
            $comments = $xmlItem->addChild("comments");
            foreach ($item->getComments() as $comment) 
            {
                $comments->addChild("comment", $comment);
            }
            
            // Make a readable xml document of the xml object
            $dom = new DOMDocument('1.0');
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;
            $dom->loadXML($xmlItems->asXML());
            // Save the file
            file_put_contents($this->itemPath, $dom->saveXML());
            
        }
        catch(Exception $e)
        {
            throw new Exception("Failed to add item");
        }
    }
    /**
     * 
     * @param type $items
     */
    public function updateItems(&$items)
    {
        $xmlItems = new SimpleXMLElement("<?xml version='1.0' standalone='yes'?>
                                            <items/>");
        // Add the updated items to the xml object
        foreach ($items->getItems() as $item) 
        {
            // create the new item in the xml object
            $xmlItem = $xmlItems->addChild("item");
            $xmlItem->addChild("title", $item->getTitle());
            $xmlItem->addChild("author", $item->getAuthor());
            $xmlItem->addChild("text", $item->getText());
            $xmlItem->addChild("uniqueID", $item->getUniqueID());
            $xmlItem->addChild("date", $item->getDate());
            $comments = $xmlItem->addChild("comments");
            foreach ($item->getComments() as $comment) 
            {
                $comments->addChild("comment", $comment);
            }
        }        
        // Make a readable xml document of the xml object
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xmlItems->asXML());
        // Save the file
        file_put_contents($this->itemPath, $dom->saveXML());      
    }
}
