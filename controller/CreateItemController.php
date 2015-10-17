<?php
/**
 * Description of CreateItemController
 *
 * @author Daniel
 */
class CreateItemController 
{
    private $newItem;
    private $errorMessages;
    private $view;
    private $database;
    private $createItemRules;
    private $randomString;
    private $session;
    
    private $isAddButtonPushed;
    /**
     * 
     * @param Item $newItem
     * @param CreateItemView $view
     */
    public function __construct(Item &$newItem, CreateItemView $view) 
    {
       $this->newItem = $newItem; 
       $this->errorMessages = new ErrorMessages();
       $this->view = $view;
       $this->createItemRules = new CreateItemRules();
       $this->randomString = new RandomString();
       $this->session = new Session();
       
       $server = new Server();
       $this->database = new ItemDAL($server->getDocumentRootPath());
       
       $this->isAddButtonPushed = $view->isAddButtonPushed();
    }
    /**
     * Check if the item is valid
     */
    public function CheckNewItem(Item &$newItem, Items $items)
    {
        if($this->isAddButtonPushed)
        {
             $this->session->removeSession($this->session->getCreateItemMessage());
            $title = $this->view->getTitle();
            $author = $this->view->getAuthor();
            $text = $this->view->getText();
            $newItem = new Item($title, $author, $text);

            $errorNumber = $this->createItemRules->checkItem($newItem);
            /*
             * If the item is valid
             */
            if($errorNumber === 0)
            {
                $this->setUniqueID($items, $title, $newItem);

                $this->newItem = $newItem;
                $this->database->addItem($this->newItem);
                $this->session->setSession($this->session->getSessionMessage(), $this->errorMessages->getCreatedItemMesssage);
            }
            /*
             * Else show error and stay in create item form
             */
            else
            {
                $this->session->setSession($this->session->getCreateItemMessage(), $this->errorMessages->getMessageByNumber($errorNumber));
            }
        }
       
    }
    private function setUniqueID($items, $title, &$newItem)
    {
        do
        {
            $uniqueID = $this->randomString->generateUniqueID($title);
        }
        while($items->isUniqueIDTaken($uniqueID));
        $newItem->setUniqueID($uniqueID);
    }
}
