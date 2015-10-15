<?php
/*
 * Show errors
 */
error_reporting(-1);
ini_set('display_errors', 'ON');
/*
 * Require objects
 */
require_once 'model/Items.php';
require_once 'controller/StartController.php';
require_once 'view/layoutView.php';

require_once 'model/Item.php';
/*
 * temporary data
 */
$item1 = new Item("sports", "fotball, basket, tennis");
$item2 = new Item("games", "lol, cs, dota, fifa");
$itemArr = array($item1, $item2);
/*
 * Create objects
 */
$items = new Items($itemArr);
$controller = new StartController($items);
$layoutView = new LayoutView($items);


$layoutView->render();