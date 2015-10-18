<?php
/**
 * Description of LayoutView
 *
 * @author Daniel
 */
class LayoutView 
{
    private $session;
    
    private $itemListView;
    private $createItemView;
    private $itemView;
    private $newItem;

    public function __construct(ItemListView $itemListView, ItemView $itemView, CreateItemView $createItemView, Item $newItem) 
    {
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
    public function render()
    {
        $output = $this->getCorrectOutput();
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
              . $this->getButtonOutput()
            .'</div>
           </body>
        </html>
      ';
    }
    /**
     * 
     * @return string HTMLString
     */
    private function getCorrectOutput()
    {
        if($this->createItemView->isAddButtonPushed() && $this->newItem->isEmpty() == false)
        {
            header("location:?");
            //return $itemListViewString;
        }
        if($this->createItemView->isItemButtonClicked())
        {
            return $this->createItemView->getCreateItemForm();
        }
        if($this->itemView->getItemHTMLString() != null)
        {
            return $this->itemView->getItemHTMLString();
        }
        return $this->itemListView->getTableOutput();
    }
    private function getErrorMessageOutput()
    {
       $message = $this->session->getSession($this->session->getSessionMessage());
       $errorMessage = '<p><font color="red">' . $message . '</font></p>';
       return $errorMessage;
    }
    private function getButtonOutput()
    {
        $button = "";
        if(!$this->createItemView->isItemButtonClicked() && !$this->itemListView->isItemViewed())
        {
            $button = $this->createItemView->getCreateItemButton();
        }
        return $button;
    }
    private function getBackButton()
    {
         if($this->itemListView->isItemViewed() || $this->createItemView->isItemButtonClicked())
         {
             return $this->itemView->getBackButton() . '<br />';
         }
         return "";
    }
}
