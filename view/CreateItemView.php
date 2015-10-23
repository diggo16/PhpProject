<?php
/**
 * View for creating an item
 *
 * @author Daniel
 */
class CreateItemView 
{
    /**
     *
     * @var GetObjcts $get
     */
    private $get;
    /**
     *
     * @var PostObjects $post
     */
    private $post;
    /**
     *
     * @var Session $session 
     */
    private $session;
    /*
     * Post and Get names
     */ 
    private static $createButtonName = "CreateItemView::CreateItemButton";
    private static $buttonName = "button";
    private static $title = "title";
    private static $author = "author";
    private static $text = "text";
    private static $add = "add";
    private static $formId = "createItemForm";
    private static $message = "message";
    /**
     * Set objects
     */
    public function __construct() 
    {
        $this->get = new GetObjects();
        $this->post = new PostObjects();
        $this->session = new Session();
    }
    /**
     * Return a HTML string of the create item button
     * @return string HTMLString
     */
    public function getCreateItemButton()
    {
         return " <button type='button' onclick=\"location.href ='?" . self::$buttonName . "=" . self::$createButtonName . "';\">Create item</button>";
    }
    /**
     * Return true if the create item button is clicked
     * @return boolean isClicked
     */
    public function isItemButtonClicked()
    {
        $button = $this->get->getObject(self::$buttonName);
        if(strcmp(self::$createButtonName, $button) == 0)
        {
            return true;
        }
    }
    /**
     * Return true if the add item button is clicked
     * @return boolean isClicked
     */
    public function isAddButtonClicked()
    {
        if(isset($_POST[self::$add]))   //TODO: add to post
        {
            return true;
        }
        return false;
    }
    /**
     * Return the title
     * @return string title
     */
    public function getTitle()
    {
        return $this->post->getString(self::$title);
    }
    /**
     * Return the text
     * @return string text
     */
    public function getText()
    {
        return $this->post->getString(self::$text);
    }
    /**
     * Return the author
     * @return string author
     */
    public function getAuthor()
    {
        return $this->post->getString(self::$author);
    }
    /**
     * Return a create item form
     * @return string HTMLString
     */
    public function getCreateItemForm()
    {
        $message = $this->session->getSession($this->session->getCreateItemMessage());
        return "<h2>Create new item</h2>
			<form action='?" . self::$buttonName . "=" . self::$createButtonName . "' method='post' enctype='multipart/form-data' id='" . self::$formId . "'>
				<fieldset>
				<legend>Create a new item</legend>
					<p id='" . self::$message . "'>" . $message . "</p>
					<label for='" . self::$title ."' >Title</label>
                                        <br/>
					<input type='text' name='" . self::$title . "' id='" . self::$title . "' value='' />
					<br/>
					<label for='" . self::$author ."' >Author</label>
                                        <br/>
					<input type='text' name='" . self::$author . "' id='" . self::$author . "' value='' />
					<br/>
                                        <label for='" . self::$text ."' >Text</label>
                                        <br/>
                                        <textarea rows='4' cols='50' name='" . self::$text ."'></textarea>
                                        <br/>
                                        <input id='" .self::$add . "' type='submit' name='" .self::$add . "'  value='add' />
					<br/>
                                       
				</fieldset>                     
                        </form>";
    }
}
