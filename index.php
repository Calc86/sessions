<?php
/**
 * Created by PhpStorm.
 * User: calc
 * Date: 27.09.14
 * Time: 4:11
 */

include_once "./classes/canvas.php";
include_once "./classes/IDBSession.php";
include_once "./classes/CSV_DB.php";
include_once "./classes/session.php";
include_once "./classes/user.php";

$db = new CSV_DB();
$ses = new session($db);

if(isset($_GET['ajax']))
    $ses->work();
else{
    $canvas = new canvas($db);
    echo $canvas->draw();
}


