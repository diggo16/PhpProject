<?php
require_once 'controller/StartController.php';
require_once 'view/layoutView.php';

$controller = new StartController();

$layoutView = new LayoutView();

$layoutView->render();