<?php
mysqli_report(MYSQLI_REPORT_STRICT);


try {
    $mysqli = new mysqli("localhost", "root", "");

    $mysqli->select_db("ilkoom");
    if ($mysqli->error) {
        throw new Exception();
    }

    $query = "SELECT 1 FROM barang";
    $mysqli->query($query);
    if ($mysqli->error) {
        throw new Exception();
    }
    
    $query = "SELECT 1 FROM user";
    $mysqli->query($query);
    if ($mysqli->error) {
        throw new Exception();
    }

    if (isset($mysqli)) {
        $mysqli->close();
    }

    header('Location:login.php');
} catch (Exception $e) {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-12 py-4 mx-auto text-center">
                <h3 class="mt-5">
                    Selamat datang di Aplikasi <strong>Stock Manager</strong>
                </h3>
                <hr class="w-50">
                <p class="lead mt-5">Sistem kami mendeteksi database / tabel belum tersedia, apakah ingin dibuat
                    sekarang ?</p>
                <a href="db_generate_tabel_barang_dan_user.php" class="btn btn-info">Ya</a>
                <a href="#" class="btn btn-danger">Tidak</a>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>
<?php
}