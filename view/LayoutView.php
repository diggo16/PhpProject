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
     * @param string $itemListViewEcho
     * @param string $itemViewEcho
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
}
