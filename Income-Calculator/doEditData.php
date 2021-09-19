<?php
    include './conn_db.php';
    $date = $_POST['date'];
    $desc = $_POST['description'];
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $sell = $_POST['sell'];
    $buy = $_POST['buy'];

    $query = $db->prepare("UPDATE main SET info=?, buy=?, sell=? WHERE date=?");
    $query->execute([$desc,$buy,$sell,$date]);

    $query3 = $db->prepare("SELECT no FROM spending WHERE date=?");
    $query3->execute([$date]);
    $temp = $query3->fetchall();

    $length = count($temp);
    
    $no = 0;
    for($i=0;$i<$length;$i++){
        $query2 = $db->prepare("UPDATE spending SET name=?, amount=? WHERE date=? AND no=?");
        $query2->execute([$name[$i], $amount[$i], $date, $no]);
        $no = $no + 1;
    }

    $length2 = count($name);

    for($j=$i;$j<$length2;$j++){
        $query4 = $db->prepare("INSERT INTO spending(no,date,name,amount) VALUES(?,?,?,?)");
        $query4->execute([$j, $date, $name[$j], $amount[$j]]);
    }

    $total = 0;
    foreach($amount as $n){
        $total = $total + $n;
    }

    $query2 = $db->prepare("UPDATE profit SET profit=? WHERE date=?");
    $query2->execute([$sell - $buy - $total, $date]);

    header("location: index.php");
?>