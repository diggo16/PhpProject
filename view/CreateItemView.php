<?php
/**
 * Description of CreateItemView
 *
 * @author Daniel
 */
class CreateItemView 
{
    public $get;
    
    public static $createButtonName = "CreateItemView::CreateItemButton";
    public static $buttonName = "button";
    public static $title = "title";
    public static $author = "author";
    public static $text = "text";
    public static $add = "add";
    public static $formId = "createItemForm";
    public static $message = "message";
    public function __construct() 
    {
        $this->get = new GetObjects();
    }
    public function getCreateItemButton()
    {
         return " <button type='button' onclick=\"location.href ='?" . self::$buttonName . "=" . self::$createButtonName . "';\">Create item</button>";
    }
    public function isButtonClicked()
    {
        $button = $this->get->getObject(self::$buttonName);
        if(strcmp(self::$createButtonName, $button) == 0)
        {
            return true;
        }
    }
    public function getCreateItemForm()
    {
        $message = "message";
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
                        <br>
                        
                        </form>";
    }
}
