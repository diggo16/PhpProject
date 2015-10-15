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
class StartController 
{
    private $items;
    public function __construct(Items $items) 
    {
        $this->items = $items;
    }
}
