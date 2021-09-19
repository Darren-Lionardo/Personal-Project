<?php include './conn_db.php';
$date = $_GET['date'];
$query = $db->prepare("SELECT info, buy, sell FROM main WHERE date=?");
$query->execute([$date]);
$data = $query->fetch();

$query2 = $db->prepare("SELECT name, amount FROM spending WHERE date=?");
$query2->execute([$date]);
$data2 = $query2->fetchall();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Income Edit</title>
        <link rel="stylesheet" type="text/css" href="mainStyle.css">
        <script type="text/javascript" src="script.js"></script>
    </head>
    <body>
        <div class="card p1 m1">
            <h2 class="card" style="text-align: center"> EDIT DATA </h2><br><br>
            <form action="doEditData.php" method="POST">
                <label for="date"><b>Date: </b></label><br>
                <input type="date" class="card" name="date" id="date" value="<?=$date?>" disabled>
                <input type="date" class="card" name="date" id="date" value="<?=$date?>" hidden><br><br>
                <label for="description"><b>Description: </b></label><br>
                <textarea name="description" class="card" id="description" cols = "100" rows = "10"><?=$data['info']?></textarea><br><br>
                <label for="buy"><b>Beli: </b></label><br>
                <input type="number" class="card" name="buy" id="buy" value="<?=$data['buy']?>"><br><br>
                <div id="pengeluaran">
                    <label><b>Pengeluaran:</b></label><br>
                    <?php foreach($data2 as $n2){ ?>
                    <input type='text' name='name[]' id='spendingName' value="<?=$n2['name']?>"><span> : Rp. </span>
                    <input type='number' name='amount[]' id='spendingAmount' value="<?=$n2['amount']?>"><br>
                    <?php } ?>
                    <button type='button' class='btn-plus grey' onclick='addPengeluaran()'>+</button>
                </div><br>
                <label for="total"><b>Penjualan: </b><br>Rp. </label>
                <input type="number" class="card" name="sell" id="sell" value="<?=$data['sell']?>"><br><br>
                <input type="submit" class="card yellow btn2" value="Submit">
                <button class="btn2 grey" onclick="document.location='index.php'">Cancel</button>
            </form>
        </div>
    </body>
</html>