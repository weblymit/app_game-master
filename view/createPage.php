<?php
require_once("utils/Form.class.php");
$form = new Form();

ob_start();
require("partials/_create.php");

$content = ob_get_clean();
require("layout.php");
