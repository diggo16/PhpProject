<?php
// Start session
session_start();
/*
 * Show errors
 */
error_reporting(-1);
ini_set('display_errors', 'ON');
/*
 * Require objects
 */
require_once 'model/Items.php';
require_once 'model/Item.php';
require_once 'controller/ItemsController.php';
require_once 'view/layoutView.php';
require_once 'view/ItemListView.php';
require_once 'view/ItemView.php';
require_once 'view/GetObjects.php';
require_once 'view/Server.php';
require_once 'model/ItemDAL.php';
require_once 'view/Session.php';
require_once 'view/ErrorMessages.php';
require_once 'view/CreateItemView.php';

/*
 * Create objects
 */
$items = new Items();

$itemListView = new ItemListView($items);
$itemView = new ItemView($items);
$createItemView = new CreateItemView();
$layoutView = new LayoutView();

$controller = new ItemsController($items, $itemListView->getItemName());

/*
 * Update items
 */
$controller->updateItems();


/*
 * Show website
 */
$layoutView->render($itemListView, $itemView, $createItemView);
/*
 * Close everything
 */
$controller->close();