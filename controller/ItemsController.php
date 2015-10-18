<?php
/**
 * controller for the items
 *
 * @author Daniel
 */
class ItemsController 
{
    /**
     * A model/Items object
     * @var Items $items 
     */
    private $items;
    /**
     * Variable of the object view/GetObjects
     * @var GetObjects $get 
     */
    private $get;
    /**
     *
     * @var string $itemName
     */
    private $itemName;
    /**
     * Class that handles the session
     * @var Session $session
     */
    private $session;
    /**
     * Class that handles the item data
     * @var ItemDAL $database
     */
    private $database;
    /**
     *
     * @var ErrorMessages $errorMessages
     */
    private $errorMessages;
    /**
     * Get the items
     * @param Items $items
     */
    public function __construct(Items $items, $itemListView) 
    {
        $this->items = &$items;
        $this->get = new GetObjects();
        $this->itemName = $itemListView->getItemName();
        
        $server = new Server();
        $this->database = new ItemDAL($server->getDocumentRootPath());
        
        $this->session = new Session();
        $this->errorMessages = new ErrorMessages();
    }
    /**
     * Update the items
     */
    public function updateItems()
    {
        try
        {
            $this->database->loadItems($this->items);
            $this->items->resetItemClicks();
            $this->isItemClicked(); 
        } 
        catch (Exception $ex) 
        {
            $this->session->setSession($this->session->getSessionMessage(), $this->errorMessages->getErrorInLoadingItems());
        }
        
    }
    /**
     * Set the item to clicked if there is any
     */
    private function isItemClicked()
    {
        if($this->get->isGetSet($this->itemName))
        {
            $this->items->setClickedItem($this->get->getObject($this->itemName));
        }
    }
    /**
     * Close the session with the message
     */
    public function close()
    {
        $this->session->removeSession($this->session->getSessionMessage());
        $this->session->destroySession();
    }
}
