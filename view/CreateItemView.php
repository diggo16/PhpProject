<?php
/**
 * Description of CreateItemView
 *
 * @author Daniel
 */
class CreateItemView 
{
    private $get;
    private $post;
    private $session;
    
    private static $createButtonName = "CreateItemView::CreateItemButton";
    private static $buttonName = "button";
    private static $title = "title";
    private static $author = "author";
    private static $text = "text";
    private static $add = "add";
    private static $formId = "createItemForm";
    private static $message = "message";
    
    public function __construct() 
    {
        $this->get = new GetObjects();
        $this->post = new PostObjects();
        $this->session = new Session();
    }
    public function getResponse()
    {
        if($this->isItemButtonClicked())
        {
            return $this->getCreateItemForm();
        }
        if($this->isAddButtonPushed())
        {
            
        }
    }
    public function getCreateItemButton()
    {
         return " <button type='button' onclick=\"location.href ='?" . self::$buttonName . "=" . self::$createButtonName . "';\">Create item</button>";
    }
    public function isItemButtonClicked()
    {
        $button = $this->get->getObject(self::$buttonName);
        if(strcmp(self::$createButtonName, $button) == 0)
        {
            return true;
        }
    }
    public function isAddButtonPushed()
    {
        if(isset($_POST[self::$add]))
        {
            return true;
        }
        return false;
    }
    public function getTitle()
    {
        return $this->post->getString(self::$title);
    }
    public function getText()
    {
        return $this->post->getString(self::$text);
    }
    public function getAuthor()
    {
        return $this->post->getString(self::$author);
    }
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
