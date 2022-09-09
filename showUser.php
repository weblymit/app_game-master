<?php
/**
 * This file show single game
 */
// session_start();
require_once("models/User.php");
$model = new User();
$user = $model->get();
$title = $user['pseudo']; // title of current page
require("view/showUserPage.php");
