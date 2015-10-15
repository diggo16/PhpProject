<?php
/**
 * Description of LayoutView
 *
 * @author Daniel
 */
class LayoutView 
{
    public function __construct() 
    {
        
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
            <div class="container">
            ' . $output . '    
            </div>
           </body>
        </html>
      ';
    }
    /**
     * 
     * @param ItemListView $itemListView
     * @param ItemView $itemView
     * @return type
     */
    private function getCorrectOutput($itemListViewEcho, $itemViewEcho)
    {
        if($itemViewEcho != null)
        {
            return $itemViewEcho;
        }
        return $itemListViewEcho;
    }
}
