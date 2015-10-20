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
require_once 'controller/CreateItemController.php';
require_once 'view/PostObjects.php';
require_once 'model/CreateItemRules.php';
require_once 'model/RandomString.php';

/*
 * Create objects
 */
$items = new Items();
$item = new Item();

$itemListView = new ItemListView();
$itemView = new ItemView($items);
$createItemView = new CreateItemView();

$itemController = new ItemsController($items, $itemListView);
$createItemController = new CreateItemController($createItemView, $items);

/*
 * Update items
 */
$createItemController->CheckNewItem($item, $items);
$itemController->updateItems($itemView);
/*
 * Show website
 */
$layoutView = new LayoutView($itemListView, $itemView, $createItemView, $item);
$layoutView->render($items);
/*
 * Close everything
 */
$itemController->close();