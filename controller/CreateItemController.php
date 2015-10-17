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
    }
    /**
     * Check if the item is valid
     */
    public function CheckNewItem(Item &$newItem, Items $items)
    {
        $this->session->removeSession($this->session->getCreateItemMessage());
        $title = $this->view->getTitle();
        $author = $this->view->getAuthor();
        $text = $this->view->getText();
        $newItem = new Item($title, $author, $text);
        
        $errorNumber = $this->createItemRules->checkItem($newItem);
        
        if($errorNumber === 0)
        {
            do
            {
                $uniqueID = $this->randomString->generateUniqueID($title);
            }
            while($items->isUniqueIDTaken($uniqueID));
            $newItem->setUniqueID($uniqueID);
            
            
            $this->newItem = $newItem;
            $this->database->addItem($this->newItem);
            $this->session->setSession($this->session->getSessionMessage(), $this->errorMessages->getCreatedItemMesssage);
        }
        else
        {
            $this->session->setSession($this->session->getCreateItemMessage(), $this->errorMessages->getMessageByNumber($errorNumber));
        }
    }
}
