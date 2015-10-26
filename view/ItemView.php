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
        $post = new PostObjects();
        if(!$post->isButtonPushed(self::$commentButton))
        {
            $message = "";
        }
        $item = $this->getClickedItem();
        if($item != null)
        {
            $comments = $this->getCommentsString($item->getComments());
            return '<div style="border-style: double; width: 80%">
                    <h3>' . $item->getTitle() . '</h3>
                    <p style="text-align:left">' . $item->getText() . '</p>
                    <h4>By: ' . $item->getAuthor() . "</h4>
                    <button type='button' onclick=\"location.href ='?" . self::$removeName . "=" . $item->getUniqueID() . "';\">Remove</button><br />
                    </div>
                    <h2>Comments</h2>
                    " . $comments . "
                    <br/>
                    <form method='post' enctype='multipart/form-data' id='commentsID' style='width:80%'>
                        <fieldset>
				<legend>Add comment</legend>
                                <p id='" . self::$message . "'>" . $message . "</p>
                                <textarea rows='4' cols='50' name='" . self::$commentText ."'></textarea>
                                <br/>
                                <br/>
                                <input id='" .self::$commentButton. "' type='submit' name='" .self::$commentButton . "'  value='Comment' />
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
            $string .= '<div style="border-style: double; background-color:lightblue; text-align:left;">
                        <p>' . $comment . '</p>
                        </div><br />';
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
    public function getCommentButtonName()
    {
        return self::$commentButton;
    }
    public function getCommentText()
    {
        $post = new PostObjects();
        return $post->getString(self::$commentText);
    }
}
