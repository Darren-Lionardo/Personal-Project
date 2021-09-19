<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Income Add</title>
        <link rel="stylesheet" type="text/css" href="mainStyle.css">
        <script type="text/javascript" src="script.js"></script>
    </head>
    <body>
        <div class="card p1 m1">
            <h2 class="card" style="text-align: center"> ADD DATA </h2><br><br>
            <form action="doAddMore.php" method="POST">
                <label for="date"><b>Date: </b></label><br>
                <input type="date" class="card" name="date" id="date"><br><br>
                <label for="description"><b>Description: </b></label><br>
                <textarea name="description" class="card" id="description" cols = "100" rows = "10"></textarea><br><br>
                <label for="buy"><b>Beli: </b></label><br>
                <input type="number" class="card" name="buy" id="buy"><br><br>
                <div id="pengeluaran">
                    <label><b>Pengeluaran:</b></label><br>
                    <input type='text' name='name[]' id='spendingName'><span> : Rp. </span>
                    <input type='number' name='amount[]' id='spendingAmount'><br>
                    <button type='button' class='btn-plus grey' onclick='addPengeluaran()'>+</button>
                </div><br>
                <label for="total"><b>Penjualan: </b><br>Rp. </label>
                <input type="number" class="card" name="sell" id="sell"><br><br>
                <input type="submit" class="card green btn2" value="Submit">
            </form>
            <button class="btn2 grey" style="margin-top: 15px" onclick="document.location='index.php'">Cancel</button>
        </div>
    </body>
</html>