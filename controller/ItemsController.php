<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StartController
 *
 * @author Daniel
 */
class ItemsController 
{
    /**
     * A model/Items object
     * @var Items $items 
     */
    private $items;
    /**
     * Variable of the object view/GetObjects
     * @var GetObjects $get 
     */
    private $get;
    private $itemName;
    /**
     * Get the items
     * @param Items $items
     */
    public function __construct(Items $items, $itemName) 
    {
        $this->items = $items;
        $this->get = new GetObjects();
        $this->itemName = $itemName;
    }
    public function updateItems()
    {
        $this->items->resetItemClicks();
        $this->isItemClicked();
    }
    private function isItemClicked()
    {
        if($this->get->isGetSet($this->itemName))
        {
            $this->items->setClickedItem($this->get->getObject($this->itemName));
        }
    }
}
