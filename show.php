<?php
/**
 * This file show single game
 */
// session_start();
require_once("models/database.php");
$game = getGame();
$title = $game['name']; // title of current page
require("view/showPage.php");


