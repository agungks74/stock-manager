<?php
require "init.php";

if (empty(Input::get('id_barang'))) {
    die("Maaf halaman ini tidak bisa diakses langsung");
}

$barang = new Barang();
$barang->generate(Input::get('id_barang'));

if (!empty($_POST)) {
    $barang->delete(Input::get('id_barang'));
    header("Location: tampil_barang.php");
}

include "template/header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <div id="modalHapus">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi</h4>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin akan menghapus
                                <b><?= $barang->getItem('nama_barang') ?></b>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <a href="tampil_barang.php" class="btn btn-secondary">Tidak</a>
                            <form method="post">
                                <input type="hidden" name="id_barang" value="<?= $barang->getItem("id_barang"); ?>">
                                <input type="submit" value="Ya" class="btn btn-danger">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php";