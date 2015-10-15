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
 * Create objects
 */
$items = new Items();
$controller = new StartController($items);
$layoutView = new LayoutView($items);


$layoutView->render();