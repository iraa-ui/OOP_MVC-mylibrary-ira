<?php

if (!defined('SECURE_ACCESS')) {
    die('Direct access not permitted');
}

$title = "Pengembalian Buku";
include('templates/header.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('models/Return.php');  

    $loan_id = (int)$_POST['loan_id'];
    $return_date = trim($_POST['return_date']);

    
    $pengembalianModel = new PengembalianModel();
    $result = $pengembalianModel->prosesPengembalian($loan_id, $return_date);

   
    if ($result['success']) {
        echo "<div class='alert alert-success text-center'>";
        echo $result['message'];
        echo "</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>";
        echo $result['message'];
        echo "</div>";
    }

   
    $pengembalianModel->closeConnection();
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
