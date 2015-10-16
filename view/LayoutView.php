<?php
/**
 * Description of LayoutView
 *
 * @author Daniel
 */
class LayoutView 
{
    private $session;

    public function __construct() 
    {
        $this->session = new Session();
    }
    /**
     * Echo the views
     * @param ItemListView $itemListView
     */
    public function render(ItemListView $itemListView, ItemView $itemView)
    {
        $output = $this->getCorrectOutput($itemListView->getTableOutput(), $itemView->getItemHTMLString());
        echo '<!DOCTYPE html>
        <html>
          <head>
            <meta charset="utf-8">
            <title>Forum</title>
          </head>
          <body>
            <h1>Project</h1>
            ' . $this->getErrorMessageOutput()
            .'<div class="container">
            ' . $output 
            .'</div>
           </body>
        </html>
      ';
    }
    /**
     * 
     * @param string $itemListViewString
     * @param string $itemViewString
     * @return string htmlString
     */
    private function getCorrectOutput($itemListViewString, $itemViewString)
    {
        if($itemViewString != null)
        {
            return $itemViewString;
        }
        return $itemListViewString;
    }
    private function getErrorMessageOutput()
    {
       $message = $this->session->getSession($this->session->getSessionMessage());
       $errorMessage = '<p><font color="red">' . $message . '</font></p>';
       return $errorMessage;
    }
}
