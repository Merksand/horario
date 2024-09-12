<?php 


// include '../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'GET') {

    foreach ($_POST as $key => $value) {
        echo "<p><strong>$key</strong>: $value</p>";
    }
}   