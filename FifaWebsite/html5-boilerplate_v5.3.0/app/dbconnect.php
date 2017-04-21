<?php
session_start();
$connection = new PDO('mysql:host=localhost;dbname=project_fifa', 'root', '');
$connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>