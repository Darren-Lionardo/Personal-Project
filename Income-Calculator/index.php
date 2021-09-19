<?php
    include './conn_db.php';
    $query = $db->prepare("SELECT * FROM main");
    $query->execute();
    $data = $query->fetchall();

    /*$query2 = $db->prepare("SELECT YEAR(date) 'year', SUM(sell) 'total' FROM main GROUP BY YEAR(date)");
    $query2->execute();
    $data2 = $query2->fetchall();*/
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Income</title>
        <!-- <script type="text/javascript" src="script.js"></script> -->
        <link rel="stylesheet" type="text/css" href="mainStyle.css">
    </head>
    <body>
        <div class="navbar card flex-center">
            <h1>INCOME</h1>
        </div>
        <div class="option flex-evenly">
            <button class="btn green" onclick="document.location='<?=$baseurl?>addMore.php'">+ Add More</button>
        </div>
        <table class="tbl card">
            <thead>
                <tr>
                    <th class="card" style="padding: 1%">Date</th>
                    <th class="card" style="padding: 1%">Keterangan</th>
                    <th class="card" style="padding: 1%">Beli</th>
                    <th class="card" style="padding: 1%">Pengeluaran</th>
                    <th class="card" style="padding: 1%">Penjualan</th>
                    <th class="card" style="padding: 1%">Profit</th>
                    <th class="card" style="padding: 1%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $n) { ?>
                    <?php $query4 = $db->prepare("SELECT name, amount FROM spending WHERE date = ?"); //pengeluaran
                    $query4->execute([$n['date']]);
                    $data4 = $query4->fetchall(); ?>
                    <?php $query5 = $db->prepare("SELECT SUM(amount) 'total' FROM spending WHERE date = ?"); //total pengeluaran
                    $query5->execute([$n['date']]);
                    $data5 = $query5->fetch(); ?>
                    <?php $query7 = $db->prepare("SELECT profit FROM profit WHERE date = ?"); //total rofit
                    $query7->execute([$n['date']]);
                    $data7 = $query7->fetch(); ?>
                    <tr>
                        <td style="width: 10%"><?= $n['date'] ?></td>
                        <td><div class=""><pre><?= $n['info'] ?></pre></div></td>
                        <td style="width: 10%"><?= "Rp. " . $n['buy'] ?></td>
                        <td>
                            <div class='spend' style="display: inline-block">
                                <div class="spend-inner">
                                    <div class="spend-front">
                                        <p>Hover me</p>
                                    </div>
                                    <div class="spend-back">
                                        <table class="tbl2 card">
                                            <thead>
                                                <tr>
                                                    <th class="card">Name</th>
                                                    <th class="card">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($data4 as $n4){ ?>
                                                    <tr>
                                                        <td style="width: 10%"><?= $n4['name'] ?></td>
                                                        <td style="width: 15%"><?= "Rp. " . $n4['amount'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td style="width: 10%"><?= "Rp. " . $n['sell'] ?></td>
                        <td style="width: 10%"><?= "Rp. " . $data7['profit']?></td>

                        <td style="width: 1%"><?= "<button class='btn yellow' onclick=" . "document.location='" . $baseurl . "editData.php" . "?date=" . $n['date'] . "'>" . "Edit" . "</button>" ?>
                        <?= "<button class='btn red' onclick=" . "document.location='" . $baseurl . "doDeleteData.php" . "?date=" . $n['date'] . "'>" . "Delete" . "</button>" ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <table class="tbl card">
            <thead>
                <tr>
                    <th class="card" style="padding: 1%">Year</th>
                    <th class="card" style="padding: 1%">Total</th>
                    <th class="card" style="padding: 1%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $query3 = $db->prepare("SELECT YEAR(date) 'year', SUM(profit) 'total' FROM profit GROUP BY YEAR(date)"); 
                $query3->execute(); 
                $data3 = $query3->fetchall(); ?>

                <?php foreach($data3 as $n3) { ?>

                    <?php $query6 = $db->prepare("SELECT MONTH(date) 'month', SUM(profit) 'total' FROM profit WHERE YEAR(date)=? GROUP BY MONTH(date)"); 
                    $query6->execute([$n3['year']]); 
                    $data6 = $query6->fetchall(); ?>

                    <?php
                    /*$query3 = $db->prepare("SELECT MONTH(date) 'month', SUM(sell) 'total' FROM main WHERE YEAR(date) = ? GROUP BY MONTH(date)");
                    $query3->execute([$n2['year']]);
                    $data3 = $query3->fetchall();
                    
                    $query6 = $db->prepare("SELECT MONTH(date) 'month', SUM(buy) 'total' FROM main WHERE YEAR(date) = ? GROUP BY MONTH(date)");
                    $query6->execute([$n2['year']]);
                    $data6 = $query6->fetchall();
                    
                    $query7 = $db->prepare("SELECT SUM(amount) 'total' FROM spending WHERE YEAR(date)=? AND MONTH(date)=?"); //total pengeluaran
                    $query7->execute([$n['date']]);
                    $data7 = $query7->fetch();*/ ?>
                    
                    <tr>
                        <td style="width: 10%"><?= $n3['year'] ?></td>
                        <td style="width: 15%"><?= "Rp. " . $n3['total'] ?></td>
                        <td>
                            <div class='month' style="display: inline-block">
                                <div class="month-inner">
                                    <div class="month-front">
                                        <p>Hover me</p>
                                    </div>
                                    <div class="month-back">
                                        <table class="tbl2 card">
                                            <thead>
                                                <tr>
                                                    <th class="card">Month</th>
                                                    <th class="card">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($data6 as $n6){ ?>
                                                    <tr>
                                                        <td style="width: 10%"><?= $n6['month'] ?></td>
                                                        <td style="width: 15%"><?= "Rp. " . $n6['total'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="card flex-center footbar">
            <h4>@Copyright Darren Lionardo 2021</h4>
        </div>
    </body>
</html>