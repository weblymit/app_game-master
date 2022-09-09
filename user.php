<?php
session_start();
/**
 * This file show the user page
 */
/**
 * get all users from models and stock it in array $users
 */
require_once("models/User.php");
$model = new User();
$users = $model->getAll("pseudo");
/**
 * Show view
 */
require("view/userPage.php");
