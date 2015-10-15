<?php
/**
 * Description of LayoutView
 *
 * @author Daniel
 */
class LayoutView 
{
    private $itemListView;
    public function __construct(ItemListView $itemListView) 
    {
        $this->itemListView = $itemListView;
    }
    public function render()
    {
          echo '<!DOCTYPE html>
        <html>
          <head>
            <meta charset="utf-8">
            <title>Forum</title>
          </head>
          <body>
            <h1>Project</h1>
            

            <div class="container">
            ' . $this->itemListView->getTableOutput() . '    
            </div>
           </body>
        </html>
      ';
    }
}
