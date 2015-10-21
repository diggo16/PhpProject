<?php
/**
 * Description of LayoutView
 *
 * @author Daniel
 */
class LayoutView 
{
    /**
     *
     * @var Session $session 
     */
    private $session;
    /**
     *
     * @var ItemListView $itemListView
     */
    private $itemListView;
    /**
     *
     * @var CreateItemView $createItemView;
     */
    private $createItemView;
    /**
     *
     * @var ItemView $itemView 
     */
    private $itemView;
    /**
     *
     * @var NewItem $newItem 
     */
    private $newItem;
    private $showError;
    /**
     * Initialize objects
     * @param ItemListView $itemListView
     * @param ItemView $itemView
     * @param CreateItemView $createItemView
     * @param Item $newItem
     */
    public function __construct(ItemListView $itemListView, ItemView $itemView, CreateItemView $createItemView, Item $newItem) 
    {
        $showError = true;
        $this->session = new Session();
        
        $this->itemListView = $itemListView;
        $this->createItemView = $createItemView;
        $this->itemView = $itemListView;
        $this->newItem = $newItem;
        $this->itemView = $itemView;
    }
    /**
     * Echo the views
     */
    public function render(Items $items)
    {
        $output = $this->getCorrectOutput($items);
        echo '<!DOCTYPE html>
        <html>
          <head>
            <meta charset="utf-8">
            <title>Forum</title>
          </head>
          <body>
            <h1>Project</h1>
            ' . $this->getBackButton()
            . $this->getErrorMessageOutput()
            .'<div class="container">
            ' . $output
              . $this->getCreateButton()
            .'</div>
           </body>
        </html>
      ';
    }
    /**
     * Return the correct view for the body
     * @return string HTMLString
     */
    private function getCorrectOutput(Items $items)
    {
        // If it's a new created item, remove get and return to item list
        if($this->createItemView->isAddButtonClicked() && $this->newItem->isEmpty() == false)
        {
            $this->itemListView->returnToIndex();
        }
        // If the create item button is pushed, show create item form
        if($this->createItemView->isItemButtonClicked())
        {
            return $this->createItemView->getCreateItemForm();
        }
        // If an item is clicked, show the item
        if($this->itemView->getItemHTMLString() != null)
        {
            $message = $this->getErrorMessageOutput(true);
            $this->showError = false;
            return $this->itemView->getItemHTMLString($message);
        }
        // Show item list
        return $this->itemListView->getTableOutput($items);
    }
    /**
     * Return a HTML string with red text
     * @return errorHTMLString
     */
    private function getErrorMessageOutput($showMessage = false)
    {
        
        if($this->showError || $showMessage)
        {
            $message = $this->session->getSession($this->session->getSessionMessage());
            $errorMessage = '<p><font color="red">' . $message . '</font></p>';
            return $errorMessage;
        }
        return "";
       
    }
    /**
     * Return a create button if the view is item list
     * @return string HTMLString
     */
    private function getCreateButton()
    {
        $button = "";
        // If the view isn't showing an item or create item form (the view is itemList), return create button
        if(!$this->createItemView->isItemButtonClicked() && !$this->itemListView->isItemViewed())
        {
            $button = $this->createItemView->getCreateItemButton();
        }
        return $button;
    }
    /**
     * Return a back button if the view isn't the item 
     * @return string HTMLString
     */
    private function getBackButton()
    {
         if($this->itemListView->isItemViewed() || $this->createItemView->isItemButtonClicked())
         {
             return $this->itemView->getBackButton() . '<br />';
         }
         return "";
    }
}
