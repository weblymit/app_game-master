<?php
/**
 * This file show single game
 */
// session_start();
require_once("models/Game.php");
$model = new Game();
$game = $model->get();
$title = $game['name']; // title of current page
require("view/showPage.php");
