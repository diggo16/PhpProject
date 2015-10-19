<?php
/**
 * Controller for creating a new item
 *
 * @author Daniel
 */
class CreateItemController 
{
    /**
     *
     * @var Item $newItem
     */
    private $newItem;
    /**
     *
     * @var ErrorMessages $errorMessages
     */
    private $errorMessages;
    /**
     *
     * @var CreateItemView $view
     */
    private $view;
    /**
     *
     * @var ItemDAL $database
     */
    private $database;
    /**
     *
     * @var CreateItemRules $createItemRules
     */
    private $createItemRules;
    /**
     *
     * @var RandomString $randomString
     */
    private $randomString;
    /**
     *
     * @var Session $session
     */
    private $session;
    /**
     *
     * @var boolean $isAddButtonPushed
     */
    private $isAddButtonPushed;
    /**
     * Initialize objects
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
       
       $this->isAddButtonPushed = $view->isAddButtonClicked();
    }
    /**
     * Check if the item is valid
     * @param Item $newItem
     * @param Items $items
     */
    public function CheckNewItem(Item &$newItem, Items $items)
    {
        // If the add button is pushed
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
    /**
     * Set the unique id to a generated string of the $title
     * @param Items $items
     * @param string $title
     * @param Item $newItem
     */
    private function setUniqueID(Item $items, $title, Item &$newItem)
    {
        // Generate a string until it is an unique
        do
        {
            $uniqueID = $this->randomString->generateUniqueID($title);
        }
        while($items->isUniqueIDTaken($uniqueID));
        $newItem->setUniqueID($uniqueID);
    }
}
