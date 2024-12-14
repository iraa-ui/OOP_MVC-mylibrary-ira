<?php

if (!defined('SECURE_ACCESS')) {
    die('Direct access not permitted');
}

$title = "Pengembalian Buku";
include('templates/header.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $loan_id = (int)$_POST['loan_id'];
    $return_date = trim($_POST['return_date']);

    
    $conn = new mysqli('localhost', 'root', '', 'mylibrary'); 

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT return_date FROM book_loans WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $loan_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $loan = $result->fetch_assoc();
        $expected_return_date = new DateTime($loan['return_date']);
        $actual_return_date = new DateTime($return_date);

        // Hitung keterlambatan dan denda
        $late_days = max(0, $expected_return_date->diff($actual_return_date)->days);
        $fine = $late_days * 5000; // Rp 5.000 per hari keterlambatan

       
        $update_sql = "UPDATE book_loans SET actual_return_date = ?, fine = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("sii", $return_date, $fine, $loan_id);

        if ($update_stmt->execute()) {
            echo "<div class='alert alert-success text-center'>";
            echo "Pengembalian berhasil diproses!";
            if ($fine > 0) {
                echo "<span style='color: red;'> Anda terlambat $late_days hari. Denda: Rp $fine</span>";
            } else {
                echo " Tidak ada denda.";
            }
            echo "</div>";
        } else {
            echo "<div class='alert alert-danger text-center'>";
            echo "Terjadi kesalahan: " . $update_stmt->error;
            echo "</div>";
        }

        $update_stmt->close();
    } else {
        echo "<div class='alert alert-danger text-center'>";
        echo "ID Pinjaman tidak ditemukan.";
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
                <h3 class="panel-title text-center">Pengembalian Buku</h3>

                <form method="POST" action="" class="form-center">
                    <!-- ID Pinjaman -->
                    <div class="input-group mb-20">
                        <span class="input-group-text"><i class="fa-regular fa-id-card"></i></span>
                        <input
                            type="number"
                            class="form-control"
                            placeholder="ID Pinjaman"
                            name="loan_id"
                            required>
                    </div>

                   
                    <div class="input-group mb-20">
                        <span class="input-group-text"><i class="fa-regular fa-calendar"></i></span>
                        <input
                            type="date"
                            class="form-control"
                            name="return_date"
                            required>
                    </div>

                    <button class="btn btn-primary w-100" type="submit">Proses Pengembalian</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include('templates/footer.php') ?>

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
