<?php
session_start();
/**
 * This file show the user page
 */
/**
 * get all users from models and stock it in array $users
 */
require_once('controllers/User.php');
$controller = new \Controllers\User();
$controller->index();
