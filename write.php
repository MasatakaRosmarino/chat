<?php
require_once("includes/connection.php");

$connection->query("INSERT INTO chat (user_id, message) VALUES('" . $_POST["user_id"] . "', '" . $_POST["message"] . "')");