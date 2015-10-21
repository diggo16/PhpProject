<?php
/**
 * View for the item
 *
 * @author Daniel
 */
class ItemView 
{
    /**
     * model/Items
     * @var Items $items
     */
    private $items;
    private static $removeName = "remove";
    private static $message = "ItemView::Message";
    private static $commentText = "ItemView::CommentText";
    private static $commentButton = "ItemView::CommentButton";
    /**
     * Set $items
     * @param Items $items
     */
    public function __construct(Items $items) 
    {
        $this->items = $items;
    }
    /**
     * return a string if there is a clicked item else return null
     * @return string HTMLString
     */
    public function getItemHTMLString($message = "")
    {
        $item = $this->getClickedItem();
        $comments = $this->getCommentsString($item->getComments());
        if($item != null)
        {
            return '<h2>' . $item->getTitle() . '</h2> <br />
                    ' . $item->getText() . '<br />
                    By: ' . $item->getAuthor() . "<br />
                    <button type='button' onclick=\"location.href ='?" . self::$removeName . "=" . $item->getUniqueID() . "';\">Remove</button><br />
                    <h2>Comments</h2><br />
                    " . $comments . "
                    <form action='?' method='post' enctype='multipart/form-data' id='commentsID'>
                        <fieldset>
				<legend>Comment</legend>
                                <p id='" . self::$message . "'>" . $message . "</p>
                                <textarea rows='4' cols='50' name='" . self::$commentText ."'></textarea>
                                <br/>
                                <br/>
                                <input id='" .self::$commentButton. "' type='submit' name='" .self::$commentButton . "'  value='comment' />
                        </fieldset>                     
                    </form>";
        } 
        return null;
    }
    /**
     * Get the item that is clicked if there is any
     * @return Item $item
     */
    private function getClickedItem()
    {
        foreach ($this->items->getItems() as $item) 
        {
            if($item->getIsClicked())
            {
                return $item;
            }
        }
        return null;
    }
    private function getCommentsString($comments)
    {
        $string = "";
        foreach ($comments as $comment) 
        {
            $string .= '<div style="border-style: double; background-color:lightblue;">
                        <p>' . $comment . '</p><br />
                        </div>';
        } 
        return $string;
    }
    /**
     * Return a HTML string of the back button
     * @return string HTMLString
     */
    public function getBackButton()
    {
        return " <button type='button' onclick=\"location.href ='?';\">Back</button>";
    }
    /**
     * 
     * @return string removeName
     */
    public function getRemoveName()
    {
        return self::$removeName;
    }
}
