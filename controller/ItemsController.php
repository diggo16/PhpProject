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
     *
     * @var ErrorMessages $errorMessages
     */
    private $errorMessages;
    /**
     * Class that handles the session
     * @var Session $session
     */
    private $session;
    /**
     *
     * @var ItemDAL $database
     */
    private $database;
    /**
     *
     * @var ItemListView $itemListView
     */
    private $itemListView;
    /**
     * Get the items
     * @param Items $items
     */
    public function __construct(Items $items, $itemListView) 
    {
        $this->items = &$items;
        $this->get = new GetObjects();
        $this->itemName = $itemListView->getItemName();        
        $this->session = new Session();
        
        $server = new Server();
        $this->database = new ItemDAL($server->getDocumentRootPath());
        $this->itemListView = $itemListView;
        
        $this->errorMessages = new ErrorMessages();
    }
    /**
     * Update the items
     */
    public function updateItems(ItemView $itemView)
    {
        // Create needed objects  
        try
        {
            $this->database->loadItems($this->items);
            $this->items->resetItemClicks();
            $this->isItemClicked();
            $this->userWantsToRemoveItem($itemView);
            $this->isCommentAdded($itemView->getCommentButtonName(), $itemView->getCommentText());
            $post = new PostObjects();
            if($this->get->isGetSet($this->itemListView->getSortButtonName()))
            {
                echo $this->itemListView->getSortValueName() . $post->getString($this->itemListView->getSortValueName());
            }
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
            $items = $this->items->getItems();
            foreach($items as $item)
            {
                if($item->getIsClicked())
                {
                    $this->session->setSession("id", $item->getUniqueID());
                }
            }
            
        }
    }
    /**
     * Remove the item if there is any
     * @param ItemView $itemView
     */
    private function userWantsToRemoveItem(ItemView $itemView)
    {
        try 
        {
            if($this->get->isGetSet($itemView->getRemoveName()))
            {
                $itemID = $this->get->getObject($itemView->getRemoveName());
                $this->items->removeItem($itemID);
                $this->database->updateItems($this->items);
                $this->itemListView->returnToIndex();
            }
            
        }
        // If error in removing Item
        catch (Exception $ex) 
        {
            $this->session->setSession($this->session->getSessionMessage(), $this->errorMessages->getErrorInRemovingItem());
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
    private function isCommentAdded($buttonName, $text)
    {
        if($text == "")
        {
            $this->session->setSession($this->session->getSessionMessage(), $this->errorMessages->getEmptyCommentField());
            return;
        }
        $id = "";
        $items = $this->items->getItems();
            foreach($items as $item)
            {
                if($item->getIsClicked())
                {
                    $id = $item->getUniqueID();
                }
            }
        $post = new PostObjects();
        if($post->isButtonPushed($buttonName))
        {
            $items = $this->items->getItems();
            for($i = 0; $i <count($items); $i++)
            {
               if($items[$i]->compareUniqueID($id))
                {
                    $items[$i]->addComment($text);
                    $this->items->setItems($items);
                    $this->database->updateItems($this->items);;
                    
                } 
            }

        }
    }
}
