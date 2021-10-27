<?php
require "init.php";

$user = new User();
$user->cekUserSession();

$barang = new Barang();

if (!empty($_POST)) {
    $pesanError = $barang->validasi($_POST);

    if (empty($pesanError)) {
        $barang->insert();
        header("Location: tampil_barang.php");
    }
}

include "template/header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-6 py-4">
            <h1 class="h2 mr-auto">
                <a href="tambah_barang.php" class="text-info">Tambah Barang</a>
            </h1>

            <?php if (!empty($pesanError)): ?>
            <div id="divPesanError">
                <div class="mx-auto">
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php
                                foreach ($pesanError as $pesan) {
                                    echo "<li>$pesan</li>";
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                        value="<?= $barang->getItem("nama_barang"); ?>">
                </div>
                <div class="form-group">
                    <label for="jumlah_barang">Jumlah Barang</label>
                    <input type="text" class="form-control" name="jumlah_barang" id="jumlah_barang"
                        value="<?= $barang->getItem("jumlah_barang"); ?>">
                </div>
                <div class="form-group">
                    <label for="harga_barang">Harga Barang</label>
                    <input type="text" class="form-control" name="harga_barang" id="harga_barang"
                        value="<?= $barang->getItem("harga_barang"); ?>">
                </div>
                <input type="submit" value="Tambah" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

<?php include "template/footer.php";