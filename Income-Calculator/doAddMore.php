<?php
    include './conn_db.php';
    $date = $_POST['date'];
    $desc = $_POST['description'];
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $sell = $_POST['sell'];
    $buy = $_POST['buy'];
    
    $query = $db->prepare("INSERT INTO main(date,info,buy,sell) VALUES(?,?,?,?)");
    $query->execute([$date,$desc,$buy,$sell]);

    $total = 0;
    foreach($amount as $n){
        $total = $total + $n;
    }

    $query2 = $db->prepare("INSERT INTO profit(date, profit) VALUES(?,?)");
    $query2->execute([$date, $sell - $buy - $total]);

    $no = 0;
    foreach($name as $key => $nameD){
        $query2 = $db->prepare("INSERT INTO spending(no,date,name,amount) VALUES(?,?,?,?)");
        $query2->execute([$no,$date,$nameD,$amount[$key]]);
        $no = $no + 1;
    }

    header("location: index.php");
?>