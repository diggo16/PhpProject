<?php
/**
 * Description of StartController
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
    public function __construct(Items $items, $itemName) 
    {
        $this->items = &$items;
        $this->get = new GetObjects();
        $this->itemName = $itemName;
        
        $server = new Server();
        $this->database = new ItemDAL($server->getDocumentRootPath());
        
        $this->session = new Session();
        $this->errorMessages = new ErrorMessages();
    }
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
    private function isItemClicked()
    {
        if($this->get->isGetSet($this->itemName))
        {
            $this->items->setClickedItem($this->get->getObject($this->itemName));
        }
    }
    public function close()
    {
        $this->session->removeSession($this->session->getSessionMessage());
        $this->session->destroySession();
    }
}
