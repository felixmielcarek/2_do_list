<?php

require_once("../model/Connection.php");
require_once("../model/business/User.php");
require_once("../model/gatewa/UserGateway.php");
require_once("../model/business/ListTask.php");
require_once("../model/business/Task.php");

$user = 'root';
$pass = '0000';
$dsn = 'mysql:host=localhost;dbname=2dolist';

$ctrl = new Controller();
?>