<?php
/*
 * Require objects
 */
require_once 'model/Items.php';
require_once 'controller/StartController.php';
require_once 'view/layoutView.php';
/*
 * Create objects
 */
$items = new Items();
$controller = new StartController();
$layoutView = new LayoutView();


$layoutView->render();