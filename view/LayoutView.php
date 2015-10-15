<?php
/**
 * Description of LayoutView
 *
 * @author Daniel
 */
class LayoutView 
{
    private $items;
    public function __construct(Items $items) 
    {
        $this->items = $items;
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
            ' . $this->getTable() . '    
            </div>
           </body>
        </html>
      ';
    }
    private function getTable()
    {
        $table = '<table style="width:100%">';
        foreach ($this->items->getItems() as $item) 
        {
            $title = $item->getTitle();
            $table .= '<tr>
                        <td> <a href="?item=' . $title . '">' . $title . '</a></td>
                       </tr>';
        }
        $table .= '</table>';
        return $table;
    }
}
