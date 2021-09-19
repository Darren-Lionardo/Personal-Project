<?php
    include './conn_db.php';
    $date = $_GET['date'];
    
    $query = $db->prepare("DELETE FROM main WHERE date = ?");
    $query->execute([$date]);

    $query2 = $db->prepare("DELETE FROM spending WHERE date = ?");
    $query2->execute([$date]);

    $query2 = $db->prepare("DELETE FROM profit WHERE date = ?");
    $query2->execute([$date]);

    header("location: index.php");
?>