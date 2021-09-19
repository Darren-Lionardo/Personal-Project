<?php
    $host = "localhost";
    $dbname = "income";
    $username = "root";
    $password = "";

    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $baseurl = "http://localhost/side-project/";