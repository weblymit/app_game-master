<?php
 session_start();
/**
 * This file show the home page
 */
/**
 * get all games from models and stock it in array $games
 */
require_once("models/database.php");
$games = getAllGames();
/**
 * Show view
 */
require("view/homePage.php");
