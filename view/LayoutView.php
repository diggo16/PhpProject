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
        return '<table style="width:100%">
                    <tr>
                      <td>Jill</td>
                    </tr>
                    <tr>
                      <td>Dan</td>
                    </tr>
                    <tr>
                      <td>Mike</td>
                    </tr>
                    
                </table>';
    }
}
