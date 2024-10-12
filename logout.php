<?php

session_name('login');  
session_start();
session_destroy();
header("Location:  index.php"); // Ajusta la ruta si es necesario

exit();
