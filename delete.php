<?php

require_once './Database_connection.php';

$db_obj = new Database_connection();
if(isset($_GET['id'])) {
    $db_obj->delete($_GET['id']);
}

