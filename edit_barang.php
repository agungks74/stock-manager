<?php
require "init.php";

if (empty(Input::get('id_barang'))) {
    die('Maaf halaman ini tidak bisa diakses langsung');
}

$barang = new Barang();
$barang->generate(Input::get('id_barang'));

if (!empty($_POST)) {
    $pesanError = $barang->validasi($_POST);
    if (empty($pesanError)) {
        $barang->update($barang->getItem('id_barang'));
        header("Location: tampil_barang.php");
    }
}

include "template/header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-6 py-4">
            <h1 class="h2 mr-auto">
                <a href="edit_barang.php" class="text-info">Edit Barang</a>
            </h1>


            <?php if (!empty($pesanError)): ?>
            <div class="divPesanError">
                <div class="mx-auto">
                    <div class="alert alert-danger" role="alert">
                        <ul class="mb-0">
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
            <form method="post">
                <div class="form-group">
                    <label for="id_barang">ID Barang</label>
                    <input type="text" name="id_barang" id="id_barang" class="form-control"
                        value="<?= $barang->getItem('id_barang'); ?>" disabled>
                    <small class="d-block">*ID Barang tidak bisa diubah</small>
                </div>
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                        value="<?= $barang->getItem('nama_barang'); ?>">
                </div>
                <div class="form-group">
                    <label for="jumlah_barang">Jumlah Barang</label>
                    <input type="text" name="jumlah_barang" id="jumlah_barang" class="form-control"
                        value="<?= $barang->getItem('jumlah_barang'); ?>">
                </div>
                <div class="form-group">
                    <label for="harga_barang">Harga Barang</label>
                    <input type="text" name="harga_barang" id="harga_barang" class="form-control"
                        value="<?= $barang->getItem('harga_barang'); ?>">
                </div>

                <input type="submit" value="Update" class="btn btn-primary">
                <a href="tampil_barang.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<?php include "template/footer.php";