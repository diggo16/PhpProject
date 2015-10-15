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
     * Get the items
     * @param Items $items
     */
    public function __construct(Items $items) 
    {
        $this->items = $items;
    }
}
