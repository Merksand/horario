<?php 


// include '../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    foreach ($_POST as $key => $value) {
        echo "<p><strong>$key</strong>: $value</p>";
    }
}   