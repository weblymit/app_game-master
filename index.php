<?php
 session_start();
/**
 * This file show the home page
 */
/**
 * get all games from models and stock it in array $games
 */
require_once("models/Game.php");
$model = new Game();
$games = $model->getAll();
/**
 * Show view
 */
require("view/homePage.php");