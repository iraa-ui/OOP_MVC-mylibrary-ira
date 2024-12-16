<?php
if (!defined('SECURE_ACCESS')) {
    die('Direct access not permitted');
}

require_once 'models/Borrow.php';

$title = "Peminjaman Buku";
include('templates/header.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $loanModel = new LoanModel();

    $result = $loanModel->createLoan(
        trim($_POST['book_name']),
        trim($_POST['member_name']),
        trim($_POST['borrow_date']),
        trim($_POST['description']),
        (int)$_POST['quantity']
    );

    if ($result['success']) {
        echo "<div class='alert alert-success text-center'>";
        echo "Data berhasil disimpan! Tanggal pengembalian otomatis: " . $result['return_date'];
        echo "</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>";
        echo "Terjadi kesalahan: " . $result['error'];
        echo "</div>";
    }

    $loanModel->closeConnection();
}
?>

<div class="main-content">
    <div class="login-panel">
        <div class="login-body">
            <div class="top d-flex justify-content-between align-items-center">
                <div class="logo">
                    <img src="assets/images/logo-black.png" alt="Logo">
                </div>
                <a href="/"><i class="fa-duotone fa-house-chimney"></i></a>
            </div>

            <div class="bottom">
                <h3 class="panel-title text-center">Peminjaman Buku</h3>

                <form method="POST" action="" class="form-center">
                    <div class="input-group mb-20">
                        <span class="input-group-text"><i class="fa-regular fa-book"></i></span>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Nama Buku"
                            name="book_name"
                            required>
                    </div>

                    <div class="input-group mb-20">
                        <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Nama Member"
                            name="member_name"
                            required>
                    </div>

                    <div class="input-group mb-20">
                        <span class="input-group-text"><i class="fa-regular fa-calendar"></i></span>
                        <input
                            type="date"
                            class="form-control"
                            name="borrow_date"
                            required>
                    </div>

                    <div class="input-group mb-20">
                        <span class="input-group-text"><i class="fa-regular fa-comment"></i></span>
                        <select class="form-control" name="description">
                            <option value="" disabled selected>Pilih Keterangan</option>
                            <option value="peminjaman">Peminjaman</option>
                        </select>
                    </div>

                    <div class="input-group mb-20">
                        <span class="input-group-text"><i class="fa-regular fa-list"></i></span>
                        <input
                            type="number"
                            class="form-control"
                            placeholder="Jumlah Buku"
                            name="quantity"
                            required min="1">
                    </div>

                    <button class="btn btn-primary w-100" type="submit">Pinjam Buku</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('../templates/footer.php') ?>

<style>
    .main-content {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .login-panel {
        width: 100%;
        max-width: 500px;
    }
    .input-group {
        margin-bottom: 15px;
    }
    .form-center {
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
    }
</style>
