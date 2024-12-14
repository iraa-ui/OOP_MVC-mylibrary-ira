<?php
// Pastikan halaman ini hanya dapat diakses dengan cara yang aman
if (!defined('SECURE_ACCESS')) {
    die('Direct access not permitted');
}

$title = "Peminjaman Buku";
include('templates/header.php');

// Menangani proses form setelah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari form
    $book_name = trim($_POST['book_name']);
    $member_name = trim($_POST['member_name']);
    $borrow_date = trim($_POST['borrow_date']);
    $description = trim($_POST['description']);
    $quantity = (int)$_POST['quantity'];

    // Menghitung tanggal pengembalian otomatis (+3 hari)
    $borrow_date_obj = new DateTime($borrow_date);
    $borrow_date_obj->modify('+3 days');
    $return_date = $borrow_date_obj->format('Y-m-d');

    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'mylibrary'); // Sesuaikan dengan kredensial database

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query untuk menyimpan data ke tabel book_loans
    $sql = "INSERT INTO book_loans (book_name, member_name, borrow_date, return_date, description, quantity) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $book_name, $member_name, $borrow_date, $return_date, $description, $quantity);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success text-center'>";
        echo "Data berhasil disimpan! Tanggal pengembalian otomatis: " . $return_date;
        echo "</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>";
        echo "Terjadi kesalahan: " . $stmt->error;
        echo "</div>";
    }

    $stmt->close();
    $conn->close();
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
                    <!-- Nama Buku -->
                    <div class="input-group mb-20">
                        <span class="input-group-text"><i class="fa-regular fa-book"></i></span>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Nama Buku"
                            name="book_name"
                            required>
                    </div>

                    <!-- Nama Member -->
                    <div class="input-group mb-20">
                        <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Nama Member"
                            name="member_name"
                            required>
                    </div>

                    <!-- Tanggal Peminjaman -->
                    <div class="input-group mb-20">
                        <span class="input-group-text"><i class="fa-regular fa-calendar"></i></span>
                        <input
                            type="date"
                            class="form-control"
                            name="borrow_date"
                            required>
                    </div>

                    <!-- Keterangan -->
                    <div class="input-group mb-20">
                        <span class="input-group-text"><i class="fa-regular fa-comment"></i></span>
                        <select class="form-control" name="description">
                            <option value="" disabled selected>Pilih Keterangan</option>
                            <option value="peminjaman">Peminjaman</option>
                        </select>
                    </div>

                    <!-- Jumlah Buku -->
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

<!-- Footer -->
<?php include('templates/footer.php') ?>

<!-- CSS untuk menengahkan form -->
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
