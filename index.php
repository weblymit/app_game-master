<?php
session_start();
/**
 * This file show the home page
 */

require_once('controllers/Game.php');

$controller = new \Controllers\Game();
$controller->index();
