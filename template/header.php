<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Manager</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav id="main-navbar" class="navbar navbar-expand-md navbar-dark bg-dark py-0">
        <div class="container">
            <span class="navbar-brand">Hello, <?= $_SESSION['username']; ?> </span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="tampil_barang.php"
                            class="nav-link p-3 <?= basename($_SERVER['PHP_SELF'])=='tampil_barang.php'?'active':''; ?>">Tabel
                            Barang</a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php"
                            class="nav-link p-3 <?= basename($_SERVER['PHP_SELF'])=='profile.php'?'active':''; ?>">My
                            Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link p-3">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>