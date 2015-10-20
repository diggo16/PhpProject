<?php
/**
 * Controller for creating a new item
 *
 * @author Daniel
 */
class CreateItemController 
{
    /**
     * view/CreateItemView
     * @var CreateItemView $view
     */
    private $view;
    /**
     * model/Items
     * @var Items $items
     */
    private $items;
    /**
     * Initialize objects
     * @param CreateItemView $view
     */
    public function __construct(CreateItemView $view, Items &$items) 
    {
       $this->view = $view; 
       $this->items = $items;
    }
    /**
     * Check if the item is valid
     * @param Item $newItem
     */
    public function CheckNewItem(Item &$newItem)
    {
        // Create needed objects
        $createItemRules = new CreateItemRules();
        $session = new Session();
        $errorMessages = new ErrorMessages();
        $server = new Server();
        $database = new ItemDAL($server->getDocumentRootPath());
        $isAddButtonPushed = $this->view->isAddButtonClicked();
        
        // If the add button is pushed
        if($isAddButtonPushed)
        {   
            $session->removeSession($session->getCreateItemMessage());
            $title = $this->view->getTitle();
            $author = $this->view->getAuthor();
            $text = $this->view->getText();
            $newItem = new Item($title, $author, $text);

            $errorNumber = $createItemRules->checkItem($newItem);
            /*
             * If the item is valid
             */
            if($errorNumber === 0)
            {
                $this->setUniqueID($title, $newItem);

                $database->addItem($newItem);
            }
            /*
             * Else show error and stay in create item form
             */
            else
            {
                $session->setSession($session->getCreateItemMessage(), $errorMessages->getMessageByNumber($errorNumber));
            }
        }
    }
    /**
     * Set the unique id to a generated string of the $title
     * @param string $title
     * @param Item $newItem
     */
    private function setUniqueID($title, Item &$newItem)
    {
        // Create RandomString object
        $randomString = new RandomString();
        // Generate a string until it is an unique
        do
        {
            $uniqueID = $randomString->generateUniqueID($title);
        }
        while($this->items->isUniqueIDTaken($uniqueID));
        //Set the unique id on the item
        $newItem->setUniqueID($uniqueID);
    }
}
