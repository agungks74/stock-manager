<?php
require "init.php";

$user = new User;
$user->cekUserSession();

$user->generate($_SESSION['username']);

if (!empty($_POST)) {
    $pesanError = $user->validasiUbahPassword($_POST);

    if (empty($pesanError)) {
        $user->ubahPassword();
        header("Location: ubah_password_berhasil.php");
    }
}

include "template/header.php"

?>

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 py-4">
            <h1 class="h2 mr-auto">
                <a href="edit_barang.php" class="text-info">User Profile</a>
            </h1>

            <?php if (!empty($pesanError)): ?>

            <div id="divPesanError">
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

            <p>
                <?= $user->getItem('username')." (".$user->getItem('email').")"; ?>
            </p>

            <p>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#formPassword">Ubah
                    Password</button>
            </p>

            <form id="formPassword" method="post" class="collapse <?php !empty($_POST)? 'show':''; ?>">

                <div class="form-group">
                    <label for="password_lama">Password Lama</label>
                    <input type="password" class="form-control" name="password_lama" id="password_lama">
                </div>

                <div class="form-group">
                    <label for="password_baru">Password Baru</label>
                    <small> (minimal 6 karakter, harus terdapat angka dan huruf) </small>
                    <input type="password" class="form-control" name="password_baru" id="password_baru">
                </div>

                <div class="form-group">
                    <label for="ulangi_password_baru">Ulangi Password Baru</label>
                    <input type="password" name="ulangi_password_baru" id="ulangi_password_baru" class="form-control">
                </div>

                <input type="submit" value="Update" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

<?php include "template/footer.php";